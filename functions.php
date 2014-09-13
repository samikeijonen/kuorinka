<?php
/**
 * Kuorinka functions and definitions
 *
 * @package Kuorinka
 */

/**
 * The current version of the theme.
 */
define( 'KUORINKA_VERSION', '1.0.6' );

/**
 * The suffix to use for scripts.
 */
if ( ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ) {
	define( 'KUORINKA_SUFFIX', '' );
} else {
	define( 'KUORINKA_SUFFIX', '.min' );
}

if ( ! function_exists( 'kuorinka_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kuorinka_setup() {

	/**
	* Set the content width based on the theme's design and stylesheet.
	*/
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 880; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kuorinka, use a find and replace
	 * to change 'kuorinka' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kuorinka', get_template_directory() . '/languages' );

	/* Add default posts and comments RSS feed links to head. */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/* This theme uses wp_nav_menu() in three locations. */
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'kuorinka' ),
		'social'    => __( 'Social Menu', 'kuorinka' ),
		'portfolio' => __( 'Portfolio Menu', 'kuorinka' )
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'audio', 'aside', 'image', 'video', 'quote', 'link', 'status', 'gallery'
	) );
	
	/* Add custom image sizes. */
	add_image_size( 'kuorinka-large', 720, 405, true );
	add_image_size( 'kuorinka-thumbnail', 250, 250, true );
	
	/* Enable theme layouts. */
	add_theme_support( 
		'theme-layouts', 
		array( 
			'1c'   => __( '1 Column', 'kuorinka' ),
			'2c-l' => __( '2 Columns: Content / Sidebar', 'kuorinka' ),
			'2c-r' => __( '2 Columns: Sidebar / Content', 'kuorinka' )
		), 
		array( 'default' => is_rtl() ? '2c-r' : '2c-l' ) 
	);
	
	/* Add theme support for breadcrumb trail. */
	add_theme_support( 'breadcrumb-trail' );
	
	/* Add excerpt support for team member. */
	add_post_type_support( 'team-member', 'excerpt' );
	
	/* Add custom-header support for portfolio. */
	add_post_type_support( 'portfolio_item', 'custom-header' );
	
	/* Add editor styles. */
	add_editor_style( kuorinka_get_editor_styles() );
	
}
endif; // kuorinka_setup
add_action( 'after_setup_theme', 'kuorinka_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kuorinka_widgets_init() {

	$sidebar_header_args = array(
		'id'            => 'header',
		'name'          => _x( 'Header', 'sidebar', 'kuorinka' ),
		'description'   => __( 'Header sidebar. It is displayed on top of the page.', 'kuorinka' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
	);

	$sidebar_primary_args = array(
		'id'            => 'primary',
		'name'          => _x( 'Primary', 'sidebar', 'kuorinka' ),
		'description'   => __( 'The main sidebar. It is displayed on right side of the page.', 'kuorinka' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
	);
	
	$sidebar_subsidiary_args = array(
		'id'            => 'subsidiary',
		'name'          => _x( 'Subsidiary', 'sidebar', 'kuorinka' ),
		'description'   => __( 'A sidebar located in the footer of the site.', 'kuorinka' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
	);
	
	$sidebar_front_page_args = apply_filters( 'kuorinka_sidebar_front_page_args', array(
		'id'            => 'front-page',
		'name'          => _x( 'Front Page', 'sidebar', 'kuorinka' ),
		'description'   => __( 'A sidebar located in the Front Page Template.', 'kuorinka' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>'
	) );
	
	/* Register sidebars. */
	register_sidebar( $sidebar_header_args );
	register_sidebar( $sidebar_primary_args );
	register_sidebar( $sidebar_subsidiary_args );
	register_sidebar( $sidebar_front_page_args );
	
}
add_action( 'widgets_init', 'kuorinka_widgets_init' );

/**
 * Return the Google font stylesheet URL
 */
function kuorinka_fonts_url() {

	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'kuorinka' );

	/* Translators: If there are characters in your language that are not
	 * supported by Roboto Condensed, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto_condensed = _x( 'on', 'Roboto Condensed font: on or off', 'kuorinka' );

	if ( 'off' !== $source_sans_pro || 'off' !== $roboto_condensed ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:400,600,700,400italic,600italic,700italic';

		if ( 'off' !== $roboto_condensed )
			$font_families[] = 'Roboto Condensed:300,400,700,300italic,400italic,700italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function kuorinka_scripts() {
	
	/* Enqueue parent theme styles. */
	wp_enqueue_style( 'kuorinka-style', trailingslashit( get_template_directory_uri() ) . 'style' . KUORINKA_SUFFIX . '.css', array(), KUORINKA_VERSION );

	/* Enqueue right to left styles. */
	if ( is_rtl() ) {
		wp_enqueue_style( 'kuorinka-rtl-style', trailingslashit( get_template_directory_uri() ) . 'style-rtl' . KUORINKA_SUFFIX . '.css', array( 'kuorinka-style' ), KUORINKA_VERSION );
	}
	
	/* Enqueue child theme styles. */
	if ( is_child_theme() ) {
		wp_enqueue_style( 'kuorinka-child-style', get_stylesheet_uri(), array(), null );
	}
	
	/* Enqueue Fitvids. */
	wp_enqueue_script( 'kuorinka-fitvids', trailingslashit( get_template_directory_uri() ) . 'js/fitvids/fitvids' . KUORINKA_SUFFIX . '.js', array( 'jquery' ), KUORINKA_VERSION, true );
	
	/* Fitvids settings. */
	wp_enqueue_script( 'kuorinka-fitvids-settings', trailingslashit( get_template_directory_uri() ) . 'js/fitvids/settings' . KUORINKA_SUFFIX . '.js', array( 'kuorinka-fitvids' ), KUORINKA_VERSION, true );
	
	/* Enqueue responsive navigation if primary menu is in use. */
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script( 'kuorinka-navigation', get_template_directory_uri() . '/js/responsive-nav' . KUORINKA_SUFFIX . '.js', array(), KUORINKA_VERSION, true );
	
		/* Enqueue settings. */
		wp_enqueue_script( 'kuorinka-settings', trailingslashit( get_template_directory_uri() ) . 'js/settings' . KUORINKA_SUFFIX . '.js', array( 'kuorinka-navigation' ), KUORINKA_VERSION, true );
	}
	
	/* Enqueue functions. */
	wp_enqueue_script( 'kuorinka-script', get_template_directory_uri() . '/js/functions' . KUORINKA_SUFFIX . '.js', array(), KUORINKA_VERSION, true );
	
	/* Enqueue fonts. */
	wp_enqueue_style( 'kuorinka-fonts', kuorinka_fonts_url(), array(), null );
	
	/* Add Genericons font, used in the main stylesheet. */
	wp_enqueue_style( 'genericons', trailingslashit( get_template_directory_uri() ) . 'fonts/genericons/genericons/genericons' . KUORINKA_SUFFIX . '.css', array(), '3.1' );
	
	/* Enqueue comment reply. */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kuorinka_scripts' );

/**
 * Enqueue theme fonts in admin header page.
 *
 * @since 1.0.0
 * @return void
 */
function kuorinka_custom_header_styles() {

	/* Load fonts. */
	wp_enqueue_style( 'kuorinka-fonts', kuorinka_fonts_url(), array(), null );
	
	/* Load css/admin-custom-header.css file. */
	wp_enqueue_style( 'kuorinka-admin-custom-header', trailingslashit( get_template_directory_uri() ) . 'css/admin-custom-header.css' );
	
	/* Load css/admin-custom-header.css file from child theme if it exists. */
	if ( is_child_theme() ) {
		$dir = trailingslashit( get_stylesheet_directory() );
		$uri = trailingslashit( get_stylesheet_directory_uri() );

		if ( file_exists( $dir . 'css/admin-custom-header.css' ) )
			wp_enqueue_style( get_stylesheet() . '-admin-custom-header', "{$uri}css/admin-custom-header.css" );
	}
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'kuorinka_custom_header_styles' );

/**
 * Function for deciding which pages should have a one-column layout.
 *
 * @since  1.0.0
 */
function kuorinka_one_column() {

	if ( is_page_template( 'pages/front-page.php' ) ) {
		add_filter( 'theme_mod_theme_layout', 'kuorinka_theme_layout_one_column' );
	}
	elseif ( is_attachment() && wp_attachment_is_image() && '1c' != get_post_layout( get_queried_object_id() ) ) {
		add_filter( 'theme_mod_theme_layout', 'kuorinka_theme_layout_one_column' );
	}
	
}
add_action( 'template_redirect', 'kuorinka_one_column' );

/**
 * Filters 'get_theme_layout' by returning 'layout-1c'.
 *
 * @since  1.0.0
 * @param  string $layout The layout of the current page.
 * @return string
 */
function kuorinka_theme_layout_one_column( $layout ) {
	return '1c';
}

/**
 * Change [...] to ... Read more.
 *
 * @since 1.0.0
 */
function kuorinka_excerpt_more() {

	/* Translators: The %s is the post title shown to screen readers. */
	$text = sprintf( __( 'Read more %s', 'kuorinka' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' );
	$more = sprintf( '&hellip; <span class="kuorinka-read-more"><a href="%s" class="more-link">%s</a></span>', esc_url( get_permalink() ), $text );

	return $more;

}
add_filter( 'excerpt_more', 'kuorinka_excerpt_more' );

/**
 * Counts widgets number in subsidiary sidebar and ads css class (.sidebar-subsidiary-$number) to body_class.
 * Used to increase / decrease widget size according to number of widgets.
 * Example: if there's one widget in subsidiary sidebar - widget width is 100%, if two widgets, 50% each...
 * @author    Sinisa Nikolic
 * @copyright Copyright (c) 2012
 * @link      http://themehybrid.com/themes/sukelius-magazine
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since     1.0.0
 */
function kuorinka_subsidiary_classes( $classes ) {
    
	if ( is_active_sidebar( 'subsidiary' ) ) {
		
		$the_sidebars = wp_get_sidebars_widgets();
		$num = count( $the_sidebars['subsidiary'] );
		$classes[] = 'sidebar-subsidiary-' . $num;
		
    }
    
    return $classes;
	
}
add_filter( 'body_class', 'kuorinka_subsidiary_classes' );

/**
 * Counts widgets number in front page sidebar and ads css class (.sidebar-subsidiary-$number) to body_class.
 * Used to increase / decrease widget size according to number of widgets.
 * Example: if there's one widget in subsidiary sidebar - widget width is 100%, if two widgets, 50% each...
 * @author    Sinisa Nikolic
 * @copyright Copyright (c) 2012
 * @link      http://themehybrid.com/themes/sukelius-magazine
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since     1.0.0
 */
function kuorinka_front_page_classes( $classes ) {
    
	if ( is_active_sidebar( 'front-page' ) && ( is_page_template( 'pages/front-page.php' ) ) ) {
		
		$the_sidebars = wp_get_sidebars_widgets();
		$num = count( $the_sidebars['front-page'] );
		$classes[] = 'sidebar-front-page-' . $num;
		
    }
    
    return $classes;
	
}
add_filter( 'body_class', 'kuorinka_front_page_classes' );

/**
 * Add sticky class to Front page template when using post_class.
 *
 * @since     1.0.0
 */
function kuorinka_front_page_sticky( $classes ) {
    
	/* Add sticky class also in front page template. */
	if ( is_page_template( 'pages/front-page.php' ) && is_sticky() ) {
		$classes[] = 'sticky';
    }
    
    return $classes;
	
}
add_filter( 'post_class', 'kuorinka_front_page_sticky' );

/**
 * Add header image and primary menu class.
 *
 * @since     1.0.0
 */
function kuorinka_extra_layout_classes( $classes ) {
	
	/* Add the '.custom-header-image' class if the user is using a custom header image. */
	if ( get_header_image() ) {
		$classes[] = 'custom-header-image';
	}
	
	/* Add the '.primary-menu-active' class if the user is using a primary menu. */
	if ( has_nav_menu( 'primary' ) ) {
		$classes[] = 'primary-menu-active';
	}
    
    return $classes;
	
}
add_filter( 'body_class', 'kuorinka_extra_layout_classes' );

/**
 * Add infinity sign after aside post format.
 *
 * @since  1.0.0
 * @return array
 */
function kuorinka_infinity_after_aside( $content ) {

	if ( has_post_format( 'aside' ) && !is_singular() ) {
		$content .= ' <a href="' . get_permalink() . '">&#8734;</a>';
	}
	
	return $content;
}
add_filter( 'the_content', 'kuorinka_infinity_after_aside', 9 ); // run before wpautop

/**
 * Callback function for adding editor styles. Use along with the add_editor_style() function.
 *
 * @author  Justin Tadlock, justintadlock.com
 * @link    http://themehybrid.com/themes/stargazer
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since   1.0.0
 * @return  array
 */
function kuorinka_get_editor_styles() {

	/* Set up an array for the styles. */
	$editor_styles = array();

	/* Add the theme's editor styles. */
	$editor_styles[] = trailingslashit( get_template_directory_uri() ) . 'css/editor-style.css';
	
	/* Add genericons styles. */
	$editor_styles[] = trailingslashit( get_template_directory_uri() ) . 'fonts/genericons/genericons/genericons.css';
	
	/* Add theme fonts. */
	$editor_styles[] = kuorinka_fonts_url();

	/* If a child theme, add its editor styles. Note: WP checks whether the file exists before using it. */
	if ( is_child_theme() && file_exists( trailingslashit( get_stylesheet_directory() ) . 'css/editor-style.css' ) ) {
		$editor_styles[] = trailingslashit( get_stylesheet_directory_uri() ) . 'css/editor-style.css';
	}

	/* Add the locale stylesheet. */
	$editor_styles[] = get_locale_stylesheet_uri();

	/* Return the styles. */
	return $editor_styles;
}

/**
 * Flush out the transients used in front page WP Queries.
 *
 * @since   1.0.0
 */
function kuorinka_transient_flusher() {
	delete_transient( 'kuorinka_sticky_query' );
	delete_transient( 'kuorinka_post_query' );
}
add_action( 'save_post', 'kuorinka_transient_flusher' );

/**
 * Returns a link to the porfolio item URL if it has been set.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function kuorinka_get_portfolio_item_link() {

	$url = get_post_meta( get_the_ID(), 'portfolio_item_url', true );

	if ( !empty( $url ) ) {
		return '<a class="button portfolio-item-link" href="' . esc_url( $url ) . '">' . __( 'Visit Project', 'kuorinka' ) . '</a>';
	}

}

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @copyright Twenty Thirteen Theme
 * @since 1.0.0
 *
 * @return string The Link format URL.
 */
function kuorinka_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Use a template for individual comment output.
 *
 * @param object $comment Comment to display.
 * @param int    $depth   Depth of comment.
 * @param array  $args    An array of arguments.
 *
 * @since 1.0.0
 */
function kuorinka_comment_callback( $comment, $args, $depth ) {
	include( locate_template( 'comment.php') );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Background feature.
 */
require get_template_directory() . '/inc/custom-background.php';

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

/**
 * Load theme layouts.
 */
require_once( get_template_directory() . '/inc/theme-layouts.php' );

/**
 * Load media grabber.
 */
require_once( get_template_directory() . '/inc/media-grabber.php' );

/**
 * Load breadcrumb trail.
 */
require_once( get_template_directory() . '/inc/breadcrumb-trail.php' );

/**
 * Load Schema.org file.
 */
require_once( get_template_directory() . '/inc/schema.php' );

/**
 * Load template general file.
 */
require_once( get_template_directory() . '/inc/template-general.php' );
