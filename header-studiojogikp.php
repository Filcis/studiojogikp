<header id="masthead" class="site-header" role="banner">
    <div class="fullwidth-nav-wrapper">
        <div class="main-nav-wrapper clear">
            <div class="site-branding"> <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_template_directory_uri() . '/assets/logo poziom.png' ?>"></a> </div>
            <button class="menu-toggle-button"><span>menu</span></button>
            <!-- .site-branding -->
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav>
            <nav id="site-navigation-mobile" class="mobile-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
            </nav>
        </div>
    </div>

    <?php
    do_action('studiojogikp_subpages-list');
    ?>

    <!-- #site-navigation kafelki -->
    <?php if (!is_front_page() || !wp_is_mobile()) : ?>
    <div class="secondary-nav-wrapper clear">
        <nav id="secondary-site-navigation" class="tiled-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu-tiles', 'walker' => new sjkp_tiled_menu() ) ); ?>
        </nav>
    </div>
    <?php endif; ?>
</header>
