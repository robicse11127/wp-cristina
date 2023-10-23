<?php
/**
 * Main Tempalte File.
 */
get_header();
?>

<div id="primary" class="cristina-content-area">
	<main id="main" class="cristina-site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
					while ( have_posts() ) :
						the_post();

						// Content.
						the_content();
					endwhile;
					?>
				</div>
			</div>
		</div>
	</main>
</div>

<?php
get_footer();