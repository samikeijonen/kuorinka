<?php
/**
 * The template used for displaying page content in portfolio item.
 *
 * @package Kuorinka
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>
	
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php echo wpautop( kuorinka_get_portfolio_item_link() ); ?>
		</div><!-- .entry-content -->
		
		<footer class="entry-footer">
			<?php kuorinka_post_terms( array( 'taxonomy' => 'portfolio', 'sep' => ' ' ) ); ?>
		</footer><!-- .entry-footer -->
		
	<?php else : // If not viewing a single post. ?>
	
		<header class="entry-header">
	
			<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'kuorinka-large', array( 'class' => 'thumbnail-large' ) ); ?>
		
			<?php the_title( sprintf( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	
		</header><!-- .entry-header -->

	<?php endif; // End single post check. ?>

</article><!-- #post-## -->
