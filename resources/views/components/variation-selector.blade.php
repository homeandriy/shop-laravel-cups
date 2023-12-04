<?php
/**
 * @var \App\Models\Product $product
 */
?>
@php
$jsonVariations = [];
$hasVariation = false;
@endphp
<div>
    @if($product->colors()->count())
        <fieldset class="picker" data-product="{{$product->id}}">
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
                <label for="color-{{$product->id}}_{{$colorVariation->pivot->color_id}}" style="--color:{{$colorVariation->hex}}">
                    <input type="radio" name="colors" id="color-{{$product->id}}_{{$colorVariation->pivot->color_id}}" checked="">
                    <span>{{ $color->name }}</span>
                </label>
            @endforeach
            <script>
                var variation_{{$product->id}} =@php echo json_encode($jsonVariations) @endphp
            </script>
        </fieldset>
        <a href="{{ route('products.show', [$product, $colorVariation->slug]) }}">
            {{ $product->title }}
            <span class="variation-color js-variation-name" data-product="{{$product->id}}">({{ $color->name }})</span>
        </a>
        <div>
            <span class="text-price">Ціна:</span>
            <span class="price"><span class="js-product-price" data-product="{{$product->id}}">{{ $variation ? $variation['price'] : $product->endPrice }}</span>₴</span>
            @if($product->price !== $product->endPrice)
                <del class="old-price"><span class="js-product-old-price" data-product="{{$product->id}}">{{$product->price}}</span>₴</del>
            @endif
        </div>
    @endif
    @if($product->sizes->count())

    @endif
</div>
