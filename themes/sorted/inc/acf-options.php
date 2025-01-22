<?php
// Ensure ACF is active
if (function_exists('acf_add_options_page')) {
    // Add the main Brand menu
    acf_add_options_page(array(
        'page_title' => 'Brand Settings',
        'menu_title' => 'Brand',
        'menu_slug'  => 'brand-settings',
        'capability' => 'manage_options',
        'redirect'   => false,
        'position'   => 2,
        'icon_url'   => 'dashicons-art', // Customize the icon
    ));

    // Add submenus under Brand
    acf_add_options_sub_page(array(
        'page_title'  => 'Global Settings',
        'menu_title'  => 'Global Settings',
        'parent_slug' => 'brand-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Admin Panel Settings',
        'menu_title'  => 'Admin Panel Settings',
        'parent_slug' => 'brand-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'App Specific Settings',
        'menu_title'  => 'App Specific Settings',
        'parent_slug' => 'brand-settings',
    ));
}
