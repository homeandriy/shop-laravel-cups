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
    console.log($(this).parent('a'));
    let colorId = $(this).parent('a').data('variation');
    let productId = $(this).closest('.colors').eq(0).data('product');
    console.log(colorId, productId)
    $(this).addClass('active').siblings().removeClass('active');
});


function plusQuantity() {

}

function minusQuantity() {

}

function setQuantity() {

}

$('.add-to-cart').on('click', function (event) {
    event.preventDefault();
    addToCart(
        $(this),
        $(this).data('product'),
        $(this).data('color')
    );
})

var myOffcanvas = document.getElementById('cart-right');
var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);

function addToCart(context, product, color = null) {
    $.post(
        '/cart/add',
        {
            product,
            color
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
