<?php
// Theme setup
function sorted_theme_setup() {
    add_theme_support('menus');
    register_nav_menus([
        'main-menu' => __('Main Menu', 'sorted'),
    ]);
}
add_action('after_setup_theme', 'sorted_theme_setup');

// Enqueue custom admin styles and scripts
function enqueue_admin_custom_styles_and_scripts() {
    wp_enqueue_style(
        'admin-custom-style', 
        get_template_directory_uri() . '/inc/admin-style.css'
    );

    wp_enqueue_script(
        'admin-custom-script',
        get_template_directory_uri() . '/inc/admin-script.js',
        array('jquery'), // Dependencies
        null,            // Version
        true             // Load in footer
    );
}
add_action('admin_enqueue_scripts', 'enqueue_admin_custom_styles_and_scripts');

// Include external files (optional based on your setup)
require_once get_template_directory() . '/inc/acf-options.php';
require_once get_template_directory() . '/inc/content-menus.php';


// Dynamically set the upload directory based on the selected folder
function custom_upload_directory($uploads) {
    if (isset($_POST['media_folder']) && !empty($_POST['media_folder'])) {
        $folder = sanitize_text_field($_POST['media_folder']);
        $custom_path = WP_CONTENT_DIR . '/uploads/' . $folder;

        // Ensure the folder exists or create it
        if (!file_exists($custom_path)) {
            wp_mkdir_p($custom_path);
        }

        // Update the upload paths to use the selected folder
        $uploads['path'] = $custom_path;
        $uploads['url'] = content_url('/uploads/' . $folder);
        $uploads['subdir'] = ''; // Prevent WordPress from appending YYYY/MM structure
        $uploads['basedir'] = WP_CONTENT_DIR . '/uploads';
        $uploads['baseurl'] = content_url('/uploads');
    }

    return $uploads;
}
add_filter('upload_dir', 'custom_upload_directory');

// Add folder selection and creation fields to Media Upload form
function add_folder_fields_to_upload_form($form_fields, $post) {
    // Get all existing folders in the uploads directory
    $upload_dir = wp_upload_dir();
    $folders = array_filter(glob($upload_dir['basedir'] . '/*'), 'is_dir');

    // Generate folder options for dropdown
    $folder_options = '<option value="">Default</option>';
    foreach ($folders as $folder_path) {
        $folder_name = basename($folder_path);
        $folder_options .= '<option value="' . esc_attr($folder_name) . '">' . esc_html($folder_name) . '</option>';
    }

    // Add folder selection dropdown
    $form_fields['media_folder'] = array(
        'label' => 'Select Folder',
        'input' => 'html',
        'html' => '<select name="media_folder" id="media_folder">' . $folder_options . '</select>'
    );

    // Add input for creating a new folder
    $form_fields['new_folder'] = array(
        'label' => 'Create New Folder',
        'input' => 'html',
        'html' => '<input type="text" name="new_folder" id="new_folder" placeholder="New Folder Name" />'
    );

    return $form_fields;
}
add_filter('attachment_fields_to_edit', 'add_folder_fields_to_upload_form', 10, 2);

// Handle folder creation and metadata saving
function save_media_folder_metadata($post_id) {
    // Handle new folder creation
    if (isset($_POST['new_folder']) && !empty($_POST['new_folder'])) {
        $new_folder = sanitize_text_field($_POST['new_folder']);
        $custom_path = WP_CONTENT_DIR . '/uploads/' . $new_folder;

        if (!file_exists($custom_path)) {
            wp_mkdir_p($custom_path);
        }

        update_post_meta($post_id, '_media_folder', $new_folder); // Save folder metadata
    }

    // Save selected folder metadata
    if (isset($_POST['media_folder']) && !empty($_POST['media_folder'])) {
        $selected_folder = sanitize_text_field($_POST['media_folder']);
        update_post_meta($post_id, '_media_folder', $selected_folder);
    }
}
add_action('add_attachment', 'save_media_folder_metadata');

// Add a custom column to the Media Library to display folders
function add_media_folder_column($columns) {
    $columns['media_folder'] = 'Folder';
    return $columns;
}
add_filter('manage_media_columns', 'add_media_folder_column');

// Populate the custom folder column with metadata
function add_media_folder_column_content($column_name, $post_id) {
    if ($column_name === 'media_folder') {
        $folder = get_post_meta($post_id, '_media_folder', true);
        echo esc_html($folder ? $folder : 'Default');
    }
}
add_action('manage_media_custom_column', 'add_media_folder_column_content', 10, 2);

// Add a folder filter dropdown to the Media Library
function filter_media_library_by_folder($post_type) {
    if ($post_type !== 'attachment') return;

    // Get unique folders from media metadata
    $folders = array();
    $attachments = get_posts(array(
        'post_type' => 'attachment',
        'posts_per_page' => -1,
        'post_status' => 'any',
        'meta_query' => array(
            array(
                'key' => '_media_folder',
                'compare' => 'EXISTS',
            ),
        ),
    ));

    foreach ($attachments as $attachment) {
        $folder = get_post_meta($attachment->ID, '_media_folder', true);
        if ($folder && !in_array($folder, $folders)) {
            $folders[] = $folder;
        }
    }

    // Render the filter dropdown
    echo '<select name="media_folder_filter">';
    echo '<option value="">All Folders</option>';
    foreach ($folders as $folder) {
        $selected = (isset($_GET['media_folder_filter']) && $_GET['media_folder_filter'] === $folder) ? 'selected="selected"' : '';
        echo '<option value="' . esc_attr($folder) . '" ' . $selected . '>' . esc_html($folder) . '</option>';
    }
    echo '</select>';
}
add_action('restrict_manage_posts', 'filter_media_library_by_folder');

// Filter the Media Library query based on the selected folder
function filter_media_query_by_folder($query) {
    if (isset($_GET['media_folder_filter']) && !empty($_GET['media_folder_filter'])) {
        $query->set('meta_query', array(
            array(
                'key' => '_media_folder',
                'value' => sanitize_text_field($_GET['media_folder_filter']),
                'compare' => '=',
            ),
        ));
    }
}
add_action('pre_get_posts', 'filter_media_query_by_folder');
