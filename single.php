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
			?>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="cristina-post-comments mt-5">
							<?php
							// If comments are open them we can show the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

<?php
get_footer();