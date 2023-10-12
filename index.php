<?php
/**
 * Main Tempalte File.
 */
get_header();
?>

	<div id="primary" class="cristina-content-area">
		<main id="main" class="cristina-site-main">
			<div class="container">
				<div class="row gy-4">
					<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/post/content', get_post_format() );
						}
					} else {
						// DO something
					}
					?>
				</div>
			</div>
		</main>
	</div>

<?php
get_footer();