<?php

namespace App\Repositories;

use App\Http\Requests\UpdateVariationRequest;
use App\Models\Product;
use App\Repositories\Contracts\ImageRepositoryContract;

class ProductVariationRepository {
    public function __construct( protected ImageRepositoryContract $imageRepository ) {
    }

    public function update( UpdateVariationRequest $updateVariationRequest, Product $product ): Product|false {

        $product->colors()->updateExistingPivot(
            $updateVariationRequest->id,
            [
                'color_id'   => $updateVariationRequest->color,
                'product_id' => $product->id,
                'quantity'   => $updateVariationRequest->quantity,
                'price'      => $updateVariationRequest->price,
                'active'     => (int) $updateVariationRequest->active
            ]
        );

        return $product;
    }
}
