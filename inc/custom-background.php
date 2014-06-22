<?php

/**
 * Adds support for the WordPress 'custom-background' theme feature.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function kuorinka_custom_background_setup() {

	add_theme_support( 'custom-background',
		apply_filters( 'kuorinka_custom_background_args',
			array(
				'default-color' => 'e6eff7',
				'default-image' => ''
			) 
		)
	);
}
add_action( 'after_setup_theme', 'kuorinka_custom_background_setup', 15 );
