<?php
/**
 * Content search template part.
 */
?>

<article id="id-<?php the_ID() ?>" class="col-md-12 cristina-search-article">
	<div class="cristina-post-content mb-3">
		<?php
			// Post title.
			printf(
				'<h4 class="cristina-post-title"><a href="%1$s">%2$s</a></h4>',
				esc_url( get_the_permalink() ),
				esc_html__( get_the_title(), 'cristina-yt' )
			);
		?>
		<div class="cristina-post-metas d-flex mb-2">
			<?php
				// Print post metas.
				cristina_post_metas();
			?>
		</div>

		<?php
			// Post excerpt.
			printf(
				'<div class="cristina-post-excerpt mb-2">%1$s</div>',
				wp_kses_post( get_the_excerpt() )
			);

			// Read more.
			printf(
				'<a href="%1$s" class="cristina-post-readmore">%2$s</a>',
				esc_url( get_the_permalink() ),
				esc_html__( 'Read More', 'cristina-yt' )
			);
		?>
	</div>
</article>