<nav id="menu-team-member" class="menu menu-team-member" role="navigation" aria-label="<?php esc_attr_e( 'Team Member Menu', 'kuorinka' ); ?>" <?php hybrid_attr( 'menu', 'team-member' ); ?>>

	<?php if ( has_nav_menu( 'team-member' ) ) : // Check if there's a menu assigned to the 'team-member' location. ?>
		
		<?php wp_nav_menu(
			array(
				'theme_location'  => 'team-member',
				'container'       => 'div',
				'container_class' => 'wrap',
				'menu_id'         => 'menu-team-member-items',
				'menu_class'      => 'menu-items',
				'depth'           => 1,
				'fallback_cb'     => '',
				'items_wrap'      => '<ul id="%s" class="%s">%s</ul>'
			)
		); ?>

	<?php else : // If there's no assigned 'team-member' menu. ?>

		<ul id="menu-team-member-items" class="menu-items">
			<?php $type = get_post_type_object( 'team-member' ); ?>

			<li <?php echo is_post_type_archive( 'team-member' ) ? 'class="current-cat"' : ''; ?>>
				<a href="<?php echo get_post_type_archive_link( 'team-member' ); ?>">
					<?php 
						/* Translators: "All" is a link that points to the team-member archive. */
						_e( 'All', 'kuorinka' );
					?>
				</a>
			</li>

			<?php wp_list_categories( 
				array( 
					'taxonomy'         => 'team-member-category',
					'depth'            => 1, 
					'hierarchical'     => false,
					'show_option_none' => false,
					'title_li'         => false 
				) 
			); ?>
		</ul>

	<?php endif; // End check for 'team-member' menu. ?>

</nav><!-- #menu-team-member -->