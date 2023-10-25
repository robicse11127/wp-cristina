<?php
/**
 * Search page template.
 */
get_header();
?>
<div id="primary" class="cristina-content-area">
	<main id="main" class="cristina-site-main">
		<div class="container">
			<div class="row">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/page/content', 'search' );
					endwhile;
				?>
					<div class="cristina-pagination">
						<?php
							// Paginations.
							echo paginate_links( [
								'prev_text' => esc_html__( 'Previous', 'cristina-yt' ),
								'next_text' => esc_html__( 'Next', 'cristina-yt' )
							] );
						?>
					</div>
				<?php
				else:
					get_template_part( 'template-parts/page/content', 'none' );
				endif;

				wp_reset_postdata();
				?>
			</div>
		</div>
	</main>
</div>
<?php
get_footer();