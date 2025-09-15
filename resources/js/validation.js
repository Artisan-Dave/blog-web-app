// Import jQuery first
import $ from 'jquery';
window.$ = $;
window.jQuery = $;


import 'parsleyjs'

document.addEventListener('DOMContentLoaded', () => {
    // Initialize ALL forms with data-parsley-validate
    $('form.validate').parsley();

    // console.log('Parsley loaded:', typeof $.fn.parsley);
});


