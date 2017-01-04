<?php
/**
 * Template Name: Joga w pięknych miejscach
 *
 *
 * @package studiojogikp
 *
*/


get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
            </div>
            <?php   
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

				<section class="blog-post-excerpt">
                    <?php
                        the_date('', '<h2 class="post-date">', '</h2>');
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        the_post_thumbnail( 'full' ); ?>
                    <div class="post-meta-wrapper">
                    <?php
                        the_excerpt(); 
                    ?>
                        <a href="<?php echo get_permalink(); ?>"> więcej</a>
                    </div>
                </section>

			<?php endwhile;

			the_posts_navigation();

		else : ?>

			<p>nie ma jeszcze żadnych postów</p>

		<?php endif; ?>

        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
    <?php
get_sidebar();
get_footer();