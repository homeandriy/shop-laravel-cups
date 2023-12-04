<?php
/**
 * @var \App\Models\Product[] $products
 */

?>
@foreach($products as $product)
    <div class="project item col-md-6 col-xl-4">
        <figure class="rounded mb-6">
            <img src="{{ $product->thumbnailUrl }}" srcset="{{ $product->thumbnailUrl }} 2x" alt="{{ $product->title }}">
            <a class="item-like js-add-to-wishlist" href="#" data-bs-toggle="white-tooltip" aria-label="Add to wishlist" data-bs-original-title="В обране" data-product="{{ $product->id }}" data-variation="{{ $product->getVariationId() }}">
                <i class="uil uil-heart"></i>
            </a>
            <a class="item-view" href="#" data-bs-toggle="white-tooltip" aria-label="Quick view" data-bs-original-title="Quick view">
                <i class="uil uil-eye"></i>
            </a>
            <a href="#" class="item-cart">
                <i class="uil uil-shopping-bag js-add-to-cart" data-product="{{ $product->id }}" data-variation="{{ $product->getVariationId() }}"></i> Додати до кошика
            </a>
            <span class="avatar bg-pink text-white w-10 h-10 position-absolute text-uppercase fs-13" style="top: 1rem; left: 1rem;"><span>Sale!</span></span>
        </figure>
        <div class="post-header">
            <div class="post-header">
                <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                    <div class="post-category text-ash mb-0">{{ $product->categories->first()->name?? 'не вказана' }}</div>
                    <span class="ratings five"></span>
                </div>
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
                                            'href' => route('products.show', [$product, $colorVariation->slug])
                                        ];
                                    if ($i === 1) {
                                        $variation = $jsonVariations[$colorVariation->pivot->color_id];
                                    }
                                    $i++;
                                @endphp
                                <label for="color-{{$product->id}}_{{$colorVariation->pivot->color_id}}" style="--color:{{$colorVariation->hex}}" data-product="{{$product->id}}" data-variation="{{ $colorVariation->pivot->color_id }}">
                                    <input type="radio" name="colors" class="variation-color" id="color-{{$product->id}}_{{$colorVariation->pivot->color_id}}" checked="">
                                    <span>{{ $color->name }}</span>
                                </label>
                            @endforeach
                            <script>
                                var variation_{{$product->id}} =@php echo json_encode($jsonVariations) @endphp
                            </script>
                        </fieldset>
                    @endif
                    @if($product->sizes->count())

                    @endif
                </div>
                <h2 class="post-title h3 fs-22">
                    <a href="{{ route('products.show', $product) }}" class="link-dark js-variation-link" data-product="{{$product->id}}">
                        {{ $product->title }}
                        <span class="variation-color js-variation-name" data-product="{{$product->id}}">({{ $color->name }})</span>
                    </a>
                </h2>
                <p class="price">
                    @if($product->price !== $product->endPrice)
                    <del><span class="amount js-product-old-price" data-product="{{$product->id}}">{{$product->price}}</span>₴</del>
                    @endif
                    <ins><span class="amount js-product-price" data-product="{{$product->id}}">{{ $variation ? $variation['price'] : $product->endPrice }}</span>₴</ins></p>
            </div>
        </div>
    </div>
@endforeach

