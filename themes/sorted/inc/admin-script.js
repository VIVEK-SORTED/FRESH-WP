// Custom Admin JavaScript
jQuery(document).ready(function($) {
    console.log("Custom admin script loaded");

    // Example: Change background color of admin bar on hover
    $('#wpadminbar').hover(function() {
        $(this).css('background-color', '#1e1e1e');
    }, function() {
        $(this).css('background-color', '#23282d');
    });
});
