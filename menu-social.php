<?php if ( has_nav_menu( 'social' ) ) : // Check if there's a menu assigned to the 'social' location. ?>

	<nav id="menu-social" class="menu social-navigation" role="navigation" aria-labelledby="menu-social-header" <?php hybrid_attr( 'menu', 'social' ); ?>>	
		<h3 class="screen-reader-text" id="menu-social-header"><?php esc_attr_e( 'Social Menu', 'kuorinka' ); ?></h3>
	
		<?php wp_nav_menu(
			array(
				'theme_location'  => 'social',
				'menu_id'         => 'menu-social-items',
				'depth'           => 1,
				'link_before'     => '<span class="screen-reader-text">',
				'link_after'      => '</span>',
				'fallback_cb'     => '',
			)
		); ?>
		
	</nav><!-- #menu-social -->

<?php endif; // End check for menu. ?>