<?php
/**
 * @package Kuorinka
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
	
	<header class="entry-header">
	
		<?php
		/* Arrow for right to left. */
		if( is_rtl() ) :
			$kuorinka_left_or_right = '&larr;';
		else :
			$kuorinka_left_or_right = '&rarr;';
		endif;
		?>
		
		<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post.
			$heading = 'h1';
		else : // If not viewing a single post.
			$heading = 'h2';
		endif; // End single post check. ?>
		
		<<?php echo $heading; ?> class="entry-title" <?php hybrid_get_attr( 'entry-title' ); ?>>
			<a href="<?php echo esc_url( kuorinka_get_link_url() ); ?>"><?php the_title(); ?> <span class="meta-nav"><?php echo esc_attr( $kuorinka_left_or_right ); ?></span></a>
		</<?php echo $heading; ?>>
		
	</header><!-- .entry-header -->
	
	<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>

	<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php if ( 'post' == get_post_type() && is_singular( get_post_type() ) ) : // Hide category and tag text for non singular views. ?>
		<footer class="entry-footer">
			<?php kuorinka_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'kuorinka' ) ) ); ?>
			<?php kuorinka_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'kuorinka' ), 'before' => '<br />' ) ); ?>
		</footer><!-- .entry-footer -->
	<?php endif; // End if 'post' == get_post_type() ?>
	
</article><!-- #post-## -->