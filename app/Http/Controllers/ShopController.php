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

    public function show( Product $product, ?string $color = null, Builder $builder ) {


        if ( $color ) {
            $realColor = Color::where( 'id', '=', $color )->get()->first();
        } else {
            $realColor = $product->colors()->first();
        }
        // TODO Fix bug
        dd( $product->scopeWithColor($builder, $realColor->id)->get());
        return view( 'shop.show' )
            ->with( 'product', $product->scopeWithColor($builder, $realColor) )
            ->with( 'color', $realColor )
            ->with( 'productsFeatures', Product::inRandomOrder()->take( 9 )->get() );
    }

    public function categories( \Request $request ) {
        $products = Product::orderByDesc( 'id' )->available()->take( 9 )->get();

        return view( 'shop.index', compact( 'products' ) );
    }
}
