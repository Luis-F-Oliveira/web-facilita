<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendData;
use App\Models\Data;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotifyController extends Controller
{
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

        foreach ($groupedData as $servantId => $items) {
        $servant = $items[0]->servant;
        $email = $servant->email;
        $date = $items[0]->created_at;

        if ($servant->active) {
            Mail::to($email)->send(new SendData($items, $servant, $date));
            continue;
        }
        }

        return response()->json([
            'message' => 'E-mails enviados com sucesso'
        ], 200);
    }
}
