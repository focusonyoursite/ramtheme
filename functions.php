<?php
/**
 * RAM Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage RAM_Theme
 * @since RAM Theme 1.0
 */

// Adds theme support for post formats.
if ( ! function_exists( 'ramtheme_post_format_setup' ) ) :
	/**
	 * Adds theme support for post formats.
	 *
	 * @since RAM Theme 1.0
	 *
	 * @return void
	 */
	function ramtheme_post_format_setup() {
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'ramtheme_post_format_setup' );

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'ramtheme_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since RAM Theme 1.0
	 *
	 * @return void
	 */
	function ramtheme_editor_style() {
		add_editor_style( get_theme_file_uri( 'assets/css/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'ramtheme_editor_style' );

// Enqueues style.css on the front.
if ( ! function_exists( 'ramtheme_enqueue_styles' ) ) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since RAM Theme 1.0
	 *
	 * @return void
	 */
	function ramtheme_enqueue_styles() {
		wp_enqueue_style(
			'ramtheme-style',
			get_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'ramtheme_enqueue_styles' );

// Registers custom block styles.
if ( ! function_exists( 'ramtheme_block_styles' ) ) :
	/**
	 * Registers custom block styles.
	 *
	 * @since RAM Theme 1.0
	 *
	 * @return void
	 */
	function ramtheme_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'ramtheme' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

					ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'ramtheme_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'ramtheme_pattern_categories' ) ) :
	/**
	 * Registers pattern categories.
	 *
	 * @since RAM Theme 1.0
	 *
	 * @return void
	 */
	function ramtheme_pattern_categories() {

		register_block_pattern_category(
			'ramtheme_page',
			array(
				'label'       => __( 'Pages', 'ramtheme' ),
				'description' => __( 'A collection of full page layouts.', 'ramtheme' ),
			)
		);

		register_block_pattern_category(
			'ramtheme_post-format',
			array(
				'label'       => __( 'Post formats', 'ramtheme' ),
				'description' => __( 'A collection of post format patterns.', 'ramtheme' ),
			)
		);
	}
endif;
add_action( 'init', 'ramtheme_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'ramtheme_register_block_bindings' ) ) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since RAM Theme 1.0
	 *
	 * @return void
	 */
	function ramtheme_register_block_bindings() {
		register_block_bindings_source(
			'ramtheme/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'ramtheme' ),
				'get_value_callback' => 'ramtheme_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'ramtheme_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'ramtheme_format_binding' ) ) :
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since RAM Theme 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function ramtheme_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;

// Add theme support for basic features
add_action('after_setup_theme', function() {
    // Add support for block styles
    add_theme_support('wp-block-styles');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    
    // Add support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add support for custom logo
    add_theme_support('custom-logo');
    
    // Add support for title tag
    add_theme_support('title-tag');
    
    // Add support for HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for full site editing
    add_theme_support('block-templates');
});

// Register REST API routes
add_action('rest_api_init', function() {
    // Register menus endpoint
    register_rest_route('wp/v2', '/menus', array(
        'methods' => 'GET',
        'callback' => function() {
            $menus = wp_get_nav_menus();
            return rest_ensure_response($menus);
        },
        'permission_callback' => '__return_true'
    ));

    // Register menu items endpoint
    register_rest_route('wp/v2', '/menu-items/(?P<menu_id>\d+)', array(
        'methods' => 'GET',
        'callback' => function($request) {
            $menu_id = $request['menu_id'];
            $menu_items = wp_get_nav_menu_items($menu_id);
            return rest_ensure_response($menu_items);
        },
        'permission_callback' => '__return_true'
    ));
});

// Fix REST API CORS issues
add_action('init', function() {
    remove_filter('rest_pre_serve_request', 'rest_send_cors_headers');
    add_filter('rest_pre_serve_request', function($value) {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
        return $value;
    });
}, 15);

// Fix REST API permissions
add_filter('rest_authentication_errors', function($result) {
    if (!empty($result)) {
        return $result;
    }
    if (!is_user_logged_in()) {
        return true;
    }
    return $result;
});
