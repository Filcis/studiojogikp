<?php
function studiojogikp_sidebar_metabox (){
add_meta_box(
    "studiojogikp_sidebar", 
    "własny sidebar", 
    "studiojogikp_sidebar_build_metaboxes",
    "", 
    "normal", 
    "high");
}
//dodaj metaboxa
add_action( 'add_meta_boxes', 'studiojogikp_sidebar_metabox' );
//zawartość metaboxa
function studiojogikp_sidebar_build_metaboxes($post) {
    //zabezpieczenie przed atakami  CSRF
    
    wp_nonce_field(basename(__FILE__), "studiojogikp_sidebar_box_nonce");
    $sidebar_checkbox_value = get_post_meta($post->ID, "meta-box-sidebar", true);
    ?>
    <label for="meta-box-sidebar">czy strona posiada własny sidebar:</label>
    <input name="meta-box-sidebar" type="checkbox" value="0" <?php checked($sidebar_checkbox_value, '0');  ?>>
    <?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 */
function studiojogikp_save_sidebar_meta_box($post_id, $post, $update){

    if ( !isset( $_POST["studiojogikp_sidebar_box_nonce"] ) || !wp_verify_nonce( $_POST["studiojogikp_sidebar_box_nonce"], basename( __FILE__ ) ) ){
	return;
}
 
    $studiojogikp_save_meta_sidebar = "";

    if(isset($_POST["meta-box-sidebar"]))
    {
       $studiojogikp_save_meta_sidebar = $_POST["meta-box-sidebar"];
    }   
        update_post_meta($post_id, "meta-box-sidebar", $studiojogikp_save_meta_sidebar);
    
}

add_action("save_post", "studiojogikp_save_sidebar_meta_box", 10, 3);