<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Order;

class TrackingController extends Controller
{
    public function index(string $id)
    {
        $order = Order::find($id);

        return Inertia::render('Sledzenie', [
            'order' => [
                'id' => $id,
                'status' => $order->status
            ]
        ]);
    }
}
