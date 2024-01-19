<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Services\CartService;

class CheckoutController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = $this->cartService->getFinalCart();

        return Inertia::render('Kasa', [
            'cart' => $cart
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CheckoutRequest $request)
    {
        $validated = $request->validated();
        $cart = $this->cartService->getFinalCart();
        $total = 0;

        foreach ($cart as $item) {
            $total += ($item['price'] * $item['amount']);
        }

        $order = new Order;
        $order->name = $validated['name'];
        $order->email = $validated['email'];
        $order->phone = $validated['phone'];
        $order->street = $validated['street'];
        $order->postal_code = $validated['postal_code'];
        $order->city = $validated['city'];
        $order->total = $total;
        $order->status = 'Nowe';
        $order->items = $cart;
        $order->save();

        session(['cart' => '[]']);

        return redirect()
            ->route('kasa.index')
            ->with('ordered', "Przyjęliśmy twoje zamówienie.\nNa twojej poczcie email znajdziesz link do śledzenia zamówienia.");
    }
}
