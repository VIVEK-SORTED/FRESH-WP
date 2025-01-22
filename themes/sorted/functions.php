<?php
function sorted_theme_setup() {
    // Enable support for menus
    add_theme_support( 'menus' );

    // Register navigation menu
    register_nav_menus( array(
        'main-menu' => __( 'Main Menu', 'sorted' ),
    ) );
}
add_action( 'after_setup_theme', 'sorted_theme_setup' );

require_once get_template_directory() . '/inc/acf-options.php';

?>

