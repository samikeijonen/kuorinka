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
	
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		#site-title,
		#site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
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
