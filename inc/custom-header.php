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
	
	/* Get out if we don't use header text. */
	if ( !display_header_text() ) {
		return;
	}

	$header_color = get_header_textcolor();
	
	/* Get out if we don't have header text text color. */
	if ( empty( $header_color ) ) {
		return;
	}

	$style = '';

	$style .= "#site-title, #site-title a { color: #{$header_color} }";

	echo "\n" . '<style type="text/css" id="custom-header-css">' . trim( $style ) . '</style>' . "\n";
}
endif; // kuorinka_header_style