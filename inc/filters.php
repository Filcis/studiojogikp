<?php

//recent posts widget, change order for specific post type.

add_filter( 'widget_posts_args', 'your_custom_function' );

function your_custom_function( $args ) {
  global $post;
  if ( $post->post_type == 'sjkp_szkolenia' ) {
    $args = array(
      'post_type'  => array( 'sjkp_szkolenia' ),
      'meta_key' => 'sjkp_szkolenia-date_start',
      'orderby' => 'meta_value date',
      'order' => 'ASC',
    );
  } else if ( $post->post_type == 'sjkp_wyjazdy' ) {
    $args = array(
      'post_type'  => array( 'sjkp_wyjazdy' ),
      'meta_key' => 'sjkp_wyjazdy-date_start',
      'orderby' => 'meta_value date',
      'order' => 'ASC',
    );
  }
  return $args;
}
