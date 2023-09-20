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
                        <div class="body" id="cart-product-list">
                            @include('components.front.part.cart-product-list')
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

<div class="offcanvas offcanvas-end" tabindex="-1" id="cart-right" aria-labelledby="offcanvasRightLabel" style="width: 40vw">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Корзина</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex flex-column justify-content-between h-100">
            <div>
                <div class="rows">
                    <div class="cart-items">
                        <div class="body" id="cart-items">
                            @include('components.front.part.cart-product-list')
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ route('cart.index') }}" class="btn btn-outline-dark">В кошик</a>
                <a href="{{ route('checkout') }}" class="btn btn-outline-success">Оформити замовлення</a>
            </div>
        </div>
    </div>
</div>
