<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class EmailNotificationService
{
    public function newOrder(Order $order)
    {
        Mail::send(
            'email/new_order',
            [
                'id' => $order->id,
            ],
            function ($message) {
                $name = env('APP_NAME');
                $email = env('MAIL_FROM_ADDRESS');

                $message->from($email)
                    ->to($email, $name)
                    ->subject('Nowe zamówienie');
            }
        );
        Mail::send(
            'email/new_order_client',
            [
                'id' => $order->id,
            ],
            function ($message) use ($order) {
                $email = env('MAIL_FROM_ADDRESS');

                $message->from($email)
                    ->to($order->email, $order->name)
                    ->subject('Twoje zamówienie z pizzarella.pl');
            }
        );
    }
}
