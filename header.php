<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Kuorinka
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kuorinka' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
		<div class="site-branding">
		
		<?php if ( get_theme_mod( 'logo_upload') ) : // Use logo if is set. Else use bloginfo name. ?>	
				<h1 id="site-title">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
						<img class="cinemajoensuu-logo" src="<?php echo esc_url( get_theme_mod( 'logo_upload' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
					</a>
				</h1>
			<?php else : ?>
				<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif; // End check for logo. ?>
			
			<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			
		</div><!-- .site-branding -->
		
		<?php if ( get_header_image() ) : ?>
			<div id="kuorinka-header-image" class="kuorinka-header-image">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="kuorinka-header-link" rel="home">
					<img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				</a>
			</div><!-- #kuorinka-header-image -->	
		<?php endif; // End header image check. ?>
		
		<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>
		
	</header><!-- #masthead -->
	
	<?php if ( function_exists( 'breadcrumb_trail' ) ) :
		breadcrumb_trail( array( 'container' => 'nav', 'separator' => _x( '&#8764;', 'Separator in breadcrumb trail.', 'mina-olen' ), 'show_on_front' => false, 'show_browse' => false, 'before' => '<div class="wrap">', 'after' => '</div>' ) );
	endif; ?>

	<div id="content" class="site-content">
		<div class="wrap">
