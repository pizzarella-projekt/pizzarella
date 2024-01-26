<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Services\CartService;

class CartController extends Controller
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
        return Inertia::render('Koszyk', [
            'cart' => $this->cartService->getFinalCart()
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

        $item = [
            'productId' => $validated['productId'],
            'option' => $validated['option'],
            'amount' => $validated['amount'],
            'addons' => $validated['addons']
        ];

        $this->cartService->addToCart($item);

        return to_route('koszyk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->cartService->deleteFromCart($id);

        return to_route('koszyk.index');
    }
}
