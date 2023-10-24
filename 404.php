<?php
/**
 * 404 page template.
 */
get_header();
?>
<div id="primary" class="cristina-content-area">
	<main id="main" class="cristina-site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cristina-yt' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</main>
</div>
<?php
get_footer();