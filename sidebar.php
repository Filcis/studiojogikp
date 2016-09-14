<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package studiojogikp
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( ! is_active_sidebar( 'sidebar-1' ) || ! is_plugin_active('conditional-widgets/cets_conditional_widgets.php') ) {
	return;
}
?>
    <aside id="secondary" class="widget-area" role="complementary">
        <?php do_action( 'studiojogikp_before_sidebar' ); ?>
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside>
    <!-- #secondary -->