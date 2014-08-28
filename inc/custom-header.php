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
		'admin-head-callback'    => 'kuorinka_admin_header_style',
		'admin-preview-callback' => 'kuorinka_admin_header_image',
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

if ( ! function_exists( 'kuorinka_admin_header_style' ) ) :
/**
 * Callback function for outputting the custom header CSS to `admin_head` on "Appearance > Custom Header".  See 
 * the `css/admin-custom-header.css` file for all the style rules specific to this screen.
 *
 * @see kuorinka_custom_header_setup().
 */
function kuorinka_admin_header_style() {

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
endif; // kuorinka_admin_header_style

if ( ! function_exists( 'kuorinka_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see kuorinka_custom_header_setup().
 */
function kuorinka_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 id="site-title" class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="site-description" class="displaying-header-text"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
			<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // kuorinka_admin_header_image
