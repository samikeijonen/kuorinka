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
		<main id="main" class="site-main" role="main">
		
		<?php get_sidebar( 'front-page' ); // Loads the sidebar-front-page.php template. ?>
		
		<?php
		/* Get the sticky posts. */
		$sticky = get_option( 'sticky_posts' );
		
		$kuorinka_sticky_args = apply_filters( 'kuorinka_front_page_sticky_arguments', array(
			'post_type'   => array( 'post' ),
			'post__in'    => $sticky,
			'post_status' => 'publish'
		) );
		
		if ( ! empty( $sticky ) ) :
		
			/* Set transient (24h) for faster loading. Delete transient on hook 'save_post' in functions.php file. */
			if( false === ( $kuorinka_sticky_query = get_transient( 'kuorinka_sticky_query' ) ) ) {
				$kuorinka_sticky_query = new WP_Query( $kuorinka_sticky_args );
				set_transient( 'kuorinka_sticky_query', $kuorinka_sticky_query, 60*60*24 );
			}
			
			if ( $kuorinka_sticky_query->have_posts() ) :

				while ( $kuorinka_sticky_query->have_posts() ) : $kuorinka_sticky_query->the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
						<header class="entry-header">
							<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-summary">
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
			'posts_per_page' => 4
			
		) ); ?>
		
		<section id="kuorinka-front-page-posts" class="kuorinka-front-page-section kuorinka-front-page-posts">
		
			<?php
			/* Set transient (24h) for faster loading. Delete transient on hook 'save_post' in functions.php file. */
			if( false === ( $kuorinka_post_query = get_transient( 'kuorinka_post_query' ) ) ) {
				$kuorinka_post_query = new WP_Query( $kuorinka_post_args );
				set_transient( 'kuorinka_post_query', $kuorinka_post_query, 60*60*24 );
			}
			
			if ( $kuorinka_post_query->have_posts() ) :

				while ( $kuorinka_post_query->have_posts() ) : $kuorinka_post_query->the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
						<header class="entry-header">
							<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'kuorinka-large', array( 'class' => 'thumbnail-large' ) ); ?>
							<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div><!-- .entry-summary -->

					</article><!-- #post-## -->

				<?php endwhile; // End while loop. ?>

			<?php endif; // End check for posts. ?>
			
			<?php wp_reset_postdata(); // reset query. ?>
			
		</section><!-- #kuorinka-front-page-posts -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
