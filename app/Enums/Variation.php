<?php

namespace App\Enums;

use App\Models\Attributes\Color;
use App\Models\Attributes\Size;
use App\Models\Product;

class Variation {
    public function __construct(
        private Product $product,
        private ?Color $color,
        private ?Size $size,
        private float $price,
        private int $discount,
        private int $quantity,
        private bool $active,

    ) {
    }

    public function isActive(): bool {
        return $this->active;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getDiscount(): int {
        return $this->discount;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getEndPrice(): float {
        $endPrice = $this->discount === 0
            ? $this->price
            : ( $this->price - ( $this->price * $this->discount / 100 ) );

        return $endPrice <= 0 ? 1 : round( $endPrice, 2 );
    }

    public function getSize(): ?Size {
        return $this->size;
    }

    public function getColor(): ?Color {
        return $this->color;
    }

    public function getProduct(): Product {
        return $this->product;
    }
}
