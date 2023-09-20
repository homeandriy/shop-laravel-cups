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
