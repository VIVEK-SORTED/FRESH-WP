<?php
// Enqueue styles and scripts for admin
function custom_dashboard_enqueue_scripts() {
    wp_enqueue_style('custom-dashboard-styles', get_template_directory_uri() . '/custom-dashboard/css/dashboard.css');
    wp_enqueue_script('custom-dashboard-scripts', get_template_directory_uri() . '/custom-dashboard/js/dashboard.js', ['jquery'], null, true);
}
add_action('admin_enqueue_scripts', 'custom_dashboard_enqueue_scripts');
