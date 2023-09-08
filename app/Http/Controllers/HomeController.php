<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        $productsFeatures = Product::inRandomOrder()->take(9)->get();
        $products = Product::orderByDesc('id')->available()->take(9)->get();
        return view('home', compact('products', 'productsFeatures'));
    }
}
