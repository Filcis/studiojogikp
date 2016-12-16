<?php
add_action( 'init', 'studiojogikp_cpts_wyjazdy' );
function studiojogikp_cpts_wyjazdy() {
	$labels = array(
		"name" => __( 'Wyjazdy', 'studiojogikp' ),
		"singular_name" => __( 'Wyjazd', 'studiojogikp' ),
		);

	$args = array(
		"label" => __( 'wyjazdy', 'studiojogikp' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
        "menu_icon" => "dashicons-palmtree",
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "wyjazdy", "with_front" => true ),
		"query_var" => true,
		
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),		
			);
	register_post_type( "sjkp_wyjazdy", $args );

// End
}

add_action( 'init', 'studiojogikp_cpts_szkolenia' );
function studiojogikp_cpts_szkolenia() {
	$labels = array(
		"name" => __( 'Szkolenia', 'studiojogikp' ),
		"singular_name" => __( 'Szkolenie', 'studiojogikp' ),
		);

	$args = array(
		"label" => __( 'Szkolenia', 'studiojogikp' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
        "menu_icon" => "dashicons-star-filled",
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "szkolenia", "with_front" => true ),
		"query_var" => true,
		
		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),		
			);
	register_post_type( "sjkp_szkolenia", $args );

// End
}
