<?php

function global_settings_tabs() {
    ?>
    <h2 class="nav-tab-wrapper">
        <a href="?page=global_settings&tab=club" class="nav-tab <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'club') ? 'nav-tab-active' : ''; ?>">Club</a>
        <a href="?page=global_settings&tab=player" class="nav-tab <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'player') ? 'nav-tab-active' : ''; ?>">Player Settings</a>
        <a href="?page=global_settings&tab=partner" class="nav-tab <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'partner') ? 'nav-tab-active' : ''; ?>">Partner Logo</a>
        <a href="?page=global_settings&tab=broadcaster" class="nav-tab <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'broadcaster') ? 'nav-tab-active' : ''; ?>">Broadcaster</a>
        <a href="?page=global_settings&tab=colors" class="nav-tab <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'colors') ? 'nav-tab-active' : ''; ?>">Colors</a>
        <a href="?page=global_settings&tab=fonts" class="nav-tab <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'fonts') ? 'nav-tab-active' : ''; ?>">Fonts</a>
        <a href="?page=global_settings&tab=api" class="nav-tab <?php echo (isset($_GET['tab']) && $_GET['tab'] == 'api') ? 'nav-tab-active' : ''; ?>">API Settings</a>
    </h2>

    <?php
    if (isset($_GET['tab'])) {
        switch ($_GET['tab']) {
            case 'club':
                echo 'Club settings form here.';
                break;
            case 'player':
                echo 'Player settings form here.';
                break;
            case 'partner':
                echo 'Partner logo settings form here.';
                break;
            case 'broadcaster':
                echo 'Broadcaster settings form here.';
                break;
            case 'colors':
                echo 'Color settings form here.';
                break;
            case 'fonts':
                echo 'Font settings form here.';
                break;
            case 'api':
                echo 'API settings form here.';
                break;
            default:
                echo 'Please select a valid tab.';
                break;
        }
    }
}

global_settings_tabs();
