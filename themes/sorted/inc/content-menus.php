<?php
// Remove default menus
function remove_default_menus() {
    remove_menu_page('edit.php');                // Posts
    remove_menu_page('edit.php?post_type=page'); // Pages
    remove_menu_page('upload.php');             // Media
    remove_menu_page('plugins.php');            // Plugins
    remove_menu_page('themes.php');             // Appearance
    remove_menu_page('tools.php');              // Tools
    remove_menu_page('users.php');              // Users
    remove_menu_page('options-general.php');    // Settings
    remove_menu_page('edit-comments.php');      // Comments
}
add_action('admin_menu', 'remove_default_menus', 999);

// Add Content menu and submenus
function add_content_menu_items() {
    // add_menu_page(
    //     'Content Settings', 'Content', 'manage_options', 'content-settings', 'render_content_settings_page',
    //     'dashicons-admin-post', 5
    // );

    add_submenu_page(
        'content-settings', 'Articles', 'Articles', 'manage_options',
        'edit.php?post_type=post', null
    );

    add_submenu_page(
        'content-settings', 'Pages', 'Pages', 'manage_options',
        'edit.php?post_type=page', null
    );

    add_submenu_page(
        'content-settings', 'Media', 'Media', 'manage_options',
        'upload.php', null
    );

    add_submenu_page(
        'content-settings', 'Polls', 'Polls', 'manage_options',
        'poll-settings', 'render_poll_settings_page'
    );

    add_submenu_page(
        'content-settings', 'Forms', 'Forms', 'manage_options',
        'form-settings', 'render_form_settings_page'
    );
}
add_action('admin_menu', 'add_content_menu_items');

// Add Admin menu and submenus
function add_admin_menu_items() {
    // add_menu_page(
    //     'Admin', 'Admin', 'manage_options', 'admin-settings', 'render_admin_settings_page',
    //     'dashicons-admin-generic', 6
    // );

    add_submenu_page(
        'admin-settings', 'Plugins', 'Plugins', 'manage_options',
        'plugins.php', null
    );

    add_submenu_page(
        'admin-settings', 'Appearance', 'Appearance', 'manage_options',
        'themes.php', null
    );

    add_submenu_page(
        'admin-settings', 'Tools', 'Tools', 'manage_options',
        'tools.php', null
    );

    add_submenu_page(
        'admin-settings', 'Users', 'Users', 'manage_options',
        'users.php', null
    );

    add_submenu_page(
        'admin-settings', 'Settings', 'Settings', 'manage_options',
        'options-general.php', null
    );
}
add_action('admin_menu', 'add_admin_menu_items');

// Render content page
function render_content_settings_page() {
    echo '<div class="wrap"><h1>Content Settings</h1><p>Welcome to the Content Settings page.</p></div>';
}

function render_poll_settings_page() {
    echo '<div class="wrap"><h1>Poll Settings</h1><p>Manage poll-related settings here.</p></div>';
}

function render_form_settings_page() {
    echo '<div class="wrap"><h1>Form Settings</h1><p>Manage form-related settings here.</p></div>';
}

function render_admin_settings_page() {
    echo '<div class="wrap"><h1>Admin Settings</h1><p>Welcome to the Admin Settings page.</p></div>';
}

// Enqueue custom admin styles
function enqueue_custom_admin_styles() {
    wp_enqueue_style(
        'custom-admin-style',
        get_template_directory_uri() . '/inc/admin-menu-style.css'
    );
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_styles');
