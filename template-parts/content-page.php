<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package studiojogikp
 */

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if ( !is_front_page() ) : ?>
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                <?php if(function_exists('bcn_display')){
                        bcn_display();
                    } ?>
                </div>
         <?php endif; ?>
            <header class="entry-header">
                <?php
            get_sjkp_subpage_icon();
             the_title( '<h1 class="entry-title">', '</h1>' ); ?> </header>
               <?php if ( has_post_thumbnail() ) : ?>
        <div class="page__thumbnail-wrapper">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php endif; ?>
            <div class="entry-content">
                <?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'studiojogikp' ),
				'after'  => '</div>',
			) );
		?> </div>
            <!-- .entry-content -->
            <?php if ( get_edit_post_link() ) : ?>
                <footer class="entry-footer">
                    <?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'studiojogikp' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?> </footer>
                <!-- .entry-footer -->
                <?php endif; ?>
    </article>
    <!-- #post-## -->