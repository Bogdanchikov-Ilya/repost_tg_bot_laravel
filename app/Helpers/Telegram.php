<?php

namespace App\Helpers;

class Telegram
{
    public function sendMessage($chat_id, $message) {
        \Illuminate\Support\Facades\Http::post('https://api.tlgr.org/bot5045491073:AAGn4ZZuWH9XYxKNf6lj8s-aqnY441KfoDU/sendMessage', [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'html'
        ]);
    }
}

