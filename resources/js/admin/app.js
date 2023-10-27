import.meta.glob([
    '../fonts/** ',
    '../fonts/boxicons/** ',
]);
import './scripts/run-jquery.js'
import './ui-modals.js';
import './vendor/helpers.js';
import './vendor/menu.js';
import './ui-popover.js';
import './ui-toasts.js';
import './config.js';
import './../../libs/popper/popper.js';
import './vendor/bootstrap.js';
import './../../libs/perfect-scrollbar/perfect-scrollbar.js';
import './main.js';

import './scripts/images-preview.js'
import './scripts/image-action.js'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(() => {
    $(document).on('click', '.remove-image', function(e) {
        e.preventDefault()

        const $btn = $(this)

        axios.delete($btn.data('route'), {
            responseType: 'json'
        })
            .then(function (response) {
                $btn.parent().remove();
            })
            .catch(function (error) {
                // обработка ошибки
                console.log('error status', error.status)
                console.log('error message', error.data.message)
            })
    })
})
