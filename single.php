<?php
/**
 * Single post template.
 */
get_header();
?>
<div id="primary" class="cristina-content-area">
	<main id="main" class="cristina-site-main">
		<div class="container">
			<div class="row">
				<?php
				if ( have_posts() ) {
					while( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/post/content', 'single' );
					}
				}
				?>
			</div>
		</div>
	</main>
</div>
<?php
get_footer();