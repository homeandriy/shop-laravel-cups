<?php

namespace App\View\Components;

use App\Enums\CartConstants;
use Illuminate\View\Component;

class Cart extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        return view( 'components.front.cart' )->with( CartConstants::CART,
            \Cart::instance( CartConstants::CART )->content() );
    }
}
