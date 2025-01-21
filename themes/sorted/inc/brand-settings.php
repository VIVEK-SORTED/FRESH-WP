<?php
// Include the settings-tabs.php to display tab navigation
include get_template_directory() . '/inc/settings-tabs.php';

function brand_tabs() {
    ?>
    <div class="wrap">
        <h1>Brand Settings</h1>
        
        <?php
        // Define the tabs for the Brand settings
        $tabs = array(
            'global' => 'Global Settings',
            'admin' => 'Admin Panel Settings',
            'app' => 'App-Specific Settings',
        );

        // Render the tab navigation using the function from settings-tabs.php
        render_settings_tabs($tabs, isset($_GET['tab']) ? $_GET['tab'] : 'global'); // Default to 'global' tab if none is selected
        
        // Display the content of the active tab
        if (isset($_GET['tab'])) {
            switch ($_GET['tab']) {
                case 'global':
                    include get_template_directory() . '/inc/global-settings.php';
                    break;
                case 'admin':
                    include get_template_directory() . '/inc/admin-panel-settings.php';
                    break;
                case 'app':
                    include get_template_directory() . '/inc/app-specific-settings.php';
                    break;
                default:
                    include get_template_directory() . '/inc/global-settings.php';
                    break;
            }
        } else {
            include get_template_directory() . '/inc/global-settings.php'; // Default to global settings
        }
        ?>
    </div>
    <?php
}

brand_tabs();
