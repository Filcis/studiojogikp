<?php
/**
 * studiojogikp functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package studiojogikp
 */

if ( ! function_exists( 'studiojogikp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function studiojogikp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on studiojogikp, use a find and replace
	 * to change 'studiojogikp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'studiojogikp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'studiojogikp' ),
        'secondary' => esc_html__( 'Kafelki', 'studiojogikp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'studiojogikp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'studiojogikp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function studiojogikp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'studiojogikp_content_width', 640 );
}
add_action( 'after_setup_theme', 'studiojogikp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function studiojogikp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'studiojogikp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'studiojogikp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'studiojogikp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function studiojogikp_scripts() {
    wp_enqueue_style('studiojogikp-font','https://fonts.googleapis.com/css?family=Hind') ;
    
	wp_enqueue_style( 'studiojogikp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'studiojogikp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'studiojogikp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'studiojogikp_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';






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
        $output = wp_get_attachment_image( $thumb_id, 'poster') . esc_html($item->title);
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

function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if (is_front_page()){
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
    }
    }
    return $item_output;
    }
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );