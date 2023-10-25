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
				// Post terms.
				$terms = get_the_term_list( get_the_ID(), 'category', '', ',' );
				printf(
					'<span class="cristina-post-term">%1$s: %2$s</span>',
					esc_html__( 'In', 'cristina-yt' ),
					wp_kses_post( $terms, 'cristina-yt' )
				);

				// Post author.
				printf(
					'<span class="cristina-post-tern">%1$s: %2$s</span>',
					esc_html__( 'By', 'cristina-yt' ),
					wp_kses_post( get_the_author_posts_link() )
				);

				// Post date.
				printf(
					'<span class="cristina-post-date">%1$s: 09 Oct, 2023</span>',
					esc_html__( 'Date', 'cristina-yt' ),
					esc_html__( get_the_date(), 'cristina-yt' )

				);
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