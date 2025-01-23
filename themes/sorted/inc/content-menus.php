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

    // Add custom submenu items
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

// Callback for Polls submenu
function render_poll_settings_page() {
    echo '<div class="wrap"><h1>Poll Settings</h1><p>Manage poll-related settings here.</p></div>';
}

// Callback for Forms submenu
function render_form_settings_page() {
    echo '<div class="wrap"><h1>Form Settings</h1><p>Manage form-related settings here.</p></div>';
}

// Rename "Posts" to "Articles"
function rename_post_to_article($labels) {
    if (isset($labels->name)) $labels->name = 'Articles';
    if (isset($labels->singular_name)) $labels->singular_name = 'Article';
    if (isset($labels->add_new)) $labels->add_new = 'Add New Article';
    if (isset($labels->add_new_item)) $labels->add_new_item = 'Add New Article';
    if (isset($labels->edit_item)) $labels->edit_item = 'Edit Article';
    if (isset($labels->new_item)) $labels->new_item = 'New Article';
    if (isset($labels->view_item)) $labels->view_item = 'View Article';
    if (isset($labels->search_items)) $labels->search_items = 'Search Articles';
    if (isset($labels->not_found)) $labels->not_found = 'No articles found';
    if (isset($labels->not_found_in_trash)) $labels->not_found_in_trash = 'No articles found in Trash';
    if (isset($labels->all_items)) $labels->all_items = 'All Articles';
    if (isset($labels->menu_name)) $labels->menu_name = 'Articles';
    return $labels;
}
add_filter('post_type_labels_post', 'rename_post_to_article');
