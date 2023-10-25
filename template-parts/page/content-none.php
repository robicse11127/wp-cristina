<?php
/**
 * Content none template.
 */
?>

<div class="cristina-no-results">
	<?php

	if ( is_home() && current_user_can( 'publish_posts' ) ) {
		printf(
			'<p>' . wp_kses(
				/* translators: 1: link to WP admin new post page. */
				__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cristina-yt' ),
				array(
					'a' => array(
						'href' => array(),
					),
				)
			) . '</p>',
			esc_url( admin_url( 'post-new.php' ) )
		);
	} else {
		?>
		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cristina-yt' ); ?></p>
		<?php
		get_search_form();
	}

	?>
</div>