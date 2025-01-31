<?php
// Remove default Posts, Pages, Media, Plugins, Appearance, Tools, Users, and Settings menus
function remove_default_menus() {
    // Remove Content-related menus
    remove_menu_page('edit.php');                // Removes Posts
    remove_menu_page('edit.php?post_type=page'); // Removes Pages
    remove_menu_page('upload.php');             // Removes Media

    // Remove Admin-related menus
    remove_menu_page('plugins.php');            // Removes Plugins
    remove_menu_page('themes.php');             // Removes Appearance
    remove_menu_page('tools.php');              // Removes Tools
    remove_menu_page('users.php');              // Removes Users
    remove_menu_page('options-general.php');    // Removes Settings
}
add_action('admin_menu', 'remove_default_menus', 999);

// Add Content menu and submenus (Articles, Pages, Media, Polls, Forms)
function add_content_menu_items() {
    // Add the main Content menu, but don't display it on the sidebar (empty callback function)
    // add_menu_page(
    //     'Content',               // Page title
    //     'Content',               // Menu title
    //     'manage_options',        // Capability
    //     'content-settings',      // Menu slug
    //     '',                      // No callback function to hide the menu's own page
    //     'dashicons-admin-post',  // Icon
    //     5                        // Position
    // );

    // Add Articles submenu
    add_submenu_page(
        'content-settings', 'Articles', 'Articles', 'manage_options',
        'edit.php?post_type=post', null
    );

    // Add Pages submenu
    add_submenu_page(
        'content-settings', 'Pages', 'Pages', 'manage_options',
        'edit.php?post_type=page', null
    );

    // Add Media submenu
    add_submenu_page(
        'content-settings', 'Media', 'Media', 'manage_options',
        'upload.php', null
    );

    // Add Polls submenu
    add_submenu_page(
        'content-settings', 'Polls', 'Polls', 'manage_options',
        'poll-settings', null
    );

    // Add Forms submenu
    add_submenu_page(
        'content-settings', 'Forms', 'Forms', 'manage_options',
        'form-settings', null
    );
}
add_action('admin_menu', 'add_content_menu_items');

// Add Admin menu and submenus (Plugins, Appearance, Tools, Users, Settings)
function add_admin_menu_items() {
    // Add Admin menu (it will be visible)
    // add_menu_page(
    //     'Admin',               // Page title
    //     'Admin',               // Menu title
    //     'manage_options',      // Capability
    //     'admin-settings',      // Menu slug
    //     '',                    // No callback function to hide the menu's own page
    //     'dashicons-admin-tools',  // Icon
    //     100                    // Position after Content menu
    // );

    // Add submenus under Admin
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
?>
