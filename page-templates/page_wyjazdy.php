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
                // WP_Query arguments
                $args = array (
                        'post_type'  => array( 'sjkp_wyjazdy' ),
                        'orderby' => 'meta_value date',
                        'meta_key' => 'sjkp_wyjazdy-date_start',
                        'order' => 'ASC',
                );

                // The Query
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
            ?>
                <section class="post-excerpt">
                    <?php
                        the_title( '<h1 class="entry-title">', '</h1>' );
                        the_post_thumbnail( 'full' ); ?>
                    <div class="post-meta-wrapper">
                    <?php
                        echo the_sjkp_meta('wyjazdy');
                        the_excerpt();
                            ?>
                        <a href="<?php echo get_permalink(); ?>"> więcej</a>
                    </div>
                    <div></div>
                </section>
                <?php
                    }
                } else {
                ?>
                    <p>nie ma jeszcze żadnych postów</p>
                    <?php
                }
                ?>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->
    <?php
get_sidebar();
get_footer();
