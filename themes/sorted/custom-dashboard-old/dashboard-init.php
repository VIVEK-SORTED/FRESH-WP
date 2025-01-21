<?php
// Add custom menu and submenu pages
function custom_dashboard_pages() {
    add_menu_page(
        'Dashboard', // Page title
        'Dashboard', // Menu title
        'manage_options', // Capability
        'custom-dashboard', // Menu slug
        'custom_dashboard_main_page', // Callback
        'dashicons-admin-generic', // Icon
        2 // Position
    );

    // Add Submenu Pages (Tabs)
    add_submenu_page(
        'custom-dashboard',
        'Content',
        'Content',
        'manage_options',
        'custom-dashboard-content',
        'custom_dashboard_content_page'
    );
    add_submenu_page(
        'custom-dashboard',
        'Marketing',
        'Marketing',
        'manage_options',
        'custom-dashboard-marketing',
        'custom_dashboard_marketing_page'
    );
    add_submenu_page(
        'custom-dashboard',
        'Admin',
        'Admin',
        'manage_options',
        'custom-dashboard-admin',
        'custom_dashboard_admin_page'
    );
    add_submenu_page(
        'custom-dashboard',
        'Brand',
        'Brand',
        'manage_options',
        'custom-dashboard-brand',
        'custom_dashboard_brand_page'
    );
}
add_action('admin_menu', 'custom_dashboard_pages');

// Callback Functions for Pages
function custom_dashboard_main_page() {
    echo '<h1>Welcome to the Custom Dashboard</h1>';
}

function custom_dashboard_content_page() {
    include get_template_directory() . '/custom-dashboard/dashboard-content.php';
}

function custom_dashboard_marketing_page() {
    include get_template_directory() . '/custom-dashboard/dashboard-marketing.php';
}

function custom_dashboard_admin_page() {
    include get_template_directory() . '/custom-dashboard/dashboard-admin.php';
}

function custom_dashboard_brand_page() {
    include get_template_directory() . '/custom-dashboard/dashboard-brand.php';
}
