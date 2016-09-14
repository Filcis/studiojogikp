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
Go to first child if any
*/
$childpages = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if ($childpages) {
$firstchild = $childpages[0];
wp_redirect(get_permalink($firstchild->ID));
}

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

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
if(is_page('szkola-jogi', 9) || $post->post_parent == '9'){
    if (is_active_sidebar('sidebar-szkola')){
        dynamic_sidebar('sidebar-szkola');
    }
}   elseif(is_page('wyjazdy', 19) || $post->post_parent == '19'){
    if (is_active_sidebar('sidebar-wyjazdy')){
        dynamic_sidebar('sidebar-szkola');
    }
}   elseif(is_page('szkola-jogi', 13) || $post->post_parent == '13'){
    if (is_active_sidebar('sidebar-specjalistyczne')){
        dynamic_sidebar('sidebar-szkola');
    }
}   elseif(is_page('szkola-jogi', 9) || $post->post_parent == '9'){
    if (is_active_sidebar('sidebar-szkola')){
        dynamic_sidebar('sidebar-szkola');
    }
}
else{
    get_sidebar();
}

get_footer();