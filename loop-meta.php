<div class="loop-meta" <?php hybrid_attr( 'loop-meta' ); ?>>

	<h1 class="loop-title" <?php hybrid_attr( 'loop-title' ); ?>><?php hybrid_loop_title(); ?></h1>

	<?php if ( !is_paged() && $desc = hybrid_get_loop_description() ) : // Check if we're on page/1. ?>

		<div class="loop-description" <?php hybrid_attr( 'loop-description' ); ?>>
			<?php echo $desc; ?>
		</div><!-- .loop-description -->
		
	<?php endif; // End paged check. ?>
	
	<?php if ( is_post_type_archive( 'portfolio_item' ) || is_tax( 'portfolio' ) ) :
		get_template_part( 'menu', 'portfolio' ); // Loads the menu-portfolio.php template. ?>
	<?php endif; // End portfolio check. ?>

</div><!-- .loop-meta -->