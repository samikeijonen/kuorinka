<?php
/**
 * @package Kuorinka
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>
	
		<?php if ( get_option( 'show_avatars' ) ) : // If avatars are enabled. ?>

			<header class="entry-header">
				<?php echo get_avatar( get_the_author_meta( 'email' ) ); ?>
			</header><!-- .entry-header -->

		<?php endif; // End avatars check. ?>
		
		<div class="entry-content"  <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
		
		<footer class="entry-footer">
			<?php kuorinka_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'kuorinka' ) ) ); ?>
			<?php kuorinka_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'kuorinka' ), 'before' => '<br />' ) ); ?>
		</footer><!-- .entry-footer -->
		
	<?php else : // If not viewing a single post. ?>
	
		<?php if ( get_option( 'show_avatars' ) ) : // If avatars are enabled. ?>

			<header class="entry-header">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_avatar( get_the_author_meta( 'email' ) ); ?></a>
			</header><!-- .entry-header -->
			
		<?php else : // If avatars are not enabled. ?>

			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
			</header><!-- .entry-header -->

		<?php endif; // End avatars check. ?>

		<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	<?php endif; // End single post check. ?>
	
</article><!-- #post-## -->