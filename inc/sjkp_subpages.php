<?php
function studiojogikp_subpages(){
    global $post;
if ( $post->post_parent ) {
    $children = wp_list_pages( array(
        'title_li' => '',
        'child_of' => $post->post_parent,
        'echo'     => 0,
        'post_status'  => 'publish',
        'sort_column' => 'menu_order'
    ) );
if ( $children ) : ?>
    <nav id="mobile-subnav" class="mobile-subnav clear">
<h3><?php echo get_the_title($post->post_parent)  ?></h3>
    <ul>
        <?php echo $children; ?>
    </ul>
</nav>
    <?php endif;
}
}

add_action('studiojogikp_subpages-list','studiojogikp_subpages');
