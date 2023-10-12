<?php
/**
 * Post loop content template.
 */
?>

<article id="post-<?php the_ID(); ?>" class="cristina-post-article col-sm-12 col-md-4">
	<?php
	// Post Thumbnail.
	printf(
		'<figure class="cristina-post-thumbnail"><img src="%1$s" alt="%2$s" /></figure>',
		esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ),
		esc_attr( get_post_field( 'post_name' ) )
	);

	// Post title.
	printf(
		'<h4 class="cristina-post-title"><a href="%1$s">%2$s</a></h4>',
		esc_url( get_the_permalink() ),
		esc_html__( get_the_title(), 'cristina-yt' )
	);
	?>

	<div class="cristina-post-metas">
		<?php
			// Post terms.
			$terms = get_the_term_list( get_the_ID(), 'category', '', ', ' );
			printf(
				'<span class="cristina-post-terms">%1$s: %2$s</span>',
				esc_html__( 'In', 'cristina-yt' ),
				wp_kses_post( $terms )
			);

			// Post Date.
			printf(
				'<span class="cristina-post-date">%1$s: %2$s</span>',
				esc_html__( 'On', 'cristina-yt' ),
				esc_html__( get_the_date(), 'cristina-yt' )
			);

			// Post author.
			printf(
				'<span class="cristina-post-author">%1$s: %2$s</span>',
				esc_html__( 'By', 'cristina-yt' ),
				wp_kses_post( get_the_author_link() )
			);
		?>



	</div>

	<?php
		// Post Exceprt
		printf(
			'<div class="cristina-post-excerpt">%1$s</div>',
			wp_kses_post( get_the_excerpt() )
		);

		// Read more link.
		printf(
			'<a href="%1$s" class="cristina-post-readmore">%2$s</a>',
			esc_url( get_the_permalink() ),
			esc_html__( 'Read More', 'cristina-yt' )
		);
	?>


</article>