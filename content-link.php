<?php
/**
 * @package Kuorinka
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
	
		<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'kuorinka-large', array( 'class' => 'thumbnail-large' ) ); ?>
		
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( kuorinka_get_link_url() ) . '">', is_rtl() ? ' <span class="meta-nav">&larr;</span>' : ' <span class="meta-nav">&rarr;</span>' . '</a></h1>' ); ?>
	
	</header><!-- .entry-header -->
	
	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php kuorinka_posted_on(); ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php kuorinka_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'kuorinka' ) ) ); ?>
			<?php kuorinka_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'kuorinka' ), 'before' => '<br />' ) ); ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'kuorinka' ), __( '1 Comment', 'kuorinka' ), __( '% Comments', 'kuorinka' ) ); ?></span>
		<?php endif; ?>

	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->