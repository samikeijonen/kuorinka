<?php if ( '1c' != get_theme_mod( 'theme_layout' ) ) : // If the layout is not one column. ?>
	
	<aside id="sidebar-primary" class="sidebar" role="complementary" aria-labelledby="sidebar-primary-header" <?php hybrid_attr( 'sidebar', 'primary' ); ?>>
		<h2 class="screen-reader-text" id="sidebar-primary-header"><?php echo esc_attr_x( 'Primary Sidebar', 'Sidebar aria label', 'kuorinka' ); ?></h2>
		
		<?php if ( is_active_sidebar( 'primary' ) ) : // If the sidebar has widgets. ?>
		
			<?php dynamic_sidebar( 'primary' ); ?>
			
		<?php else : // If the sidebar has no widgets. ?>
		
			<?php the_widget( 'WP_Widget_Recent_Posts', '', array(
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>'
				) 
			); ?>
		
		<?php endif; // End widgets check. ?>

	</aside><!-- #sidebar-primary .aside -->

<?php endif; // End layout check.