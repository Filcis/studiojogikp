<?php

// Add filter to specific menus 
add_filter('wp_nav_menu_args', 'add_filter_to_menus');
function add_filter_to_menus($args) {

    // You can test against things like $args['menu'], $args['menu_id'] or $args['theme_location']
    if( $args['theme_location'] == 'secondary') {
        add_filter( 'wp_setup_nav_menu_item', 'filter_menu_items' );
    }

    return $args;
}

// Filter menu
function filter_menu_items($item) {
        // Get post and image ID
        $post_id = url_to_postid( $item->url );
        $thumb_id = get_post_thumbnail_id( $post_id );

    if( !empty($thumb_id) ) {
        // Make the title just be the featured image.
        $thumb_image = wp_get_attachment_image_url( $thumb_id, 'poster');
        // jeżeli menu nie znajduje się na stronie głównej, dodaj nazwę do linku
        if( !is_front_page()){
        $output = '<div class="menu-tiles" style="background-image: url('. $thumb_image . ')"></div>'. esc_html($item->title);
        } else {
            $output = '<div class="menu-tiles" style="background-image: url('. $thumb_image . ')"></div>';
        }
        $item->title = $output;
    }

    return $item;
}


// Remove filters
add_filter('wp_nav_menu_items','remove_filter_from_menus', 10, 2);
function remove_filter_from_menus( $nav, $args ) {
    remove_filter( 'wp_setup_nav_menu_item', 'filter_menu_items' );
    return $nav;
}
// na stronie głównej dodaj opisy linków do kafelków
function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if (is_front_page()){
    if ( !empty( $item->description ) ) {
        //stylizowanie opisu (br po każdym przecinku)
        $item->description = str_replace(',',',<br>',$item->description);
        //dodaj link do output
        $item_output = str_replace( $args->link_after . '</a>',
                                   $args->link_after . '</a> <p class="menu-item-description">' . $item->description . '</p><a href='. esc_html($item->url) .'>więcej...</a>',
                                   $item_output );
    }
    }
    return $item_output;
    }
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );
