<?php
/**
 * Content single template
 */
?>
<article id="id-<?php the_ID(); ?>" class="cristina-post-article col-sm-12 col-md-12">
	<div class="cristina-post-content">
		<?php
			the_content();

			// Generate Post Tags.
			$tags = get_the_tags();
			$array_of_tags = [];
			if ( ! empty( $tags ) ) :
				foreach ( $tags as $tag ) :
					$array_of_tags[] = '<a href="'.esc_url( get_tag_link( $tag ) ).'">'.esc_html__( $tag->name, 'cristina-yt' ).'</a>';
				endforeach;

				printf(
					'<span class="cristina-post-tags">%1$s: '.wp_kses(
						join( ', ', $array_of_tags ),
						[
							'a' => [
								'href' => []
							]
						]
					).'</span>',
					esc_html__( 'Tags', 'cristina-yt' )
				);
			endif;
		?>
	</div>
</article>