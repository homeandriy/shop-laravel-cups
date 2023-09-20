<?php

namespace App\Http\Controllers;

use App\Models\Attributes\Color;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ShopController extends Controller {
    public function index() {
        $products = Product::orderByDesc( 'id' )->available()->take( 9 )->get();

        return view( 'shop.index', compact( 'products' ) );
    }

    public function show( Product $product, ?string $color = null ) {
//        dd($color);

        $realColor =  $color ?
            Color::where( 'slug', '=', $color )->get()->first():
            $product->colors()->get()->first();
        return view( 'shop.show' )
            ->with( 'product', $product )
            ->with( 'variation', $product->variationColorData($realColor) )
            ->with( 'color', $realColor )
            ->with( 'productsFeatures', Product::inRandomOrder()->take( 9 )->get() );
    }

    public function categories( \Request $request ) {
        $products = Product::orderByDesc( 'id' )->available()->take( 9 )->get();

        return view( 'shop.index', compact( 'products' ) );
    }
}
