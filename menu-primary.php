<?php if ( has_nav_menu( 'primary' ) ) { ?>
	
	<nav id="menu-primary" class="menu main-navigation" role="navigation">	
		<div class="wrap">
			
			<?php

				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'menu_id'         => 'menu-primary-items',
						'depth'           => 4,
						'menu_class'      => 'menu-items',
						'fallback_cb'     => ''
					)
				);
			
			?>
		
		</div><!-- .wrap -->
	</nav><!-- #menu-primary -->

<?php } ?>