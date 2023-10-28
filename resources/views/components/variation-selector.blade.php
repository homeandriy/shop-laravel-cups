<?php
/**
 * @var \App\Models\Product $product
 */
?>
@php
$jsonVariations = [];
$hasVariation = false;
@endphp
<div class="product-item-info product-pricelist-selector-color" >
    @if($product->colors()->count())
        <div class="colors" data-product="{{$product->id}}">
            @php
                $color = $product->colors()->get()->first();
				$hasVariation = true;
				$variation = null;
				$i = 1;
            @endphp
            @foreach($product->colors()->get() as $colorVariation)
                @php
                    $inStock = (bool)$colorVariation->pivot->quantity
                @endphp
                @php
                // TODO Fix it
                $endPrice =  $colorVariation->pivot->discount === 0
                ? $colorVariation->pivot->price
                : ( $colorVariation->pivot->price - ( $colorVariation->pivot->price  * $colorVariation->pivot->discount / 100 ) );

                    $jsonVariations[$colorVariation->pivot->color_id] = [
                        'name' => \App\Models\Attributes\Color::whereId($colorVariation->pivot->color_id)->first()->name,
                        'id'   => $colorVariation->pivot->color_id,
                        'price'   => $colorVariation->pivot->discount === 0 ? $colorVariation->pivot->price : ($endPrice <= 0 ? 1 : round( $endPrice, 2 )),
                        'old_price'   => $colorVariation->pivot->discount === 0 ? 0 : $colorVariation->pivot->price,
                        'quantity'   => $colorVariation->pivot->quantity,
                    ];
                if ($i === 1) {
					$variation = $jsonVariations[$colorVariation->pivot->color_id];
                }
                $i++;
                @endphp
                <a href="#variation-{{$colorVariation->pivot->color_id}}" data-variation="{{$colorVariation->pivot->color_id}}" @disabled($inStock)>
                    <li class="variation-cell colorall @if($colorVariation->pivot->color_id === $color->id) active @endif" style="background-color: {{$colorVariation->hex}}" title="{{ $color->name }}"></li>
                </a>
            @endforeach
            <script>
                var variation_{{$product->id}} =@php echo json_encode($jsonVariations) @endphp
            </script>
            <style>
                .variation-cell, .variation-cell.active {
                    border-radius: 50%!important;
                    width: 20px!important;
                    height: 20px!important;
                    margin-right: 8px!important;
                }
            </style>
        </div>
        <a href="{{ route('products.show', [$product, $colorVariation->slug]) }}">
            {{ $product->title }}
            <span class="variation-color js-variation-name" data-product="{{$product->id}}">({{ $color->name }})</span>
        </a>
        <span><span class="js-product-price" data-product="{{$product->id}}">{{ $variation ? $variation['price'] : $product->endPrice }}</span> ₴</span>
        @if($product->price !== $product->endPrice)
            <del><span class="old-price js-product-old-price" data-product="{{$product->id}}">{{$product->price}}</span> ₴</del>
        @endif
    @endif
    @if($product->sizes->count())

    @endif
</div>
