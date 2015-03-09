<?php if ( is_active_sidebar( 'header' ) ) : ?>

	<aside id="sidebar-header" class="sidebar" role="complementary" aria-labelledby="sidebar-header-header" <?php hybrid_attr( 'sidebar', 'header' ); ?>>
		<h2 class="screen-reader-text" id="sidebar-header-header"><?php echo esc_attr_x( 'Header Sidebar', 'Sidebar aria label', 'kuorinka' ); ?></h2>
		
		<div class="wrap">
			<div class="wrap-inside">
			
				<?php dynamic_sidebar( 'header' ); ?>
		
			</div><!-- .wrap-inside -->	
		</div><!-- .div -->

	</aside><!-- #sidebar-subsidiary .sidebar -->

<?php endif; // End check for subsidiary sidebar. ?>