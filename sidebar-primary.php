<?php if ( '1c' != get_theme_mod( 'theme_layout' ) ) : // If the layout is not one column. ?>
	
	<aside id="sidebar-primary" class="sidebar" role="complementary" aria-label="<?php echo _x( 'Primary Sidebar', 'Sidebar aria label', 'kuorinka' ); ?>">

		<?php if ( is_active_sidebar( 'primary' ) ) : // If the sidebar has widgets. ?>
		
			<?php dynamic_sidebar( 'primary' ); ?>
			
		<?php else : // If the sidebar has no widgets. ?>
		
			<?php the_widget( 'WP_Widget_Recent_Posts', '', array(
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>'
				) 
			); ?>
		
		<?php endif; // End widgets check. ?>

	</aside><!-- #sidebar-primary .aside -->

<?php endif; // End layout check.