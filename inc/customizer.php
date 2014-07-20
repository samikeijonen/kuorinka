<?php
/**
 * Kuorinka Theme Customizer
 *
 * @package Kuorinka
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kuorinka_customize_register( $wp_customize ) {

	/* === Logo upload. === */
	
	/* Add the theme section. */
	$wp_customize->add_section(
		'logo',
		array(
			'title'      => esc_html__( 'Logo', 'kuorinka' ),
			'priority'   => 10
		)
	);
	
	/* Add the 'logo' setting. */
	$wp_customize->add_setting(
		'logo_upload',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	
	/* Add custom logo control. */
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'logo_image',
				array(
					'label'    => esc_html__( 'Upload custom logo.', 'kuorinka' ),
					'section'  => 'logo',
					'settings' => 'logo_upload',
					'priority' => 10,
			) 
		) 
	);
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'kuorinka_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kuorinka_customize_preview_js() {
	wp_enqueue_script( 'kuorinka_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), KUORINKA_VERSION, true );
}
add_action( 'customize_preview_init', 'kuorinka_customize_preview_js' );
