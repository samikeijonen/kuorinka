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
	
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php kuorinka_posted_on(); ?>
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
					<span class="comments-link"><?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '%', 'comments-link', '' ); ?></span>
				<?php endif; ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
		<div class="entry-content"  <?php hybrid_attr( 'entry-content' ); ?>>
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
		
			<?php 
			if ( has_post_format( 'video' ) ) :
				echo ( $video = hybrid_media_grabber( array( 'type' => 'video', 'split_media' => true, 'before' => '<div class="entry-media">', 'after' => '</div>' ) ) );
			else :
				if ( has_post_thumbnail() ) the_post_thumbnail( 'kuorinka-large', array( 'class' => 'thumbnail-large' ) );
			endif // End check for video or thumbnail. ?>
		
			<?php the_title( sprintf( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
		</header><!-- .entry-header -->
		
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php kuorinka_posted_on(); ?>
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
					<span class="comments-link"><?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '%', 'comments-link', '' ); ?></span>
				<?php endif; ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		
		<div class="entry-summary"  <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	
	<?php endif; // End single post check. ?>
	
</article><!-- #post-## -->