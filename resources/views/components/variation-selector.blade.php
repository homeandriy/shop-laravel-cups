<?php
/**
 * @var \App\Models\Product $product
 */
?>
@php
$jsonVariations = [];
@endphp
<div class="product-item-info product-pricelist-selector-color">
    @if($product->colors()->count())
        <div class="colors">
            @php
                $color = $product->colors()->get()->first();
            @endphp
            @foreach($product->colors()->get() as $colorVariation)
                @php
                    $jsonVariations[$colorVariation->pivot->color_id] = [
                        'name' => $color->name,
                        'id'   => $colorVariation->pivot->color_id
                    ]
                @endphp
                <a href="#variation-{{$colorVariation->pivot->color_id}}">
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
            <a href="{{ route('products.show', [$product, $colorVariation->slug]) }}">{{ $product->title }} <span class="variation-color">({{ $color->name }})</span></a>
            <span>${{ $product->endPrice }} ₴</span>
            @if($product->price !== $product->endPrice)
                <del class="old-price">{{$product->price}} ₴</del>
            @endif
    @endif
    @if($product->sizes->count())

    @endif
</div>
