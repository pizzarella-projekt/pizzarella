<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Menu', ['products' => Product::all()]);
    }

    public function create()
    {
        return Inertia::render('Admin/Menu/Create');
    }

    public function edit(int $product)
    {
        return Inertia::render('Admin/Menu/Edit', ['product' => Product::find($product)]);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required', 'max:250'],
            'small' => ['required', 'max:50'],
            'medium' => ['required', 'max:50'],
            'big' => ['required', 'max:50'],
        ]));

        $file = $request->file('image');
        if ($file) {
            $file->move('storage/products', $product->id . '.png');
        }

        return to_route('menu.index');
    }

    public function destroy(int $product)
    {
        Product::destroy($product);
        return to_route('menu.index');
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required', 'max:250'],
            'small' => ['required', 'max:50'],
            'medium' => ['required', 'max:50'],
            'big' => ['required', 'max:50'],
        ]);

        $product = Product::find($id);
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->small = $data['small'];
        $product->medium = $data['medium'];
        $product->big = $data['big'];
        $product->save();

        $file = $request->file('image');
        if ($file) {
            $file->move('storage/products', $product->id . '.png');
        }

        return to_route('menu.index');
    }
}
