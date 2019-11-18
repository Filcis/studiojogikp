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
    <html class="no-js" <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
      <!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138688116-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138688116-1');
</script>
      <!-- Koniec Google Analytics -->

        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content">
                <?php esc_html_e( 'Skip to content', 'studiojogikp' ); ?>
            </a>
            <!--            get studiojogi header-->
            <?php get_template_part('header','studiojogikp'); ?>
                <!-- #masthead -->
                <div id="content" class="site-content">
