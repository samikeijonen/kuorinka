<?php
/**
 * Loads the layouts related files.
 *
 * @package Kuorinka
 */
 
/**
 * Loads the layouts related files.
 *
 * @since  1.4.0
 * @return void
 */
function kuorinka_include_layout_customizer() {

	// Load the Theme Layouts customizer file.
	require_once( get_template_directory() . '/inc/layouts/functions-customize.php' );
	
}
add_action( 'after_setup_theme', 'kuorinka_include_layout_customizer', -95 );

/**
 * Loads the layouts related files.
 *
 * @since  1.4.0
 * @return void
 */
function kuorinka_include_layouts() {

	// Load the Theme Layouts extension if supported.
	require_if_theme_supports( 'theme-layouts', get_template_directory() . '/inc/layouts/class-layout.php'         );
	require_if_theme_supports( 'theme-layouts', get_template_directory() . '/inc/layouts/class-layout-factory.php' );
	require_if_theme_supports( 'theme-layouts', get_template_directory() . '/inc/layouts/functions-layouts.php'    );

}
add_action( 'after_setup_theme', 'kuorinka_include_layouts', 13 );

/**
 * Loads the layouts admin related files.
 *
 * @since  1.4.0
 * @return void
 */
function kuorinka_admin_layouts() {

	if ( is_admin() ) {
		require_once( get_template_directory() . '/inc/layouts/admin.php' );
	}
	
}
add_action( 'after_setup_theme', 'kuorinka_admin_layouts', 95 );
