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

// Include Custom Dashboard Files
// require_once get_template_directory() . '/custom-dashboard/dashboard-init.php';
// require_once get_template_directory() . '/custom-dashboard/enqueue-scripts.php';
// Include the custom admin dashboard code
require_once get_template_directory() . '/inc/admin-dashboard.php';
