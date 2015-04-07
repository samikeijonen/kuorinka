<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> <?php hybrid_attr( 'comment' ); ?>>

	<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<header class="comment-meta">
			<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			<cite class="comment-author" <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php comment_author_link(); ?></span></cite><br />
			<a class="comment-permalink" <?php hybrid_attr( 'comment-permalink' ); ?> href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>"><time class="comment-published" datetime="<?php comment_time( 'c' ); ?>" <?php hybrid_attr( 'comment-published' ); ?>><?php printf( _x( '%1$s', '%1%s is for comment date', 'kuorinka' ), get_comment_date() ); ?></time></a>
			<?php edit_comment_link(); ?>
		</header><!-- .comment-meta -->

		<div class="comment-content" <?php hybrid_attr( 'comment-content' ); ?>>
		
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p>	
						<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'kuorinka' ); ?></em>
					</p>
				<?php endif; ?>
				
			<?php comment_text(); ?>
			
		</div><!-- .comment-content -->

		<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '<div class="reply">', 'after' => '</div><!-- .reply -->' ) ) ); ?>
		
	</article><!-- .comment-body -->

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>