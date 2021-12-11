<?php
/**
 * Ravon theme functions and definitions
 *
 * @package Ravon
 */

if ( ! function_exists( 'ravon_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ravon_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ravon, use a find and replace
		 * to change 'ravon' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'ravon', get_template_directory() . '/languages' );

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
		 * Enable support for custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 400,
			'width'       => 580,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// Theme Image Sizes
		add_image_size( 'ravon-featured', 1920, 1000, true );
		add_image_size( 'ravon-featured-single', 1920, 0, true );

		// This theme uses wp_nav_menu() in one locations.
		register_nav_menus( array (
			'primary-menu' => esc_html__( 'Primary Menu', 'ravon' ),
		) );

		// This theme styles the visual editor to resemble the theme style.
		//add_editor_style( array ( 'css/editor-style.css', ravon_fonts_url() ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array (
			'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		// Custom header
		add_theme_support( 'custom-header', apply_filters( 'ravon_custom_header_args', array(
			'width'  => 1920,
			'height' => 99,
		) ) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ravon_custom_background_args', array (
			'default-color' => 'f2f2f2',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'assets/css/style-editor.css' );
	}
}

add_action( 'after_setup_theme', 'ravon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ravon_content_width() {
	// phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ravon_content_width', 774 );
}
add_action( 'after_setup_theme', 'ravon_content_width', 0 );

/**
 * Register and Enqueue Styles.
 */
function ravon_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );

	// fontawesome CSS
	wp_register_style( 'fontawesome', get_theme_file_uri( 'assets/css/fontawesome.css' ), array(), '5.15.1' );
	// bootstrap CSS
	wp_register_style( 'bootstrap', get_theme_file_uri( 'assets/css/bootstrap.css' ), array(), '4.5.3' );
	wp_register_style( 'ravon-style', get_stylesheet_uri(), array(), $theme_version );
	wp_style_add_data( 'ravon-style', 'rtl', 'replace' );
	
	wp_enqueue_style( 'fontawesome' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'ravon-style' );

	/* Check Header Image */
	$ravon_header_image = get_header_image();

	if ( ! empty( $ravon_header_image ) ) {
		$ravon_header_image_css = ".site-header { background-image: url( " . esc_url( $ravon_header_image ) . " ); background-repeat: no-repeat !important; background-position: 50% 50% !important; -webkit-background-size: cover !important; -moz-background-size: cover !important; -o-background-size: cover !important; background-size: cover !important; }";
		wp_add_inline_style( 'ravon-style', $ravon_header_image_css );
	}
}

add_action( 'wp_enqueue_scripts', 'ravon_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function ravon_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script( 'ravon-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '', true );
	
	// Add bootstrap JS
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '4.5.3', true );
	wp_register_script( 'ravon-js', get_template_directory_uri() . '/assets/js/ravon-script.js', array('jquery'), $theme_version, true );
	wp_register_script( 'navigation-js', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), $theme_version, true );
	
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'ravon-js' );
	wp_enqueue_script( 'navigation-js' );
	wp_script_add_data( 'ravon-js', 'async', true );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'ravon_register_scripts' );

if ( ! function_exists( 'ravon_the_posts_pagination' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function ravon_the_posts_pagination() {

	the_posts_pagination( array(
		'prev_text'          => '<span class="screen-reader-text">' . esc_html__( 'Previous Page', 'ravon' ) . '</span>',
		'next_text'          => '<span class="screen-reader-text">' . esc_html__( 'Next Page', 'ravon' ) . '</span>',
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'ravon' ) . ' </span>',
	) );
}
endif;

if ( ! function_exists( 'ravon_the_post_pagination' ) ) :
/**
 * Previous/next post navigation.
 *
 * @return void
 */
function ravon_the_post_pagination() {

	the_post_navigation( array(
		'next_text' => '<span class="meta-nav">' . esc_html__( 'Next', 'ravon' ) . '</span> ' . '<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav">' . esc_html__( 'Prev', 'ravon' ) . '</span> ' . '<span class="post-title">%title</span>',
	) );
}
endif;

/**
 * Theme Mod Wrapper
 *
 * @param string $theme_mod - Name of the theme mod to retrieve.
 * @return mixed
 */
function ravon_mod( $theme_mod = '' ) {
	return get_theme_mod( $theme_mod, ravon_default( $theme_mod ) );
}

/**
 * Theme has Sidebar or Not
 *
 * @return bool
 */
function ravon_has_sidebar() {

	/**
	 * Sidebar Filter
	 * @return bool
	 */
	return apply_filters( 'ravon_has_sidebar', (bool) is_active_sidebar( 'sidebar-1' ) );
}

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ravon_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title subheading heading-size-3">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer #1.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Main Sidebar', 'ravon' ),
				'id'          => 'sidebar-1',
				'description' => __( 'Widgets in this area will be displayed in the page/post.', 'ravon' ),
			)
		)
	);
}

add_action( 'widgets_init', 'ravon_sidebar_registration' );
// Include customize main file
if ( file_exists( get_template_directory() . '/lib/customize/class-ravon-customize.php' ) ) {
	require get_template_directory() . '/lib/customize/class-ravon-customize.php';
}
//Include navigation walker file
if ( file_exists( get_template_directory() . '/lib/naviation/ravon-navigation-walker.php' ) ) {
	require get_template_directory() . '/lib/naviation/ravon-navigation-walker.php';
}
