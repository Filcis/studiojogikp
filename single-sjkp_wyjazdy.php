<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package studiojogikp
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

      ?>
      <div class="sjkp_posts_navigation">
        <?php
        previous_post_link_plus(array (
          'order_by' => 'custom',
          'meta_key' => 'sjkp_wyjazdy-date_start',
          'format' => '%link',
        ));
        next_post_link_plus(array (
          'order_by' => 'custom',
          'meta_key' => 'sjkp_wyjazdy-date_start',
          'format' => '%link',
        ));
        ?>
      </div>
      <?php
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
