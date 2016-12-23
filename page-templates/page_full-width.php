<?php
/**
 * Template Name: Full Width Page
 *
 *
 * @package studiojogikp
 *

/*
Go to first child if any
*/

$childpages = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if ($childpages) {
$firstchild = $childpages[0];
wp_redirect(get_permalink($firstchild->ID));
}

get_header(); ?>
    <div id="primary" class="content-area-full">
        <main id="main" class="site-main" role="main">
            <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.

			endwhile; // End of the loop.
			?>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
    <?php
get_footer();