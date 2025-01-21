<?php
// Set default active primary and secondary tabs
$primary_tab = isset($_GET['primary_tab']) ? $_GET['primary_tab'] : 'global-settings';
$secondary_tab = isset($_GET['secondary_tab']) ? $_GET['secondary_tab'] : 'club';

// Primary Tab Navigation
echo '<h1>Brand Settings</h1>';
echo '<nav class="custom-dashboard-primary-tabs">';
echo '<ul>';
echo '<li><a href="?page=custom-dashboard-brand&primary_tab=global-settings" class="' . ($primary_tab === 'global-settings' ? 'active' : '') . '">Global Settings</a></li>';
echo '<li><a href="?page=custom-dashboard-brand&primary_tab=admin-panel-settings" class="' . ($primary_tab === 'admin-panel-settings' ? 'active' : '') . '">Admin Panel Settings</a></li>';
echo '<li><a href="?page=custom-dashboard-brand&primary_tab=app-specific-settings" class="' . ($primary_tab === 'app-specific-settings' ? 'active' : '') . '">App Specific Settings</a></li>';
echo '</ul>';
echo '</nav>';

// Content for Primary Tabs
if ($primary_tab === 'global-settings') {
    // Secondary Tab Navigation for Global Settings
    echo '<nav class="custom-dashboard-secondary-tabs">';
    echo '<ul>';
    echo '<li><a href="?page=custom-dashboard-brand&primary_tab=global-settings&secondary_tab=club" class="' . ($secondary_tab === 'club' ? 'active' : '') . '">Club</a></li>';
    echo '<li><a href="?page=custom-dashboard-brand&primary_tab=global-settings&secondary_tab=player-setting" class="' . ($secondary_tab === 'player-setting' ? 'active' : '') . '">Player Setting</a></li>';
    echo '<li><a href="?page=custom-dashboard-brand&primary_tab=global-settings&secondary_tab=partner-logo" class="' . ($secondary_tab === 'partner-logo' ? 'active' : '') . '">Partner Logo</a></li>';
    echo '<li><a href="?page=custom-dashboard-brand&primary_tab=global-settings&secondary_tab=broadcaster" class="' . ($secondary_tab === 'broadcaster' ? 'active' : '') . '">Broadcaster</a></li>';
    echo '<li><a href="?page=custom-dashboard-brand&primary_tab=global-settings&secondary_tab=colors" class="' . ($secondary_tab === 'colors' ? 'active' : '') . '">Colors</a></li>';
    echo '<li><a href="?page=custom-dashboard-brand&primary_tab=global-settings&secondary_tab=fonts" class="' . ($secondary_tab === 'fonts' ? 'active' : '') . '">Fonts</a></li>';
    echo '<li><a href="?page=custom-dashboard-brand&primary_tab=global-settings&secondary_tab=api-settings" class="' . ($secondary_tab === 'api-settings' ? 'active' : '') . '">API Settings</a></li>';
    echo '</ul>';
    echo '</nav>';

    // Load the appropriate file for Global Settings
    $file_to_include = get_template_directory() . '/custom-dashboard/brand/global-settings/' . $secondary_tab . '.php';
    if (file_exists($file_to_include)) {
        include $file_to_include;
    } else {
        echo '<p>Invalid secondary tab selected.</p>';
    }
} elseif ($primary_tab === 'admin-panel-settings') {
    include get_template_directory() . '/custom-dashboard/brand/admin-panel-settings.php';
} elseif ($primary_tab === 'app-specific-settings') {
    include get_template_directory() . '/custom-dashboard/brand/app-specific-settings.php';
} else {
    echo '<p>Please select a valid tab.</p>';
}
?>
