<?php
/**
 * Theme administration functions used with other components of the framework admin.  This file is for
 * setting up any basic features and holding additional admin helper functions.
 *
 * @package    HybridCore
 * @subpackage Admin
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2008 - 2015, Justin Tadlock
 * @link       http://themehybrid.com/hybrid-core
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

# Load the post meta boxes on the new post and edit post screens.
add_action( 'load-post.php',     'hybrid_admin_load_post_meta_boxes' );
add_action( 'load-post-new.php', 'hybrid_admin_load_post_meta_boxes' );

# Register scripts and styles.
add_action( 'admin_enqueue_scripts', 'hybrid_admin_register_styles',  0 );

/**
 * Loads the core post meta box files on the 'load-post.php' action hook.  Each meta box file is only loaded if
 * the theme declares support for the feature.
 *
 * @since  1.2.0
 * @access public
 * @return void
 */
function hybrid_admin_load_post_meta_boxes() {

	// Load the layout meta box.
	require_if_theme_supports( 'theme-layouts', get_template_directory() . '/inc/layouts/meta-box-post-layout.php' );
	
}

/**
 * Registers admin styles.
 *
 * @since  3.0.0
 * @access public
 * @return void
 */
function hybrid_admin_register_styles() {
	wp_register_style( 'hybrid-admin', trailingslashit( get_template_directory_uri() ) . 'inc/layouts/css/admin.css' );
}
