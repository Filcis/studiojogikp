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

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'studiojogikp' ),
    'mobile' => esc_html__( 'Menu mobilne', 'studiojogikp')
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

    register_sidebar( array(
        'name'          => esc_html__( 'Footer kolumna 1', 'studiojogikp' ),
        'id'            => 'sjkp-footer-sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'studiojogikp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="footer-title">',
		'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer kolumna 2', 'studiojogikp' ),
        'id'            => 'sjkp-footer-sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'studiojogikp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="footer-title">',
		'after_title'   => '</h4>',
    ) );

register_sidebar( array(
        'name'          => esc_html__( 'Footer kolumna 3', 'studiojogikp' ),
        'id'            => 'sjkp-footer-sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'studiojogikp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="footer-title">',
		'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer kolumna 4', 'studiojogikp' ),
    'id'            => 'sjkp-footer-sidebar-4',
		'description'   => esc_html__( 'Add widgets here.', 'studiojogikp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="footer-title">',
		'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'studiojogikp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function studiojogikp_scripts() {

  wp_enqueue_style('studiojogikp-font','https://fonts.googleapis.com/css?family=Hind&subset=latin,latin-ext') ;
  wp_enqueue_style( 'studiojogikp-style', get_stylesheet_uri() );
	wp_enqueue_script( 'studiojogikp-handlers', get_template_directory_uri() . '/js/event_handlers.js', array(), '1', true );
  wp_enqueue_script( 'scritps', get_template_directory_uri() . '/js/theme.js', array(), false, false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function sj_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
	 wp_enqueue_style( 'sj-gutenberg', get_stylesheet_uri(), false, '@@pkg.version', 'all' );
}

add_action( 'enqueue_block_editor_assets', 'sj_gutenberg_styles' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/studiojogikp_posttypes.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * SJKP specific
 */

require get_template_directory() . '/inc/metaboxes.php';

require get_template_directory() . '/inc/sjkp_shortcodes.php';

/**
 * Custom filters
 */
require get_template_directory() . '/inc/filters.php';
