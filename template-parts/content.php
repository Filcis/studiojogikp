<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package studiojogikp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
        if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php studiojogikp_posted_on(); ?>
		</div><!-- .entry-meta -->
    <header class="entry-header">
		<?php
		endif; 
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		?>
	</header><!-- .entry-header -->
           <?php if ( has_post_thumbnail() ) : ?>
        <div class="page__thumbnail-wrapper">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php endif; ?>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Czytaj dalej %s <span class="meta-nav">&rarr;</span>', 'studiojogikp' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'studiojogikp' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php studiojogikp_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
