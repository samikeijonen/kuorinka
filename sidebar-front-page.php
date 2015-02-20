<?php if ( is_active_sidebar( 'front-page' ) ) : ?>

	<aside id="sidebar-front-page" class="sidebar" role="complementary" aria-labelledby="sidebar-front-page-header" <?php hybrid_attr( 'sidebar', 'front-page' ); ?>>
		<h1 class="screen-reader-text" id="sidebar-front-page-header"><?php echo esc_attr_x( 'Front Page Sidebar', 'Sidebar aria label', 'kuorinka' ); ?></h1>
		
		<div class="wrap">
			<div class="wrap-inside">
			
				<?php dynamic_sidebar( 'front-page' ); ?>
		
			</div><!-- .wrap-inside -->	
		</div><!-- .div -->

	</aside><!-- #sidebar-front-page .sidebar -->

<?php endif; // End check for front page sidebar. ?>