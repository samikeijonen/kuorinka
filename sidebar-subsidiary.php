<?php if ( is_active_sidebar( 'subsidiary' ) ) : ?>

	<aside id="sidebar-subsidiary" class="sidebar" role="complementary" aria-label="<?php echo _x( 'Subsidiary Sidebar', 'Sidebar aria label', 'kuorinka' ); ?>" <?php hybrid_attr( 'sidebar', 'subsidiary' ); ?>>
		
		<div class="wrap">
			<div class="wrap-inside">
			
				<?php dynamic_sidebar( 'subsidiary' ); ?>
		
			</div><!-- .wrap-inside -->	
		</div><!-- .div -->

	</aside><!-- #sidebar-subsidiary .sidebar -->

<?php endif; // End check for subsidiary sidebar. ?>