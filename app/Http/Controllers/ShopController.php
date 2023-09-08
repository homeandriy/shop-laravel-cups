<?php

namespace App\Http\Controllers;

use App\Models\Product;


class ShopController extends Controller
{
    public function index()
    {
        $products = Product::orderByDesc('id')->available()->take(9)->get();
        return view('shop.index', compact('products'));
    }
    public function show(Product $product)
    {
        return view('shop.show')
            ->with('product', $product)
            ->with('productsFeatures',Product::inRandomOrder()->take(9)->get());
    }
}
