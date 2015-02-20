<?php
/**
 * Template Name: Front Page
 *
 * This is the page template for Front Page.
 *
 * @package Kuorinka
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main" <?php hybrid_attr( 'content' ); ?>>
		
			<?php while ( have_posts() ) : the_post(); ?>
			
				<section id="kuorinka-front-page-content" class="kuorinka-front-page-content kuorinka-callout">
				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
						</header><!-- .entry-header -->
						
						<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
							<?php the_content(); ?>
						</div><!-- .entry-content -->
						
					</article><!-- #post-## -->
					
				</section><!-- .kuorinka-front-page-content -->

			<?php endwhile; // end of the loop. ?>
		
		<?php do_action( 'kuorinka_before_front_page_sidebar' ); // Hook before sidebar. ?>
		
		<?php get_sidebar( 'front-page' ); // Loads the sidebar-front-page.php template. ?>
		
		<?php do_action( 'kuorinka_after_front_page_sidebar' ); // Hook after sidebar. ?>
		
		<?php
		
		/* Whether to show posts or not. Defaults to true. */
		$kuorinka_show_front_page_posts = apply_filters( 'kuorinka_show_front_page_posts', true );
		
		if( false === $kuorinka_show_front_page_posts || !get_theme_mod( 'hide_front_page_posts') ) : // Check do we show posts.
		
			/* Get the sticky posts. */
			$sticky = get_option( 'sticky_posts' );
		
			$kuorinka_sticky_args = apply_filters( 'kuorinka_front_page_sticky_arguments', array(
				'post_type'    => array( 'post' ),
				'post__in'     => $sticky,
				'post_status'  => 'publish',
				'no_found_rows' => true // Skip SQL_CALC_FOUND_ROWS for performance (no pagination).
			) );
		
			if ( ! empty( $sticky ) ) :
		
				/* Set transient (24h) for faster loading. Delete transient on hook 'save_post' in functions.php file. */
				if( false === ( $kuorinka_sticky_query = get_transient( 'kuorinka_sticky_query' ) ) ) {
					$kuorinka_sticky_query = new WP_Query( $kuorinka_sticky_args );
					set_transient( 'kuorinka_sticky_query', $kuorinka_sticky_query, 60*60*24 );
				}
			
				if ( $kuorinka_sticky_query->have_posts() ) : ?>
				
					<h1 class="screen-reader-text"><?php esc_attr_e( 'Sticky posts', 'kuorinka' ); ?></h1>
					
					<?php
					while ( $kuorinka_sticky_query->have_posts() ) : $kuorinka_sticky_query->the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
	
							<header class="entry-header">
								<?php the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							</header><!-- .entry-header -->

							<div class="entry-summary" <?php hybrid_attr( 'entry-summary' ); ?>>
								<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'thumbnail', array( 'class' => 'thumbnail' ) ); ?>
								<?php the_excerpt(); ?>
							</div><!-- .entry-summary -->

						</article><!-- #post-## -->

					<?php endwhile; // End while loop. ?>

				<?php endif; // End check for posts. ?>
			
			<?php endif; // End check for sticky posts. ?>
		
			<?php wp_reset_postdata(); // reset query. ?>
		
			<?php
			/* Get other than sticky posts. */
		
			$kuorinka_post_args = apply_filters( 'kuorinka_front_page_post_arguments', array(
				'post_type'      => array( 'post' ),
				'post__not_in'   => $sticky,
				'post_status'    => 'publish',
				'no_found_rows'  => true, // Skip SQL_CALC_FOUND_ROWS for performance (no pagination).
				'posts_per_page' => 4,
				'tax_query'      => array(
					array(
						'taxonomy' => 'post_format',
						'field'    => 'slug',
						'terms'    => array( 
							'post-format-aside',
							'post-format-audio',
							'post-format-chat',
							'post-format-link',
							'post-format-quote',
							'post-format-status',
						),
						'operator' => 'NOT IN'
					)
				)
			) ); ?>
		
			<section id="kuorinka-front-page-posts" class="kuorinka-front-page-section kuorinka-front-page-posts">
		
				<?php
				/* Set transient (24h) for faster loading. Delete transient on hook 'save_post' in functions.php file. */
				if( false === ( $kuorinka_post_query = get_transient( 'kuorinka_post_query' ) ) ) {
					$kuorinka_post_query = new WP_Query( $kuorinka_post_args );
					set_transient( 'kuorinka_post_query', $kuorinka_post_query, 60*60*24 );
				}
			
				if ( $kuorinka_post_query->have_posts() ) : ?>
				
					<h1 class="screen-reader-text"><?php esc_attr_e( 'Posts', 'kuorinka' ); ?></h1>
					
					<?php
					while ( $kuorinka_post_query->have_posts() ) : $kuorinka_post_query->the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>
	
							<header class="entry-header">
								<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'kuorinka-large', array( 'class' => 'thumbnail-large' ) ); ?>
								<?php the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							</header><!-- .entry-header -->

							<div class="entry-summary" <?php hybrid_attr( 'entry-summary' ); ?>>
								<?php the_excerpt(); ?>
							</div><!-- .entry-summary -->

						</article><!-- #post-## -->

					<?php endwhile; // End while loop. ?>

				<?php endif; // End check for posts. ?>
			
				<?php wp_reset_postdata(); // reset query. ?>
			
			</section><!-- #kuorinka-front-page-posts -->
			
		<?php endif; // End check for show posts. ?>
		
		<?php do_action( 'kuorinka_after_front_page_posts' ); // Hook after posts. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
