<?php if ( is_active_sidebar( 'primary' ) ) : // If the sidebar has widgets. ?>

	<aside id="sidebar-primary" class="sidebar" role="complementary" aria-label="<?php echo _x( 'Primary Sidebar', 'Sidebar aria label', 'kuorinka' ); ?>">

		<?php dynamic_sidebar( 'primary' ); ?>

	</aside><!-- #sidebar-primary .aside -->

<?php endif; // End widgets check.