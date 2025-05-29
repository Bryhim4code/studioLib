<?php

namespace App\Libraries;

// use Aws\Ses\SesClient;

class SesApi
{
    public function send( $to, $subject, $message, $from)
    {
        $curl = curl_init();

        $payload = json_encode([
            "from" => $from,
            "to" => $to,
            "subject" => $subject,
            "message" => $message
        ]);

        // echo '<pre>';
        // print_r($payload);
        // die;

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://firemail.ciphernet.net/api/v1/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                'x-api-key: GXf8o1T4LrNUP20wU2Yo',
                'Content-Type: application/json'
            ],
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            return ['status' => false, 'error' => $error];
        }

        return json_decode($response, true);
    }
}

