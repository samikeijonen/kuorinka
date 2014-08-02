<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Kuorinka
 */
?>

			<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
			
			</div><!-- .wrap-inside -->
		</div><!-- .wrap -->
	</div><!-- #content -->
	
	<?php get_sidebar( 'subsidiary' ); // Loads the sidebar-subsidiary.php template. ?>

	<footer id="colophon" class="site-footer" role="contentinfo" <?php hybrid_attr( 'footer' ); ?>>
	
		<?php get_template_part( 'menu', 'social' ); // Loads the menu-social.php template. ?>
		
		<?php if ( get_theme_mod( 'footer_text') ) : // Check footer text. ?>
			<div class="site-info">
				<?php echo ( get_theme_mod( 'footer_text' ) ); ?>
			</div><!-- .site-info -->
		<?php endif; // End check for footer check. ?>
		
		<?php if ( !get_theme_mod( 'hide_site_info') ) : // Check site info. ?>
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'kuorinka' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'kuorinka' ), 'WordPress' ); ?></a>
				<span class="sep"><?php echo _x( '&middot;', 'Separator in site info.', 'kuorinka' ); ?></span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'kuorinka' ), 'Kuorinka', '<a href="https://foxnet-themes.fi" rel="designer">Sami Keijonen</a>' ); ?>
			</div><!-- .site-info -->
		<?php endif; // End check for site info. ?>
		
	</footer><!-- #colophon -->
	
	<?php do_action( 'kuorinka_after_footer' ); // Hook after footer. ?>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
