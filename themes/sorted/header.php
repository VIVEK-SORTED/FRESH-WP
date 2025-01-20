<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?> <!-- Loads WordPress scripts and styles -->
</head>
<body <?php body_class(); ?>>
<header>
    <div class="site-header">
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <p><?php bloginfo( 'description' ); ?></p>
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main-menu', // Use the registered 'main-menu' location
                'container'      => 'ul',       // Wrap menu items in a <ul>
                'menu_class'     => 'menu',     // Add a CSS class to the <ul>
                'fallback_cb'    => false       // Disable fallback menu
            ) );
            ?>
        </nav>
    </div>
</header>
