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
function enqueue_admin_custom_styles_and_scripts() {
    wp_enqueue_style(
        'admin-custom-style', 
        get_template_directory_uri() . '/inc/admin-style.css'
    );

    wp_enqueue_script(
        'admin-custom-script',
        get_template_directory_uri() . '/inc/admin-script.js',
        ['jquery'], null, true
    );
}
add_action('admin_enqueue_scripts', 'enqueue_admin_custom_styles_and_scripts');

// Include external files
require_once get_template_directory() . '/inc/acf-options.php';
require_once get_template_directory() . '/inc/content-menus.php';
// Include colors-settings.php file
require_once get_template_directory() . '/inc/settings/colors-settings.php';

// Include the dynamic colors generator file
// require_once get_stylesheet_directory() . '/inc/settings/generate-dynamic-colors.php';

// Enqueue dynamic colors CSS
// function enqueue_dynamic_colors_css() {
//     // Ensure the file is generated first
//     generate_dynamic_colors_css();

//     // Get the path to the dynamically generated CSS file
//     $upload_dir = wp_upload_dir();
//     $css_file_url = $upload_dir['baseurl'] . '/dynamic-colors.css';

//     // Enqueue the dynamically generated CSS file
//     wp_enqueue_style('dynamic-colors-css', $css_file_url, array(), filemtime($upload_dir['basedir'] . '/dynamic-colors.css'));
// }
// add_action('wp_enqueue_scripts', 'enqueue_dynamic_colors_css');

function allow_custom_mime_types($mimes) {
    $mimes['ttf'] = 'font/ttf';
    $mimes['otf'] = 'font/otf';
    $mimes['woff'] = 'font/woff';
    $mimes['woff2'] = 'font/woff2';
    return $mimes;
}
add_filter('upload_mimes', 'allow_custom_mime_types');
