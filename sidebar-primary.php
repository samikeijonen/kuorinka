<?php if ( is_active_sidebar( 'primary' ) ) : // If the sidebar has widgets. ?>

	<aside id="sidebar-primary" class="sidebar" role="complementary">

		<?php dynamic_sidebar( 'primary' ); ?>

	</aside><!-- #sidebar-primary .aside -->

<?php endif; // End widgets check.