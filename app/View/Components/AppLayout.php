<?php

namespace App\View\Components;

use App\Enums\CartConstants;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component {
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View {
        return view( 'layouts.app' )
            ->with( 'categories', Category::all() )
            ->with( 'cart', \Cart::instance( CartConstants::CART )->content() );
    }
}
