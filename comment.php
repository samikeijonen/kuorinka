<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> <?php hybrid_attr( 'comment' ); ?>>

	<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<header class="comment-meta">
			<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			<cite class="comment-author" <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php comment_author_link(); ?></span></cite><br />
			<a class="comment-permalink" <?php hybrid_attr( 'comment-permalink' ); ?> href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>"><time class="comment-published" datetime="<?php comment_time( 'c' ); ?>" <?php hybrid_attr( 'comment-published' ); ?>><?php printf( _x( '%1$s', '%1%s is for comment date', 'kuorinka' ), get_comment_date() ); ?></time></a>
			<?php edit_comment_link(); ?>
		</header><!-- .comment-meta -->

		<div class="comment-content" <?php hybrid_attr( 'comment-content' ); ?>>
			<?php comment_text(); ?>
		</div><!-- .comment-content -->

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
		
	</article><!-- .comment-body -->

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>