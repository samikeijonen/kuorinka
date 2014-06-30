<?php if ( is_active_sidebar( 'front-page' ) ) : ?>

	<aside id="sidebar-front-page" class="sidebar" role="complementary" aria-label="<?php echo _x( 'Front Page Sidebar', 'Sidebar aria label', 'kuorinka' ); ?>">
		
		<div class="wrap">
			<div class="wrap-inside">
			
				<?php dynamic_sidebar( 'front-page' ); ?>
		
			</div><!-- .wrap-inside -->	
		</div><!-- .div -->

	</aside><!-- #sidebar-front-page .sidebar -->

<?php endif; // End check for front page sidebar. ?>