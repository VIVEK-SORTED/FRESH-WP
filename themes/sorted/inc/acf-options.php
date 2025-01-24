<?php
// Ensure ACF is active
if (function_exists('acf_add_options_page')) {
    // Add Content settings page
    acf_add_options_page([
        'page_title' => 'Content Settings',
        'menu_title' => 'Content',
        'menu_slug'  => 'content-settings',
        'capability' => 'manage_options',
        'redirect'   => false,
        'position'   => 5,
        'icon_url'   => 'dashicons-admin-post',
    ]);

    // Add Admin settings page
    acf_add_options_page([
        'page_title' => 'Admin Settings',
        'menu_title' => 'Admin',
        'menu_slug'  => 'admin-settings',
        'capability' => 'manage_options',
        'redirect'   => false,
        'position'   => 6,
        'icon_url'   => 'dashicons-admin-generic',
    ]);
    
}
