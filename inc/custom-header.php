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
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see kuorinka_custom_header_setup().
 */
function kuorinka_admin_header_style() {
?>
	<style type="text/css">
	
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#site-title {
			font-family: "Roboto Condensed", "Helvetica Neue", Helvetica, Arial, sans-serif;
			font-size: 36px;
			font-weight: 400;
			margin: 0;
			padding: 20px 0;
			text-transform: uppercase;
		}
		#site-title a {
			text-decoration: none;
		}
		#site-description {
			font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
			font-size: 20px;
			text-transform: none;
			padding: 0 0 10px 0;
			margin: 0;
		}

		#headimg img {
			max-width: 100%;
			height: auto;			
		}


		@media screen and (min-width: 800px) {

			#site-title,
			#site-description {
				display: inline-block;
				width: 50%;
			}
			#site-description {
				padding-left: 0;
				padding-right: 0;
				width: 46%;
			}

		}
	</style>
<?php
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
