require('./bootstrap');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap3');
} catch (e) {}

require('select2');
require('../../node_modules/adminlte-rtl/dist/js/app.min');
require('../../node_modules/jquery-validation/dist/localization/messages_ar');
$('form.required').validate();

/**
 * delete modal
 */
$('.delete-modal-btn').click(function () {
    $('#delete-modal').modal('show');
    $('#delete-modal-form').attr('action', $(this).data('url'));
});

$('.select2').select2();

/**
 * alert
 */
$('.hide-5s').delay(5000).fadeOut('slow');

/**
 * generate password
 */
$('.show-password').click(function () {
    $('.show-password i').toggleClass('fa-eye fa-eye-slash');
    $('.password').toggleAttr('type', 'password', 'text');
});

$('.generate-password').click(function () {
    var field = $('.password');
    field.val(randString(field));
});

