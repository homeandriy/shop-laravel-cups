<?php
/**
 * @var \App\Models\Product[] $products
 */

?>

<div class="features-wrapper">
    <div class="features-active">
        @foreach($products as $product)
            <div class="product-item">
                <div class="product-item-image">
                    <a href="{{ route('products.show', $product) }}">
                        <img src="{{ $product->thumbnailUrl }}" alt="{{ $product->title }}"
                             class="img-fluid">
                    </a>
                    <div class="cart-icon">
                        <a href="#" class="js-add-to-wishlist" data-product="{{ $product->id }}" data-variation="{{ $product->getVariationId() }}"><i class="far fa-heart"></i></a>
                        <a href="#" class="js-add-to-cart" data-product="{{ $product->id }}" data-variation="{{ $product->getVariationId() }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                 viewBox="0 0 16.75 16.75">
                                <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                    <g id="Icon" transform="translate(0 1)">
                                        <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682" cy="0.714"
                                                 rx="0.682" ry="0.714" transform="translate(4.773 13.571)"
                                                 fill="none" stroke="#1a2224" stroke-linecap="round"
                                                 stroke-linejoin="round" stroke-width="1.5"/>
                                        <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682" cy="0.714"
                                                 rx="0.682" ry="0.714" transform="translate(12.273 13.571)"
                                                 fill="none" stroke="#1a2224" stroke-linecap="round"
                                                 stroke-linejoin="round" stroke-width="1.5"/>
                                        <path id="Path_3" data-name="Path 3"
                                              d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                              transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                              stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="1.5"/>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <x-variation-selector :product="$product"></x-variation-selector>
            </div>
        @endforeach
    </div>
    <div class="slider-arrows">
        <div class="prev-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                 viewBox="0 0 9.414 16.828">
                <path id="Icon_feather-chevron-left" data-name="Icon feather-chevron-left"
                      d="M20.5,23l-7-7,7-7" transform="translate(-12.5 -7.586)" fill="none"
                      stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
            </svg>
        </div>
        <div class="next-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                 viewBox="0 0 9.414 16.828">
                <path id="Icon_feather-chevron-right" data-name="Icon feather-chevron-right"
                      d="M13.5,23l5.25-5.25.438-.437L20.5,16l-7-7" transform="translate(-12.086 -7.586)"
                      fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2"/>
            </svg>
        </div>
    </div>
</div>
