<?php

class sjkp_tiled_menu extends Walker_Nav_Menu {
  
    //the function responsible for displaying the current element we are on. In the case of menus, this means the <li> tag and the item's link.
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        
    	$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;
        $post_id = url_to_postid( $item->url );
        $thumb_id = get_post_thumbnail_id($post_id);
        
        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        
        if( $permalink && $permalink != '#' ) {
      	$output .= '<a href="' . $permalink . '">';
      } else {
      	$output .= '<span>';
      }
        //jeżeli ma thumbnaila to dodaj do linka
        if(!empty( $thumb_id)){
            
            // Make the title just be the featured image.
            $thumb_image = wp_get_attachment_image_url( $thumb_id, 'poster');
            $output .= '<div class="menu-tiles" style="background-image: url('. $thumb_image . ')">';      
        }
        //dodaj nazwę
        if(is_front_page() && $description != '' && $depth == 0 ) { 
        //na stronie głównej umieść opis w dolnej części kafelka
        $description = str_replace(',',',<br>',$description);
        $output .= '</div><div class ="sjkp_page_icon"></div>';
        $output .= '<span class ="tiles-title">'. $title .'</span>';
      	$output .= '<p class="description__home">' . $description . '</p>';
        } elseif ($description != '' && $depth == 0) {
        //na podstronach umieść opis na kafelku
        $output .= '<div class="description"><p>' . $description . '</p></div>';
        $output .= '</div><div class ="sjkp_page_icon"></div>';
        $output .= '<span class ="tiles-title">'. $title .'</span>';
        } else {
        $output .= '</div><div class ="sjkp_page_icon"></div>';
        $output .= '<span class ="tiles-title">'. $title .'</span>';
        }
        
      if( $permalink && $permalink != '#' ) {
      	$output .= '</a>';
      } else {
      	$output .= '</span>';
      }
    }
    
}
       
?>