<?php

namespace App\Services;

use App\Models\Attributes\Color;
use App\Models\Attributes\Size;
use App\Models\Product;

class CartService {
    public static function add( Product $product, Color|Size|null $attribute, int $plusAmount = 1 ): bool {
    }

    public static function setQuantity( int $quantity, Product $product, Color|Size|null $attribute, ): bool {
    }

    public static function has( Product $product, Color|Size|null $attribute ): bool {
    }

    public static function delete( Product $product, Color|Size|null $attribute ): bool {
    }
}
