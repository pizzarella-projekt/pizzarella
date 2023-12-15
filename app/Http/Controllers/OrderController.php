<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return Inertia::render('Admin/Zamowienia', ['orders' => $orders]);
    }

    public function create()
    {
    }

    public function show(int $id)
    {
        $order = Order::find($id);
        return Inertia::render('Admin/Zamowienia/Show', ['order' => $order]);
    }

    public function store(Request $request)
    {
    }

    public function edit(Order $order)
    {
    }

    public function update(Request $request, Order $order)
    {
    }

    public function destroy(int $id)
    {
        Order::destroy($id);
        return to_route('zamowienia.index');
    }
}
