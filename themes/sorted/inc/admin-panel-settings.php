<?php
// Include the settings-tabs.php to display tab navigation
include get_template_directory() . '/inc/settings-tabs.php';

function admin_panel_settings_tabs() {
    ?>
    <div class="wrap">
        <h1>Admin Panel Settings</h1>
        
        <?php
        // Define the tabs for the Admin Panel settings
        $tabs = array(
            'roles' => 'Roles',
            'dashboard' => 'Dashboard',
            'users' => 'Users',
            'notifications' => 'Notifications',
        );

        // Render the tab navigation using the function from settings-tabs.php
        render_settings_tabs($tabs, isset($_GET['tab']) ? $_GET['tab'] : 'roles'); // Default to 'roles' tab if none is selected
        
        // Display the content of the active tab
        if (isset($_GET['tab'])) {
            switch ($_GET['tab']) {
                case 'roles':
                    echo 'Roles settings form here.';
                    break;
                case 'dashboard':
                    echo 'Dashboard settings form here.';
                    break;
                case 'users':
                    echo 'Users settings form here.';
                    break;
                case 'notifications':
                    echo 'Notifications settings form here.';
                    break;
                default:
                    echo 'Please select a valid tab.';
                    break;
            }
        }
        ?>
    </div>
    <?php
}

admin_panel_settings_tabs();
