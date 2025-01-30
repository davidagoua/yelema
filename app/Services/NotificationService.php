<?php

namespace App\Services;

use GuzzleHttp\Client;

class NotificationService
{
    public static function send($contact, $message)
    {
        $client = new Client();
        $client->post('https://waapi.app/api/v1/instances/40821/client/action/send-message', [
            'json' => [
                'chatId' => '225'.$contact. '@c.us',
                'message' => $message
            ]
        ])->withHeader('Authorization', 'Bearer ' . env('WAAPI_TOKEN'));
    }
}
