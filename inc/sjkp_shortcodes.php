<?php
// Add Shortcode
function sjkp_lead_shortcode( $atts , $content = null ) {
    $output = '<div class="text__lead">' . $content . '</div>';
    return $output;
}
add_shortcode( 'sjkp_lead', 'sjkp_lead_shortcode' );

// Add Shortcode
//function sjkp_icon( $atts ) {
//
//	// Attributes
//	$atts = shortcode_atts(
//		array(
//			'typ' => '',
//		),
//		$atts
//	);
//    $output = '<img class="icon-text">' . $content . 
//
//}
//add_shortcode( 'sjkp_ikona', 'custom_shortcode' );