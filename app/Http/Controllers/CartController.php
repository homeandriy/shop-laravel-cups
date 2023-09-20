<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller {
    public function index() {
        return view( 'cart/index' );
    }

    public function add( Request $request, ProductRepositoryContract $productRepo ) {
        $product      = Product::whereId( $request->product )->get()->first();
        $addedProduct = $productRepo->get( $product, $request );
        Cart::instance( 'cart' )->add(
            $addedProduct,
            $request->get( 'quantity', 1 ),
            [
                'key'   => $request->product . '_' . $request->get( 'color' ),
                'color' => $request->get( 'color' ),
                'full'  => $addedProduct
            ]
        );

        return response()->json( [
                'products' => Cart::instance( 'cart' )->content(),
                'count'    => Cart::instance( 'cart' )->count(),
                'total'    => Cart::instance( 'cart' )->total(),
                'renderCart' => view('components.front.part.cart-product-list')->render()
            ]
        );
    }

    public function remove( Request $request ) {
        $data = $request->validate( [
            'rowId' => [ 'required', 'string' ]
        ] );

        Cart::instance( 'cart' )->remove( $data['rowId'] );

        return redirect()->back();
    }

    /**
     * Update count per product inside cart
     *
     * @param Request $request
     * @param Product $product
     *
     */
    public function countUpdate( Request $request, Product $product ) {
        $data = $request->validate( [
            'rowId' => [ 'required', 'string' ]
        ] );

        Cart::instance( 'cart' )->update(
            $data['rowId'],
            $request->get( 'quantity', 1 )
        );

        return response()->json(
            [
                'data' => Cart::instance( 'cart' )->get( $data['rowId'] )
            ]
        );
    }
}
