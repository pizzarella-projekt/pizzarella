<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\ProductAddon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session('cart', "[]");
        $cart = json_decode($cart, true);

        $calculated = [];
        $addonsList = ProductAddon::all('id', 'name', 'price')->keyBy('id');

        foreach ($cart as $item) {
            $product = Product::find($item['productId']);
            $name = "Pizza $product->name " . ['Mała', 'Średnia', 'Duża'][$item['option']];
            $price = $product->{['small', 'medium', 'big'][$item['option']]};
            $addons = [];

            foreach ($item['addons'] as $addonId) {
                $addon = $addonsList[$addonId];
                $price += $addon['price'];
                $addons[] = $addon['name'];
            }

            if (count($addons) > 0) {
                $name .= " (" . implode(", ", $addons) . ")";
            }

            $calculated[] = [
                'name' => $name,
                'price' => $price,
                'amount' => $item['amount']
            ];
        }

        return Inertia::render('Koszyk', [
            'cart' => $calculated
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'productId' => ['required', 'integer', 'exists:App\Models\Product,id'],
            'option' => ['required', Rule::in([0, 1, 2])],
            'amount' => ['required', 'integer', 'gt:0'],
            'addons' => ['array'],
            'addons.*' => ['integer', 'exists:App\Models\ProductAddon,id'],
        ]);

        $cart = $request->session()->get('cart', "[]");
        $cart = json_decode($cart, true);
        $cart[] = [
            'productId' => $validated['productId'],
            'option' => $validated['option'],
            'amount' => $validated['amount'],
            'addons' => $validated['addons']
        ];

        $cart = json_encode($cart);
        session(['cart' => $cart]);

        return to_route('koszyk.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = session('cart', "[]");
        $cart = json_decode($cart, true);

        if (array_key_exists($id, $cart)) {
            array_splice($cart, $id, 1);
        }

        $cart = json_encode($cart);
        session(['cart' => $cart]);

        return to_route('koszyk.index');
    }
}
