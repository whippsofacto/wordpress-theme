<?php
/**
 * whippsoFacto functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package whippsoFacto
 */

if ( ! function_exists( 'whippsofacto_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function whippsofacto_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on whippsoFacto, use a find and replace
	 * to change 'whippsofacto' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'whippsofacto', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'whippsofacto' ),
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
	add_theme_support( 'custom-background', apply_filters( 'whippsofacto_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	* My Custom Stuff is below here!
  *
	* 1. Add video header as part of the CUSTOMIZE section of homepage
	* 2. Add my Custom Page/Post-Type
	* 3. include Featured Images
	* 4. Add tags
	* 5. Search Shortcode
	* 6. Tags Shortcode
	* 7. Extend the get_the_archive_title() function to remove the word "TAG"
	*/

	//1: Activate Video and Graphic Header
	include 'includes/_video-header.php';

	//2: Add my post-type
	include 'includes/_custom-page-type.php';

	//3: Enable featured images
	add_theme_support( 'post-thumbnails' );

	//4: Make tags available on projects pages
	// add tag support to pages
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'projects');
}

 //5: Search as shortcode
 add_shortcode('search-short-code', 'get_search_form');

 //6. Tags as shortcode
 		function sc_taglist(){
     return get_the_tag_list();
   }
 add_shortcode('tags', 'sc_taglist');

//7 Remove "tag" from get_archive_title()
add_filter( 'get_the_archive_title', function ($title) {
       if ( is_tag() ) {
            $title = single_tag_title( '', false );
          }
     return $title;
});
// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');

	 /**
	 * -----------------------------------------------------------------------//
	 *         						end of my section
	 * -----------------------------------------------------------------------//
	 */

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'whippsofacto_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function whippsofacto_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'whippsofacto_content_width', 640 );
}
add_action( 'after_setup_theme', 'whippsofacto_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function whippsofacto_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'whippsofacto' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'whippsofacto' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'whippsofacto_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function whippsofacto_scripts() {
	wp_enqueue_style( 'whippsofacto-style', get_stylesheet_uri() );

	wp_enqueue_script( 'whippsofacto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'whippsofacto-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	/* Enqueue my own minfied javascript files*/
	// scroller
	wp_enqueue_script('nav-scroller', get_template_directory_uri() . '/js/jquery.nav.js', array(), '20151215', true );

	//myScript
	wp_enqueue_script( 'whippsofacto-script-min', get_template_directory_uri() . '/js/script.min.js', array(), '20151215', true );

	// font Awesome
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');




	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'whippsofacto_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Live relload server
 */
 if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
   wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
   wp_enqueue_script('livereload');
 }
