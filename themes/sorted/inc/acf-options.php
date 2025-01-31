<?php
// Check if ACF is activated and the function is available
if (function_exists('acf_add_options_page')) {
    // Add Content Settings page
    acf_add_options_page([
        'page_title' => 'Content Settings',
        'menu_title' => 'Content Settings',
        'menu_slug'  => 'content-settings', // Unique slug for this page
        'capability' => 'manage_options', // User permission required to access
        'redirect'   => false, // Do not redirect to first submenu
        'position'   => 5, // Position in the menu
        'icon_url'   => 'dashicons-admin-post', // Icon for the menu
    ]);

    // Add Admin Settings page
    acf_add_options_page([
        'page_title' => 'Admin Settings',
        'menu_title' => 'Admin Settings',
        'menu_slug'  => 'admin-settings',
        'capability' => 'manage_options',
        'redirect'   => false, 
        'position'   => 6,
        'icon_url'   => 'dashicons-admin-generic',
    ]);
}
