<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package studiojogikp
 */

?>
    </div>
    <!-- #content -->
    <div class="footer-area full-wrapper">
        <div class="page-content-wrapper">
            <footer id="colophon" class="site-footer" role="contentinfo">
                <div class="site-info">
                    <div id="hl-footer-sidebar1">
                        <?php
			if(is_active_sidebar('sjkp-footer-sidebar-1')){
			dynamic_sidebar('sjkp-footer-sidebar-1');
			}
			?>
                    </div>
                    <div id="sjkp-footer-sidebar2">
                        <?php
			if(is_active_sidebar('sjkp-footer-sidebar-2')){
			dynamic_sidebar('sjkp-footer-sidebar-2');
			}
			?>
                    </div>
                    <div id="sjkp-footer-sidebar3">
                        <?php
			if(is_active_sidebar('sjkp-footer-sidebar-3')){
			dynamic_sidebar('sjkp-footer-sidebar-3');
			}
			?>
                    </div>
                    <div id="sjkp-footer-sidebar4">
                        <?php
			if(is_active_sidebar('sjkp-footer-sidebar-4')){
			dynamic_sidebar('sjkp-footer-sidebar-4');
			}
			?>
                    </div>
                </div>
                <!-- .site-info -->
            </footer>
            <!-- #colophon -->
        </div>
        <!-- #page -->
        <?php wp_footer(); ?>
            </body>

            </html>