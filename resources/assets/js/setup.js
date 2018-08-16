/**
 * axios
 */
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * toastr
 */
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "0",
    "hideDuration": "0",
    "timeOut": "4000",
    "extendedTimeOut": "1000",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

/**
 * Vue.js
 */
window.events = new Vue();

window.Vue.prototype.flash = function (message, type = 'success') {
    window.toastr[type](message);
};

window.Vue.prototype.consoleLog = function (...data) {
    console.log(...data);
};

/**
 * jQuery
 */
$(document).ready(function () {

    // Loading icon in submit buttons
    $('form').one('submit', function() {
        $(this).find('[type="submit"]').attr('disabled', true);
        $(this).find('[type="submit"]').prepend('<i class="fas fa-spinner fa-pulse fa-fw"></i>&nbsp;');
    });

    $('.custom-file-input').each(function () {
        $(this).on('change', function () {
            $(this).next('.custom-file-label').addClass("selected").html($(this).val());
        });
    });

    $('[data-tooltip="tooltip"]').tooltip()
});
