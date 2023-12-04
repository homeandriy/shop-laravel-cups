<?php
/**
 * @var \App\Enums\Variation $variation
 * @var \Gloudemans\Shoppingcart\CartItem $product
 */
?>
@if(Cart::instance( 'cart' )->content()->isEmpty())
    <div class="offcanvas-body d-flex flex-column">
        <h2>Ваша корзина пуста</h2>
    </div>
@else
    <div class="offcanvas-body d-flex flex-column">
        <div class="shopping-cart">
    @foreach(Cart::instance( 'cart' )->content() as $product)

            <div class="shopping-cart-item d-flex justify-content-between mb-4">
                    <div class="d-flex flex-row">
                        <figure class="rounded w-17"><a href="./shop-product.html"><img src="./assets/img/photos/sth1.jpg" srcset="./assets/img/photos/sth1@2x.jpg 2x" alt="" /></a></figure>
                        <div class="w-100 ms-4">
                            <h3 class="post-title fs-16 lh-xs mb-1"><a href="./shop-product.html" class="link-dark">Nike Air Sneakers</a></h3>
                            <p class="price fs-sm"><del><span class="amount">$55.00</span></del> <ins><span class="amount">$45.99</span></ins></p>
                            <div class="form-select-wrapper">
                                <select class="form-select form-select-sm">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <!--/.form-select-wrapper -->
                        </div>
                    </div>
                    <div class="ms-2"><a href="#" class="link-dark"><i class="uil uil-trash-alt"></i></a></div>
                </div>
                <div class="item">

            <div class="image">
                <img src="{{ $product->model->thumbnailUrl }}" alt="{{ $product->name }}">
            </div>
            <div class="name">
                <div class="name-text">
                    <p>{{ $product->name }} / {{ $variation->getColor()->name }}</p>
                </div>
                <div class="button">
                    <a class="cart-btn" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18">
                            <g id="Heart" transform="translate(1 1)">
                                <path id="Heart-2" data-name="Heart" d="M18.161,4.413a4.674,4.674,0,0,0-6.7,0l-.913.93-.913-.93a4.675,4.675,0,0,0-6.7,0,4.893,4.893,0,0,0,0,6.828l.913.93L10.548,19l6.7-6.828.913-.93a4.892,4.892,0,0,0,0-6.828Z" transform="translate(-1.549 -2.998)" fill="#fff" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                            </g>
                        </svg>
                    </a>
                    <a href="#" class="del js-delete-product" data-product="{{ $product->rowId }}"  rel="nofollow noidex">Видалити</a>
                </div>
            </div>
            <div class="price">
                <span>${{ $variation->getEndPrice() }} ₴</span>
                @if($variation->getPrice() !== $variation->getEndPrice())
                    <del class="old-price">{{$variation->getPrice()}} ₴</del>
                @endif
            </div>
            <div class="info">
                <div class="size">
                    @if(false)
                    <div class="product-pricelist-selector-size">
                        <h6>Sizes</h6>
                        <div class="sizes" id="sizes">
                            <li class="sizes-all active">M</li>
                        </div>
                    </div>
                    @endif
                    @if($variation->getColor() instanceof App\Models\Attributes\Color )
                    <div class="product-pricelist-selector-color">
                        <h6>Colors</h6>
                        <div class="colors" id="colors">
                            <li class="colorall active" style="background-color:{{ $variation->getColor()->hex }};"></li>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="quantity">
                    <div class="product-pricelist-selector-quantity">
                        <h6>quantity</h6>
                        <div class="wan-spinner wan-spinner-4">
                            <a href="javascript:void(0)" class="minus">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11.98" height="6.69" viewBox="0 0 11.98 6.69">
                                    <path id="Arrow" d="M1474.286,26.4l5,5,5-5" transform="translate(-1473.296 -25.41)" fill="none" stroke="#989ba7" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path>
                                </svg>
                            </a>
                            <input type="text" value="1" min="1">
                            <a href="javascript:void(0)" class="plus"><svg xmlns="http://www.w3.org/2000/svg" width="11.98" height="6.69" viewBox="0 0 11.98 6.69">
                                    <g id="Arrow" transform="translate(10.99 5.7) rotate(180)">
                                        <path id="Arrow-2" data-name="Arrow" d="M1474.286,26.4l5,5,5-5" transform="translate(-1474.286 -26.4)" fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"></path>
                                    </g>
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>

    @endforeach
                </div>

                <div class="offcanvas-footer flex-column text-center">
                    <div class="d-flex w-100 justify-content-between mb-4">
                        <span>Subtotal:</span>
                        <span class="h6 mb-0">$135.99</span>
                    </div>
                    <a href="#" class="btn btn-primary btn-icon btn-icon-start rounded w-100 mb-4"><i class="uil uil-credit-card fs-18"></i> Checkout</a>
                    <p class="fs-14 mb-0">Free shipping on all orders over $50</p>
                </div>
        </div>
    </div>
@endif

