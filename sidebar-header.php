<?php if ( is_active_sidebar( 'header' ) ) : ?>

	<aside id="sidebar-header" class="sidebar" role="complementary" aria-label="<?php echo esc_attr_x( 'Header Sidebar', 'Sidebar aria label', 'kuorinka' ); ?>" <?php hybrid_attr( 'sidebar', 'header' ); ?>>
		
		<div class="wrap">
			<div class="wrap-inside">
			
				<?php dynamic_sidebar( 'header' ); ?>
		
			</div><!-- .wrap-inside -->	
		</div><!-- .div -->

	</aside><!-- #sidebar-subsidiary .sidebar -->

<?php endif; // End check for subsidiary sidebar. ?>