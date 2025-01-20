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

// Include ACF Clubs Settings
// require_once get_template_directory() . '/includes/custom-dashboard.php';
// require_once get_template_directory() . '/includes/content-settings.php';
// require_once get_template_directory() . '/includes/marketing-settings.php';
// require_once get_template_directory() . '/includes/admin-settings.php';
// require_once get_template_directory() . '/includes/brand-settings.php';

// function include_acf_dashboard_files() {
//     $dashboard_path = get_template_directory() . '/acf-dashboard/';
//     include_once $dashboard_path . 'content.php';
//     include_once $dashboard_path . 'marketing.php';
//     include_once $dashboard_path . 'admin.php';
//     include_once $dashboard_path . 'brand.php';
// }
// add_action('init', 'include_acf_dashboard_files');

// Include Custom Dashboard Files
require_once get_template_directory() . '/custom-dashboard/enqueue-scripts.php';
require_once get_template_directory() . '/custom-dashboard/dashboard-init.php';

?>


