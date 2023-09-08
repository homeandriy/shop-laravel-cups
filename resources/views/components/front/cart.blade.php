<!-- Modal -->
<div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="cart-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cart-modal-label">Корзина</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="rows">
                    <div class="cart-items">
                        <div class="header">
                            <div class="image">
                                Image
                            </div>
                            <div class="name">
                                Name
                            </div>
                            <div class="price">
                                Prices
                            </div>
                            <div class="rating">
                                Rating
                            </div>
                            <div class="info">
                                Info
                            </div>
                        </div>
                        <div class="body">
                            <div class="item">
                                <div class="image">
                                    <img src="{{ asset('storage/dist/images/nike-shoe.jpg') }}">
                                </div>
                                <div class="name">
                                    <div class="name-text">
                                        <p> Skechers Men's Classic Fit-Delson-Camden Sneaker</p>
                                    </div>
                                    <div class="button">
                                        <a class="cart-btn" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18">
                                                <g id="Heart" transform="translate(1 1)">
                                                    <path id="Heart-2" data-name="Heart" d="M18.161,4.413a4.674,4.674,0,0,0-6.7,0l-.913.93-.913-.93a4.675,4.675,0,0,0-6.7,0,4.893,4.893,0,0,0,0,6.828l.913.93L10.548,19l6.7-6.828.913-.93a4.892,4.892,0,0,0,0-6.828Z" transform="translate(-1.549 -2.998)" fill="#fff" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                                </g>
                                            </svg>
                                        </a>
                                        <a class="del" href="#">Delete</a>
                                    </div>
                                </div>
                                <div class="price">
                                    <span>$254.99</span> <del>$499.99</del>
                                </div>
                                <div class="rating">
                                    <i class="fas fa-star"></i> 5.0
                                </div>
                                <div class="info">
                                    <div class="size">
                                        <div class="product-pricelist-selector-size">
                                            <h6>Sizes</h6>
                                            <div class="sizes" id="sizes">
                                                <li class="sizes-all active">M</li>
                                            </div>
                                        </div>
                                        <div class="product-pricelist-selector-color">
                                            <h6>Colors</h6>
                                            <div class="colors" id="colors">
                                                <li class="colorall color-1 active"></li>
                                            </div>
                                        </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Продовжити покупки</button>
                <a type="button" href="#" class="btn btn-primary">Оформити замовлення</a>
            </div>
        </div>
    </div>
</div>
