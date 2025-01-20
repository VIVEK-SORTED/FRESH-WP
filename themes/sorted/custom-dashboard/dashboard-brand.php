<?php
// Handle the Brand tab with dynamic sections
$current_section = isset($_GET['section']) ? $_GET['section'] : 'global-settings';

if ($current_section == 'global-settings') {
    include get_template_directory() . '/custom-dashboard/brand/global-settings.php';
} elseif ($current_section == 'admin-panel-settings') {
    include get_template_directory() . '/custom-dashboard/brand/admin-panel-settings.php';
} elseif ($current_section == 'app-specific-settings') {
    include get_template_directory() . '/custom-dashboard/brand/app-specific-settings.php';
} else {
    echo '<h1>Brand Tab</h1>';
    echo '<ul>
        <li><a href="?page=custom-dashboard-brand&section=global-settings">Global Settings</a></li>
        <li><a href="?page=custom-dashboard-brand&section=admin-panel-settings">Admin Panel Settings</a></li>
        <li><a href="?page=custom-dashboard-brand&section=app-specific-settings">App Specific Settings</a></li>
    </ul>';
}
