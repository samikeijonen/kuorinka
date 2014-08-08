<?php if ( 'post' == get_post_type() ) : ?>
	<div class="entry-meta">
		<?php kuorinka_posted_on(); ?>
		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '%', 'comments-link', '' ); ?></span>
		<?php endif; ?>
	</div><!-- .entry-meta -->
<?php endif;