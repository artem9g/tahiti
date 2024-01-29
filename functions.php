<?php
/**
 * tahiti functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package tahiti
 */

function tahiti_enqueue_scripts(){
	wp_enqueue_style("foundation",get_template_directory_uri()."/assets/css/foundation.min.css",array(),"20230103","all");
	wp_enqueue_style("tahiti-app",get_template_directory_uri()."/assets/css/app_min.css",array("foundation"),"1.0","all");
	wp_enqueue_style("slick",get_template_directory_uri()."/assets/slick/slick.css",array(),"20230103","all");
	wp_enqueue_script("foundation",get_template_directory_uri()."/assets/js/vendor/foundation.min.js",array("jquery"),"",true);
	wp_enqueue_script("tahiti-app",get_template_directory_uri()."/assets/js/app.js",array("foundation"),"",true);
	wp_enqueue_script("what-input",get_template_directory_uri()."/assets/js/vendor/what-input.js",array("jquery"),"",true);
	wp_enqueue_script("slick",get_template_directory_uri()."/assets/slick/slick.min.js",array("jquery"),"",true);
}
add_action("wp_enqueue_scripts","tahiti_enqueue_scripts") ;
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support(
		'custom-logo',
		array(
			'height'      => 45,
			'width'       => 45, 
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	//menus register
function tahiti_register_menus() {
    register_nav_menus(array(
        "header_nav" => "Header Navigation",
        'footer_menu_column_1' => __('Footer Menu Column 1'),
        'footer_menu_column_2' => __('Footer Menu Column 2'),
        'footer_menu_column_3' => __('Footer Menu Column 3')
    ));
}
add_action("after_setup_theme", "tahiti_register_menus", 0);

// A filter for changing menu output arguments
function custom_wp_nav_menu_args($args) {
    $args['container'] = false;
    return $args;
}
add_filter('wp_nav_menu_args', 'custom_wp_nav_menu_args');

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
function tahiti_setup() {
	load_theme_textdomain( 'tahiti', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
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
			'tahiti_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'tahiti_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tahiti_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tahiti_content_width', 640 );
}
add_action( 'after_setup_theme', 'tahiti_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tahiti_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tahiti' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tahiti' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tahiti_widgets_init' );

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

if (isset($_POST['submit_button'])) {
    $selected_option = isset($_POST['island-selector']) ? esc_url($_POST['island-selector']) : '';
    if ($selected_option) {
        wp_redirect($selected_option);
        exit();
    }
}

/*  AddToAny Instagram */
function addtoany_add_share_services_instagram( $services ) {
    $services['example_share_service'] = array(
        'name'        => 'Instagram',
        'icon_url'    => site_url('/wp-content/plugins/add-to-any/icons/instagram.png'),
        'icon_width'  => 46,
        'icon_height' => 46,
        'href'        => 'https://www.instagram.com/change-in-functions.php', // change URL for Instagram
    );
    return $services;
}
add_filter( 'A2A_SHARE_SAVE_services', 'addtoany_add_share_services_instagram', 10, 1 );

/* AddToAny YouTube */
function addtoany_add_share_services_youtube( $services ) {
    $services['youtube'] = array(
        'name'        => 'YouTube',
        'icon_url'    => site_url('/wp-content/plugins/add-to-any/icons/youtube.png'),  
        'icon_width'  => 40,
        'icon_height' => 40,
        'href'        => 'https://www.youtube.com/change-in-functions.php', // change URL for YouTube
    );
    return $services;
}

add_filter( 'A2A_SHARE_SAVE_services', 'addtoany_add_share_services_youtube', 10, 1 );
function cptui_register_my_cpts_island() {

	/**
	 * Post Type: Islands.
	 */

	$labels = [
		"name" => esc_html__( "Islands", "tahiti" ),
		"singular_name" => esc_html__( "Island", "tahiti" ),
		"add_new" => esc_html__( "Add new island", "tahiti" ),
		"add_new_item" => esc_html__( "Add new island", "tahiti" ),
		"new_item" => esc_html__( "New island", "tahiti" ),
	];

	$args = [
		"label" => esc_html__( "Islands", "tahiti" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => true,
		"rewrite" => [ "slug" => "island", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-flag",
		"supports" => [ "title", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "island", $args );
}

add_action( 'init', 'cptui_register_my_cpts_island' );
