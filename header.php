<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package studiojogikp
 */

?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content">
                <?php esc_html_e( 'Skip to content', 'studiojogikp' ); ?>
            </a>
            <header id="masthead" class="site-header" role="banner">
                <div class="main-nav-wrapper clear">
                    <div class="site-branding"> <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri() . '/assets/logo.jpg' ?>"></a> </div>
                    <!-- .site-branding -->
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <?php esc_html_e( 'Primary Menu', 'studiojogikp' ); ?>
                        </button>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                    </nav>
                </div>
                <!-- #site-navigation -->
                <div class="secondary-nav-wrapper clear">
                    <nav id="secondary-site-navigation" class="tiled-navigation" role="navigation">
                        <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu-tiles' ) ); ?>
                    </nav>
                </div>
            </header>
            <!-- #masthead -->
            <div id="content" class="site-content">