<?php
/**
 * Template Name: Blank
 */
get_header();
	?>
	<div id="primary">
		<main id="main">
			<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			?>
		</main>
	</div>
	<?php
get_footer();

