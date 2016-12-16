<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package studiojogikp
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( ! is_active_sidebar( 'sidebar-1' )) {
	return;
}
?>  
    <aside id="secondary" class="widget-area" role="complementary">
        <div class="widget-area__anchor"></div>
        <div class="widget-wrapper">
        <?php do_action( 'studiojogikp_before_sidebar' ); ?>
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
    </aside>
    <!-- #secondary -->