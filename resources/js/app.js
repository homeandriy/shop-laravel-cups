// import './scripts/run-jquery';
import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//Active size
$('.sizes li').on('click', function () {
    $(this).addClass('active').siblings().removeClass('active');
});


//Active color
$('.colors li').on('click', function () {
    let colorId = $(this).parent('a').data('variation');
    let productId = $(this).closest('.colors').eq(0).data('product');

    /**
     * Clear active
     */
    // $(this).addClass('active').siblings().removeClass('active');
    $(this).closest('.colors').eq(0).find('li').removeClass('active');
    $(this).addClass('active');
    /**
     * Add to cart
     */
    setDataToAddButton(productId, colorId);
    setDataToWishlistButton(productId, colorId);
    setStateToComponents(productId, colorId);
});

function setDataToAddButton(prodId, variation) {
    $(`.js-add-to-cart[data-product="${prodId}"]`).each((index, el) => $(el).data('variation', variation));
}
function setDataToWishlistButton(prodId, variation) {
    $(`.js-add-to-wishlist[data-product="${prodId}"]`).each((index, el) => $(el).data('variation', variation));
}
function setStateToComponents(prodId, variation) {
    let dataStorage = window[`variation_${prodId}`];
    if (!dataStorage instanceof Object) {
        return;
    }
    console.log(dataStorage[variation]);
    /**
     * Set Price
     */
    $(`.js-variation-name[data-product="${prodId}"]`).each((index, el) => $(el).text(`(${dataStorage[variation].name})`));
    /**
     * Set Discount Price
     */
    $(`.js-product-price[data-product="${prodId}"]`).each((index, el) => $(el).text(dataStorage[variation].price));
    /**
     * Set Color name in title
     */
    if (+dataStorage.old_price !== 0) {
        $(`.js-product-old-price[data-product="${prodId}"]`).each((index, el) => $(el).text(dataStorage[variation].old_price).parent('del').css({display:'inline-block'}));
    } else {
        $(`.js-product-old-price[data-product="${prodId}"]`).parent('del').css({display:'none'})
    }

}

function plusQuantity() {

}

function minusQuantity() {

}

function setQuantity() {

}

$('.add-to-cart, .js-add-to-cart').on('click', function (event) {
    event.preventDefault();
    addToCart(
        $(this),
        $(this).data('product'),
        $(this).data('variation')
    );
})

var myOffcanvas = document.getElementById('cart-right');
var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);

function addToCart(context, product, variationId = null) {
    $.post(
        '/cart/add',
        {
            product,
            variationId
        },
        function (response) {
            $('#cart-items').html(response.renderCart);
            bsOffcanvas.show()
        }
    )
}

function removeFromCart() {

}

function addToWishlist() {

}

function removeFromWishlist() {

}
