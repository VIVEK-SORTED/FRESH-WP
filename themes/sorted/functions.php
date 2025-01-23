<?php
// Theme setup
function sorted_theme_setup() {
    add_theme_support('menus');
    register_nav_menus([
        'main-menu' => __('Main Menu', 'sorted'),
    ]);
}
add_action('after_setup_theme', 'sorted_theme_setup');

// Enqueue admin styles and scripts
// function enqueue_admin_custom_styles_and_scripts() {
//     wp_enqueue_style(
//         'admin-custom-style', 
//         get_template_directory_uri() . '/inc/admin-style.css'
//     );

//     wp_enqueue_script(
//         'admin-custom-script',
//         get_template_directory_uri() . '/inc/admin-script.js',
//         ['jquery'], null, true
//     );
// }
// add_action('admin_enqueue_scripts', 'enqueue_admin_custom_styles_and_scripts');

// Include external files
require_once get_template_directory() . '/inc/acf-options.php';
require_once get_template_directory() . '/inc/content-menus.php';
