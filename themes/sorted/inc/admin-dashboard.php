<?php

function custom_dashboard_menu() {
    add_menu_page(
        'Custom Dashboard',   // Page title
        'Custom Dashboard',   // Menu title
        'manage_options',     // Capability
        'custom_dashboard',   // Menu slug
        'custom_dashboard_page', // Callback function
        'dashicons-admin-generic', // Icon
        2                      // Position
    );

    add_submenu_page(
        'custom_dashboard',   // Parent menu slug
        'Content',            // Page title
        'Content',            // Menu title
        'manage_options',     // Capability
        'content',            // Menu slug
        'content_page'        // Callback function
    );

    add_submenu_page(
        'custom_dashboard',   
        'Marketing',          
        'Marketing',          
        'manage_options',     
        'marketing',          
        'marketing_page'      
    );

    add_submenu_page(
        'custom_dashboard',   
        'Admin',              
        'Admin',              
        'manage_options',     
        'admin',              
        'admin_page'          
    );

    add_submenu_page(
        'custom_dashboard',   
        'Brand',              
        'Brand',              
        'manage_options',     
        'brand',              
        'brand_page'          
    );
}

add_action('admin_menu', 'custom_dashboard_menu');

function custom_dashboard_page() {
    echo '<div class="wrap"><h1>Welcome to the Custom Dashboard</h1></div>';
}

function content_page() {
    include get_template_directory() . '/inc/content-settings.php';
}

function marketing_page() {
    include get_template_directory() . '/inc/marketing-settings.php';
}

function admin_page() {
    include get_template_directory() . '/inc/admin-settings.php';
}

function brand_page() {
    include get_template_directory() . '/inc/brand-settings.php';
}
