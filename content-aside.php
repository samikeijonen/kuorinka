<?php
/**
 * @package Kuorinka
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php if ( 'post' == get_post_type() && is_singular( get_post_type() ) ) : ?>
	
		<header class="entry-header">
			<?php the_title( sprintf( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</header><!-- .entry-header -->

		<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
		
	<?php endif; ?>

	<div class="entry-content"  <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php if ( 'post' == get_post_type() && is_singular( get_post_type() ) ) : // Hide category and tag text for non singular views. ?>
		<footer class="entry-footer">
			<?php kuorinka_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'kuorinka' ) ) ); ?>
			<?php kuorinka_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'kuorinka' ), 'before' => '<br />' ) ); ?>
		</footer><!-- .entry-footer -->
	<?php endif; // End if 'post' == get_post_type() ?>
	
</article><!-- #post-## -->