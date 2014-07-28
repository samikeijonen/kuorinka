<?php
/**
 * @package Kuorinka
 */
?>

<?php

/* Get our theme details. */
$team_member_email 	= esc_attr( get_post_meta( get_the_ID(), '_gravatar_email', true ) );
$role 				= esc_attr( get_post_meta( get_the_ID(), '_byline', true ) );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>
	
		<header class="entry-header">
	
			<?php
			if ( has_post_thumbnail() && function_exists( 'kuorinka_plus_our_theme_author_details' ) ) :

				the_post_thumbnail( 'thumbnail', array( 'class' => 'thumbnail-team-member' ) );
			
			elseif  ( isset( $team_member_email ) && ( '' != $team_member_email ) && function_exists( 'kuorinka_plus_our_theme_author_details' ) ) :
				
				echo '<figure itemprop="image">' .  get_avatar( $team_member_email, 150 ) . '</figure>';
				
			endif; // End thumbnail check.
			?>
			
			<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
			
			<?php
			$member_role = '';
 
			if ( isset( $role ) && '' != $role && apply_filters( 'woothemes_our_team_member_role', true ) && function_exists( 'kuorinka_plus_our_theme_author_details' ) ) {
				$member_role .= ' <p class="kuorinka-plus-role role" itemprop="jobTitle">' . $role . '</p>' . "\n";
			}
 
			echo apply_filters( 'woothemes_our_team_member_fields_display', $member_role );
			?>
			
		</header><!-- .entry-header -->
		
		<div class="entry-summary"  <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'kuorinka' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
		
			<?php if( function_exists( 'kuorinka_plus_our_theme_author_details' ) ) :
				echo kuorinka_plus_our_theme_author_details();
			endif; ?>
			
		</footer><!-- .entry-footer -->
		
	<?php else : // If not viewing a single post. ?>
	
		<header class="entry-header">
		
			<?php
			if ( has_post_thumbnail() ) :

				the_post_thumbnail( 'thumbnail', array( 'class' => 'thumbnail-team-member' ) );
			
			elseif  ( isset( $team_member_email ) && ( '' != $team_member_email ) && function_exists( 'kuorinka_plus_our_theme_author_details' ) ) :
				
				echo '<figure itemprop="image">' .  get_avatar( $team_member_email, 150 ) . '</figure>';
				
			endif; // End thumbnail check.
			?>
				
			<?php the_title( sprintf( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
			<?php
			$member_role = '';
 
			if ( isset( $role ) && '' != $role && apply_filters( 'woothemes_our_team_member_role', true ) && function_exists( 'kuorinka_plus_our_theme_author_details' ) ) {
				$member_role .= ' <p class="kuorinka-plus-role role" itemprop="jobTitle">' . $role . '</p>' . "\n";
			}
 
			echo apply_filters( 'woothemes_our_team_member_fields_display', $member_role );
			?>	

	</header><!-- .entry-header -->
		
		<div class="entry-summary" <?php hybrid_attr( 'entry-summary' ); ?>>
			<?php the_content(); ?>
		</div><!-- .entry-summary -->
		
		<div class="entry-footer">

			<?php if( function_exists( 'kuorinka_plus_our_theme_author_details' ) ) :
				echo kuorinka_plus_our_theme_author_details();
			endif; ?>
		
		</div><!-- .entry-footer -->
	
	<?php endif; // End single post check. ?>
	
</article><!-- #post-## -->