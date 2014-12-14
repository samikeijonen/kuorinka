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
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php hybrid_attr( 'body' ); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kuorinka' ); ?></a>
	
	<?php do_action( 'kuorinka_before_header' ); // Hook before header. ?>
	
	<header id="masthead" class="site-header" role="banner" aria-labelledby="site-title" <?php hybrid_attr( 'header' ); ?>>
		
		<?php if ( display_header_text() ) : // If user chooses to display header text. ?>
	
			<div class="site-branding">
			
				<h1 id="site-title" class="site-title" <?php hybrid_attr( 'site-title' ); ?>>
					<div class="site-title-inner">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</div>
				</h1>
				
				<h2 id="site-description" class="site-description" <?php hybrid_attr( 'site-description' ); ?>><?php bloginfo( 'description' ); ?></h2>
			
			</div><!-- .site-branding -->
			
		<?php endif; // End check for header text. ?>
		
		<?php get_sidebar( 'header' ); // Loads the sidebar-header.php template. ?>
		
		<?php
		/* Use slider if it is set. */
		$kuorinka_slider_header = get_post_meta( get_queried_object_id(), '_kuorinka_plus_slider_header', true );
		if ( class_exists( 'KUORINKA_PLUS' ) && isset( $kuorinka_slider_header ) && !empty( $kuorinka_slider_header ) && is_singular() ) :
			
			/* Replace header by slider. */
			if ( function_exists( 'soliloquy' ) ) :
				soliloquy( absint( $kuorinka_slider_header ) );
			endif;
		
		else :
		
			if ( get_header_image() ) : ?>
				<div id="kuorinka-header-image" class="kuorinka-header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="kuorinka-header-link" rel="home">
						<img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- #kuorinka-header-image -->	
			<?php endif; // End header image check. ?>
			
		<?php endif; // End header slider check. ?>
		
		<?php get_template_part( 'menu', 'primary' ); // Loads the menu-primary.php template. ?>
		
	</header><!-- #masthead -->
	
	<?php do_action( 'kuorinka_after_header' ); // Hook after header. ?>
	
	<?php if ( function_exists( 'breadcrumb_trail' ) && current_theme_supports( 'breadcrumb-trail' ) ) :
		breadcrumb_trail( array( 'container' => 'nav', 'separator' => _x( '&#8764;', 'Separator in breadcrumb trail.', 'mina-olen' ), 'show_on_front' => false, 'show_browse' => false, 'before' => '<div class="wrap">', 'after' => '</div>' ) );
	endif; ?>

	<div id="content" class="site-content">
		<div class="wrap">
			<div class="wrap-inside">
