<?php
// Include the settings-tabs.php to display tab navigation
include get_template_directory() . '/inc/settings-tabs.php';

function app_specific_settings_tabs() {
    ?>
    <div class="wrap">
        <h1>App-Specific Settings</h1>
        
        <?php
        // Define the tabs for the App-Specific settings
        $tabs = array(
            'app_config' => 'App Configuration',
            'api_keys' => 'API Keys',
            'security' => 'Security Settings',
        );

        // Render the tab navigation using the function from settings-tabs.php
        render_settings_tabs($tabs, isset($_GET['tab']) ? $_GET['tab'] : 'app_config'); // Default to 'app_config' tab if none is selected
        
        // Display the content of the active tab
        if (isset($_GET['tab'])) {
            switch ($_GET['tab']) {
                case 'app_config':
                    echo 'App configuration form here.';
                    break;
                case 'api_keys':
                    echo 'API keys management form here.';
                    break;
                case 'security':
                    echo 'Security settings form here.';
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

app_specific_settings_tabs();
