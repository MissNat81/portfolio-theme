<?php
/**
 * Portfolio Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Portfolio_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function portfolio_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Portfolio Theme, use a find and replace
		* to change 'portfolio-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'portfolio-theme', get_template_directory() . '/languages' );

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

		// Custom Image crop sizes
		add_image_size('portrait-projects', 300, 200 );
		add_image_size('portrait-medium-projects', 400, 300, true );
		add_image_size('grid-projects', 400, 400, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'portfolio-theme' ),
			"footer" => esc_html__ ("Footer Menu Location", "portfolio-theme"),
			"social" => esc_html__ ("Social Menu Location", "portfolio-theme"),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'portfolio_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'portfolio_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portfolio_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'portfolio_theme_content_width', 1920 );
}
add_action( 'after_setup_theme', 'portfolio_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portfolio_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'portfolio-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'portfolio-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'portfolio_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function portfolio_theme_scripts() {

		// Load Google Fonts
		wp_enqueue_style('fwd-google-fonts', // Unique handle
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Source+Sans+Pro:wght@400;600&display=swap', // Path to css file
		array(), // dependencies
		null, // version (have to set null with Google fonts. Only time we enter null here instead of version number)
		'all', // media
	);

	wp_enqueue_style( 'portfolio-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'portfolio-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'portfolio-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue Hide/Show on Buttons on Single Projects Page
	if (is_singular ( 'portfolio-projects' ) ) {
		wp_enqueue_script(
			'hide-show-content',
			get_template_directory_uri() . '/js/hide-show-content.js',
			array('jquery'),
			'_S_VERSION',
			true
		);
	}

	// Enqueue Dark Mode //
		wp_enqueue_script(
			'dark-mode',
			get_template_directory_uri() . '/js/dark-mode.js',
			array('jquery'),
			'_S_VERSION',
			true
		);

}
add_action( 'wp_enqueue_scripts', 'portfolio_theme_scripts' );

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
 * Custom Post Types and Taxonomies
 */
require get_template_directory() . '/inc/cpt-taxonomy.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Change the Excerpt Length 
// Filter hooks always end with a return and always need at least 1 parameter
function portfolio_excerpt_length( $length ) {
		return 14;
	}
	
add_filter( 'excerpt_length', 'portfolio_excerpt_length', 999 );

// Change the Excerpt Ending 
function portfolio_excerpt_more ( $more ) {
		$more = '<a href="'. get_permalink() .'"
		class="learn-more"></a>';
		return $more;
}
add_filter( 'excerpt_more', 'portfolio_excerpt_more' );