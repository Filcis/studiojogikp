<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package studiojogikp
 */

/*
Go to first child if any and content is not empty
*/

$childpages = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if ($childpages && $post->post_content=="") {
    $firstchild = $childpages[0];
    wp_redirect(get_permalink($firstchild->ID));
}

get_header(); ?>
    <div id="primary" class="content-area">
        <span class="article-header-strip"></span>
        <main id="main" class="site-main" role="main">
            <?php
			while ( have_posts() ) : the_post();
                if ($post->post_parent > 0){
				get_template_part( 'template-parts/content', 'subpage' );
                } else {
                    get_template_part( 'template-parts/content', 'page' );
                }
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
    <?php
get_sidebar();
get_footer();