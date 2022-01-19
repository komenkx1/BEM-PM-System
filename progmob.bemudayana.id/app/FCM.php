<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FCM extends Model
{
    protected $table = 'fcm';

    public static function cobaKirim($fcm_token, $title, $body)
    {
        $response = fcm()
            ->to([$fcm_token])
            ->priority('normal')
            ->timeToLive(0)
            ->notification([
                'title' => $title,
                'body' => $body,
            ])
            ->send();

        return $response;
    }
}
