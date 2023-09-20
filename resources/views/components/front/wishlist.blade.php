<!-- Modal -->
<div class="modal fade" id="wishlist-modal" tabindex="-1" aria-labelledby="wishlist-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wishlist-modal-label">Корзина</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="rows">
                    <div class="wishlist-items">
                        <div class="body" id="wishlist-product-list">
                            @include('components.front.part.wishlist-product-list')
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
