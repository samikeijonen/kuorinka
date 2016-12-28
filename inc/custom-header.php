<?php
/**
 * Custom Header feature
 *
 * @package Kuorinka
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses kuorinka_header_style()
 * @uses kuorinka_admin_header_style()
 * @uses kuorinka_admin_header_image()
 */
function kuorinka_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'kuorinka_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '1668b5',
		'width'                  => 1142,
		'height'                 => 500,
		'flex-height'            => true,
		'wp-head-callback'       => 'kuorinka_header_style',
	) ) );

}
add_action( 'after_setup_theme', 'kuorinka_custom_header_setup', 15 );

if ( ! function_exists( 'kuorinka_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see kuorinka_custom_header_setup().
 */
function kuorinka_header_style() {
	
	// Header text color.
	$header_color = get_header_textcolor();

	// Start header styles.
	$style = '';
	
	// Site title styles.
	if ( display_header_text() ) {
		$style .= ".site-title a, .site-title a:visited { color: #{$header_color} }";
	}
	
	if ( ! display_header_text() ) {
		$style .= ".site-title-inner { clip: rect(1px, 1px, 1px, 1px); position: absolute; }";	
	}

	if ( ! empty( $style ) ) {
		echo "\n" . '<style type="text/css" id="custom-header-css">' . trim( $style ) . '</style>' . "\n";
	}
}
endif; // kuorinka_header_style