<?php
/**
 * Archive page template.
 */
get_header();
?>
	<div id="primary" class="cristina-content-area">
		<main id="main" class="cristina-stie-main">
			<div class="container">
				<?php get_template_part( 'template-parts/partials/search-form' ); ?>
				<div class="row gy-4">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content', get_post_format() );
						endwhile;
					?>
					<div class="cristina-pagination">
						<?php
						// paginations.
						echo paginate_links( [
							'prev_text' => __( 'Previous', 'cristina-yt' ),
							'next_text' => __( 'Next', 'cristina-yt' )
						] );
						?>
					</div>
					<?php
					else:
						get_template_part( 'template-parts/page/content', 'none' );
					endif;
					?>
				</div>
			</div>
		</main>
	</div>
<?php
get_footer();