<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendData;
use App\Models\Data;
use App\Services\PHPMailerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotifyController extends Controller
{
    protected PHPMailerService $mailer;

    public function __construct(PHPMailerService $mailer)
    {
        $this->mailer = $mailer;
    }

    public function index(Request $request): JsonResponse
    {
        $date = $request->only('date');
        $data = Data::whereDate('created_at', $date)->get();

        $groupedData = [];
        foreach ($data as $item) {
            $servantId = $item->servant_id;
            if (!isset($groupedData[$servantId])) {
                $groupedData[$servantId] = [];
            }
            $groupedData[$servantId][] = $item;
        }

        $errors = [];

        foreach ($groupedData as $servantId => $items) {
            $servant = $items[0]->servant;

            if ($servant->active) {
                try {
                    $this->mailer->sendEmail($items, $servant, $items[0]->created_at);
                } catch (\Exception $e) {
                    $errors[] = "Erro ao enviar e-mail para {$servant->email}: {$e->getMessage()}";
                }
            }
        }

        if (!empty($errors)) {
            return response()->json([
                'message' => 'Alguns e-mails não puderam ser enviados.',
                'errors' => $errors,
            ], 500);
        }

        return response()->json([
            'message' => 'E-mails enviados com sucesso'
        ], 200);
    }
}
