<?php

namespace App\Services;

use App\Models\Servants;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerService
{
    public function sendEmail(array $collectedData, Servants $servant, string $date): bool
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = env('MAIL_PORT');
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';

            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($servant->email, $servant->name);

            $mail->isHTML(true);
            $mail->Subject = 'Notificação Facilita Diário - ' . $date;

            $groupedData = collect($collectedData)->unique('order')->toArray();
            $bodyContent = view('emails.data', [
                'groupedData' => $groupedData,
                'servant' => $servant,
            ])->render();

            $mail->Body = $bodyContent;

            return $mail->send();
        } catch (Exception $e) {
            \Log::error('Erro ao enviar e-mail: ' . $e->getMessage());
            return false;
        }
    }
}
