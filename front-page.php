<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package studiojogikp
 */

get_header(); ?>
    <div id="primary" class="content-area__frontpage">
        <main id="main" class="site-main" role="main">
            <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
        </main>
        <!-- #main -->
            <?php if (is_front_page() && wp_is_mobile()) : ?>
    <div class="secondary-nav-wrapper clear">
        <nav id="secondary-site-navigation" class="tiled-navigation" role="navigation">
            <?php do_action('sjkp_header_tiled_menu') ?>
        </nav>
    </div>
    <?php endif; ?>
    </div>
    <!-- #primary -->
    <?php

get_footer();
