<?php
function studiojogikp_subpages(){
    global $post;
if ( $post->post_parent ) {
    $children = wp_list_pages( array(
        'title_li' => '',
        'child_of' => $post->post_parent,
        'echo'     => 0,
        'post_status'  => 'publish' 
    ) );
} else {
    $children = wp_list_pages( array(
        'title_li' => '',
        'child_of' => $post->ID,
        'echo'     => 0,
        'post_status'  => 'publish' 
    ) );
}
 
if ( $children ) : ?>
    <ul>
        <?php echo $children; ?>
    </ul>
    <?php endif;
}
add_action('studiojogikp_before_sidebar','studiojogikp_subpages');