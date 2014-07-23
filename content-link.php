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
		
		<h1 class="entry-title" <?php hybrid_get_attr( 'entry-title' ); ?>>
			<a href="<?php echo esc_url( kuorinka_get_link_url() ); ?>"><?php the_title(); ?> <span class="meta-nav"><?php echo esc_attr( $kuorinka_left_or_right ); ?></span></a>
		</h1>
		
	</header><!-- .entry-header -->
	
	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php kuorinka_posted_on(); ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '%', 'comments-link', '' ); ?></span>
			<?php endif; ?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php if ( 'post' == get_post_type() && is_singular( get_post_type() ) ) : // Hide category and tag text for pages on Search ?>
		<footer class="entry-footer">
			<?php kuorinka_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'kuorinka' ) ) ); ?>
			<?php kuorinka_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'kuorinka' ), 'before' => '<br />' ) ); ?>
		</footer><!-- .entry-footer -->
	<?php endif; // End if 'post' == get_post_type() ?>
	
</article><!-- #post-## -->