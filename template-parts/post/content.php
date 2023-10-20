<?php
/**
 * Post loop content
 */
?>
<article id="post-<?php the_ID(); ?>" class="cristina-post-article col-sm-12 col-md-4">
	<?php
		// Post thumbnail.
		printf(
			'<figure class="cristina-post-thumbnail"><img src="%1$s" alt="%2$s" /></figure>',
			esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ),
			esc_attr( get_post_field( 'post_name' ) )
		);
	?>
	<div class="cristina-post-content">
		<?php
			// Post title.
			printf(
				'<h4 class="cristina-post-title"><a href="%1$s">%2$s</a></h4>',
				esc_url( get_the_permalink() ),
				esc_html__( get_the_title(), 'cristina-yt' )
			);
		?>

		<div class="cristina-post-metas d-flex justify-content-between mb-2">
			<?php
				// Post terms.
				$terms = get_the_term_list( get_the_ID(), 'category', '', ',' );
				printf(
					'<span class="cristina-post-term">%1$s: %2$s</span>',
					esc_html__( 'In', 'cristina-yt' ),
					wp_kses_post( $terms, 'cristina-yt' )
				);

				// Post date.
				printf(
					'<span class="cristina-post-date">%1$s: 09 Oct, 2023</span>',
					esc_html__( 'Date', 'cristina-yt' ),
					esc_html__( get_the_date(), 'cristina-yt' )

				);

				// Post author.
				printf(
					'<span class="cristina-post-tern">%1$s: %2$s</span>',
					esc_html__( 'By', 'cristina-yt' ),
					wp_kses_post( get_the_author_link() )
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