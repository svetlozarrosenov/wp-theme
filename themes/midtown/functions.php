<?php
use WPEmerge\Facades\WPEmerge;

require_once( 'vendor/autoload.php' );

add_action( 'init', function() {
    session_start(); // required only if you use Flash and OldInput
} );

define( 'CRB_THEME_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

# Enqueue JS and CSS assets on the front-end
add_action( 'wp_enqueue_scripts', 'crb_enqueue_assets' );
function crb_enqueue_assets() {
	$template_dir = get_template_directory_uri();

	# Enqueue Custom JS files
	wp_enqueue_script(
		'theme-js-bundle',
		$template_dir . crb_assets_bundle( 'js/bundle.js' ),
		array( 'jquery' ), // deps
		null, // version -- this is handled by the bundle manifest
		true // in footer
	);

	# Enqueue Custom CSS files
	wp_enqueue_style(
		'theme-css-bundle',
		$template_dir . crb_assets_bundle( 'css/bundle.css' )
	);

	# The theme style.css file may contain overrides for the bundled styles
	crb_enqueue_style( 'theme-styles', $template_dir . '/style.css' );

	# Enqueue Comments JS file
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

# Enqueue JS and CSS assets on admin pages
add_action( 'admin_enqueue_scripts', 'crb_admin_enqueue_scripts' );
function crb_admin_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue Scripts
	# @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false
	# crb_enqueue_script( 'theme-admin-functions', $template_dir . '/js/admin-functions.js', array( 'jquery' ) );

	# Enqueue Styles
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
	# crb_enqueue_style( 'theme-admin-styles', $template_dir . '/css/admin-style.css' );

	# Editor Styles
	# add_editor_style( 'css/custom-editor-style.css' );
}

add_action( 'login_enqueue_scripts', 'crb_login_enqueue' );
function crb_login_enqueue() {
	crb_enqueue_style( 'theme-login-styles', get_template_directory_uri() . '/css/login-style.css' );
}

# Attach Custom Post Types and Custom Taxonomies
add_action( 'init', 'crb_attach_post_types_and_taxonomies', 0 );
function crb_attach_post_types_and_taxonomies() {
	# Attach Custom Post Types
	include_once( CRB_THEME_DIR . 'options/post-types.php' );

	# Attach Custom Taxonomies
	include_once( CRB_THEME_DIR . 'options/taxonomies.php' );
}

add_action( 'after_setup_theme', 'crb_setup_theme' );

# To override theme setup process in a child theme, add your own crb_setup_theme() to your child theme's
# functions.php file.
if ( ! function_exists( 'crb_setup_theme' ) ) {
	function crb_setup_theme() {
		# Make this theme available for translation.
		load_theme_textdomain( 'crb', get_template_directory() . '/languages' );

		# Autoload dependencies
		$autoload_dir = CRB_THEME_DIR . 'vendor/autoload.php';
		if ( ! is_readable( $autoload_dir ) ) {
			wp_die( __( 'Please, run <code>composer install</code> to download and install the theme dependencies.', 'crb' ) );
		}
		include_once( $autoload_dir );
		\Carbon_Fields\Carbon_Fields::boot();

		# Additional libraries and includes
		include_once( CRB_THEME_DIR . 'includes/admin-login.php' );
		include_once( CRB_THEME_DIR . 'includes/blocks.php' );
		include_once( CRB_THEME_DIR . 'includes/boot-blocks.php' );
		include_once( CRB_THEME_DIR . 'includes/comments.php' );
		include_once( CRB_THEME_DIR . 'includes/title.php' );
		include_once( CRB_THEME_DIR . 'includes/gravity-forms.php' );
		include_once( CRB_THEME_DIR . 'includes/socials.php' );
		include_once( CRB_THEME_DIR . 'includes/helpers.php' );		
		include_once( CRB_THEME_DIR . 'includes/CrbLoader.php' );

		WPEmerge::bootstrap( [
	        'routes' => [
	            'web' => get_template_directory() . '/app/routes/web.php',
	        ],
	        'providers' => [
	        	CrbLoader::class,
	        ],
	    ] );
	    
		add_image_size('crb_home_intro_image_size', 2000, 1150, true);
		add_image_size('crb_box_image_size', 958, 658, true);
		add_image_size('crb_feature_image_size', 458, 422, true);
		add_image_size('crb_block_image_size', 1440, 396, true);
		add_image_size('crb_html_block_image_size', 860, 529);
		add_image_size('crb_section_image_image_size', 1415, 397);

		# Theme supports
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'menus' );
		add_theme_support( 'html5', array( 'gallery' ) );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		# Register Theme Menu Locations
		
		register_nav_menus( array(
			'header-menu-left' => __( 'Header Menu Left', 'crb' ),
			'header-menu-right' => __( 'Header Menu Right', 'crb' ),
			'footer-menu-left' => __( 'Footer Menu Left', 'crb' ),
			'footer-menu-right' => __( 'Footer Menu Right', 'crb' ),
		) );
		

		# Attach custom widgets
		include_once( CRB_THEME_DIR . 'options/widgets.php' );

		# Attach custom shortcodes
		include_once( CRB_THEME_DIR . 'options/shortcodes.php' );

		# Add Actions
		add_action( 'widgets_init', 'crb_widgets_init' );
		add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

		# Add Filters
		add_filter( 'excerpt_more', 'crb_excerpt_more' );
		add_filter( 'excerpt_length', 'crb_excerpt_length', 999 );
		add_filter( 'crb_theme_favicon_uri', function() {
			return get_template_directory_uri() . '/dist/images/favicon.ico';
		} );
		add_filter( 'carbon_fields_map_field_api_key', 'crb_get_google_maps_api_key' );
	}
}

# Register Sidebars
# Note: In a child theme with custom crb_setup_theme() this function is not hooked to widgets_init
function crb_widgets_init() {
	$sidebar_options = array_merge( crb_get_default_sidebar_options(), array(
		'name' => __( 'Default Sidebar', 'crb' ),
		'id'   => 'default-sidebar',
	) );

	register_sidebar( $sidebar_options );
}

# Sidebar Options
function crb_get_default_sidebar_options() {
	return array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
	);
}

function crb_attach_theme_options() {
	# Attach fields
	include_once( CRB_THEME_DIR . 'options/theme-options.php' );
	include_once( CRB_THEME_DIR . 'options/post-meta.php' );
}

function crb_excerpt_more() {
	return '...';
}

function crb_excerpt_length() {
	return 55;
}

/**
 * Returns the Google Maps API Key set in Theme Options.
 *
 * @return string
 */
function crb_get_google_maps_api_key() {
	return carbon_get_theme_option( 'crb_google_maps_api_key' );
}

/**
 * Get the path to a versioned bundle relative to the theme directory.
 *
 * @param  string $path
 * @return string
 */
function crb_assets_bundle( $path ) {
	static $manifest = null;

	if ( is_null( $manifest ) ) {
		$manifest_path = CRB_THEME_DIR . 'dist/manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = array();
		}
	}

	$path = isset( $manifest[ $path ] ) ? $manifest[ $path ] : $path;

	return '/dist/' . $path;
}

/**
 * Sometimes, when using Gutenberg blocks the content output
 * contains empty unnecessary paragraph tags.
 *
 * In WP v5.2 this will be fixed, however, until then this function
 * acts as a temporary solution.
 *
 * @see https://core.trac.wordpress.org/ticket/45495
 *
 * @param  string $content
 * @return string
 */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'crb_fix_empty_paragraphs_in_blocks' );
function crb_fix_empty_paragraphs_in_blocks( $content ) {
	global $wp_version;

	if ( version_compare( $wp_version, '5.2', '<' ) && has_blocks() ) {
		return $content;
	}

	return wpautop( $content );
}

function crb_remove_editor() {
    if ( isset( $_GET['post'] ) ) {
    	$template = get_post_meta($_GET['post'], '_wp_page_template', true);

    	if ( ! ( $template === 'templates/plain_page.php' ) ) {
        	remove_post_type_support('page', 'editor');
    	}
    }
}
add_action('init', 'crb_remove_editor');

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/resources/images/logo.jpg);
		width:217px;
		height:228px;
		background-size: 217px 228px;
		background-repeat: no-repeat;
        padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url('/');
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );