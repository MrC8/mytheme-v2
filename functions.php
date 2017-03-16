<?php
/**
 * wiatheme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wiatheme
 */
 
 
// enlever la meta generator
remove_action('wp_head', 'wp_generator');


// activer les shortcode dans widget
add_filter('widget_text', 'do_shortcode');


/////// enlever le # au liens readmore
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );



/* Custom ajax loader */
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
	return  get_stylesheet_directory_uri(). '/img/contact-ajax-loader.gif';
}


/* Modifier l'affichage du titre des actualités */
add_filter( 'get_the_archive_title', 'my_get_the_archive_title');
function my_get_the_archive_title() {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
		} elseif ( is_archive() ) {
            $title = 'Archives de ' . get_the_date('F Y');			
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
}

 

if ( ! function_exists( 'wiatheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wiatheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wiatheme, use a find and replace
	 * to change 'wiatheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wiatheme', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'wiatheme' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wiatheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // wiatheme_setup
add_action( 'after_setup_theme', 'wiatheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wiatheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wiatheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wiatheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wiatheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wiatheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wiatheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wiatheme_scripts() {
	//wp_enqueue_style( 'wiatheme-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wiatheme-style', get_template_directory_uri() . '/css/style.min.css' );

	wp_enqueue_script( 'wia-js', get_template_directory_uri() . '/dist/wia.min.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wiatheme_scripts' );

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


/////// enlever les script wonderplugin partout sauf sur la home
function wpdocs_dequeue_script() {
	if ( !is_front_page() && !is_home() ){
	   wp_dequeue_script( 'wonderplugin-slider-skins-script' );
	   wp_deregister_script( 'wonderplugin-slider-skins-script' );
	   
	   wp_dequeue_script( 'wonderplugin-slider-script' );
	   wp_deregister_script( 'wonderplugin-slider-script' );
	   
	   wp_dequeue_style('wonderplugin-slider-css');
	   wp_deregister_style( 'wonderplugin-slider-css' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_script', 20 );


/////// enlever les script contact form partout sauf sur la page contact
function ac_remove_cf7_scripts() {
	if ( !is_page('16')){
		wp_deregister_style( 'contact-form-7' );
		wp_deregister_script( 'contact-form-7' );
	}
}
add_action( 'wp_enqueue_scripts', 'ac_remove_cf7_scripts' );
