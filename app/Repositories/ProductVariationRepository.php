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

    public function createVariation( array $variationData, Product $product ) {
        array_walk( $variationData, function ( array $data ) use ( $product ) {
            $product->colors()->attach(
                $product->id,
                [
                    'color_id'   => $data['color'],
                    'product_id' => $product->id,
                    'quantity'   => $data['quantity'],
                    'price'      => $data['price'],
                    'active'     => $data['active']
                ]
            );
        } );


        return $product;
    }

    public function deleteVariation( int $variationId, Product $product ): bool {
        $res = $product->colors()->detach( $variationId );

        return is_int( $res );
    }
}
