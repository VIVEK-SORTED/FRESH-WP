<?php

// Function to display the navigation tabs for different settings sections
function render_settings_tabs($tabs, $active_tab = '') {
    ?>
    <h2 class="nav-tab-wrapper">
        <?php
        // Loop through the tabs and render each one
        foreach ($tabs as $tab_slug => $tab_name) {
            $class = ($tab_slug === $active_tab) ? 'nav-tab-active' : ''; // Add active class to the current tab
            $url = add_query_arg('tab', $tab_slug); // Generate the URL with the active tab as a query parameter
            echo "<a href='{$url}' class='nav-tab {$class}'>{$tab_name}</a>";
        }
        ?>
    </h2>
    <?php
}
