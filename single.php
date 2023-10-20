<?php
/**
 * Single post template
 */
get_header();
?>
	<div id="primary" class="cristina-content-area">
		<main id="main" class="cristina-site-main">
			<div class="container">
			<?php
				if ( have_posts(  ) ) {
				 	while ( have_posts(  ) ) {
						the_post(  );
						get_template_part( 'template-parts/post/content', 'single' );
					}
				}

				// If comments are open them we can show the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			?>
			</div>
		</main>
	</div>

<?php
get_footer();