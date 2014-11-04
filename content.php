<?php
/**
 * @package Kuorinka
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>
	
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
		</header><!-- .entry-header -->
	
		<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
		
		<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'kuorinka' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php kuorinka_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'kuorinka' ) ) ); ?>
			<?php kuorinka_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'kuorinka' ), 'before' => '<br />' ) ); ?>
		</footer><!-- .entry-footer -->
		
	<?php else : // If not viewing a single post. ?>
	
		<header class="entry-header">
		
			<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'kuorinka-large', array( 'class' => 'thumbnail-large' ) ); ?>
			
			<?php the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
		</header><!-- .entry-header -->
		
		<?php get_template_part( 'entry', 'meta' ); // Loads the entry-meta.php template. ?>
		
		<div class="entry-summary" <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	
	<?php endif; // End single post check. ?>
	
</article><!-- #post-## -->