<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductAddon;

class CartService
{
    public function getCart(): array
    {
        $cart = session('cart', "[]");
        $cart = json_decode($cart, true);
        return $cart;
    }

    public function addToCart($item)
    {
        $cart = $this->getCart();

        $cart[] = $item;

        $cart = json_encode($cart);
        session(['cart' => $cart]);
    }

    public function deleteFromCart($index)
    {
        $cart = $this->getCart();

        if (array_key_exists($index, $cart)) {
            array_splice($cart, $index, 1);
        }

        $cart = json_encode($cart);
        session(['cart' => $cart]);
    }

    public function getFinalCart(): array
    {
        $cart = $this->getCart();
        $finalCart = [];
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

            $finalCart[] = [
                'name' => $name,
                'price' => $price,
                'amount' => $item['amount']
            ];
        }

        return $finalCart;
    }
}
