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