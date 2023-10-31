<?php
/**
 * Contains all helper functions.
 */

if ( ! function_exists( 'cristina_post_metas' ) ) {
	/**
	 * Generate post metas in a loop.
	 *
	 * @return void
	 */
	function cristina_post_metas() {
		global $post;
		// Post terms.
		$terms = get_the_term_list( get_the_ID(), 'category', '', ',' );
		printf(
			'<span class="cristina-post-term">%1$s: %2$s</span>',
			esc_html__( 'In', 'cristina-yt' ),
			wp_kses_post( $terms, 'cristina-yt' )
		);

		// Post author.
		printf(
			'<span class="cristina-post-term">%1$s: <a href="%2$s">%3$s</a></span>',
			esc_html__( 'By', 'cristina-yt' ),
			esc_url( get_author_posts_url( $post->post_author ) ),
			wp_kses_post( get_the_author_meta( 'nicename', $post->post_author ) )
		);

		// Post date.
		printf(
			'<span class="cristina-post-date">%1$s: 09 Oct, 2023</span>',
			esc_html__( 'Date', 'cristina-yt' ),
			esc_html__( get_the_date(), 'cristina-yt' )

		);
	}
}

if ( ! function_exists( 'cristina_header_image' ) ) {

	/**
	 * Get Page Header image
	 *
	 * @return $page_id Return the page id
	 */
	function cristina_header_image() {
		$header_image_src = '';
		if ( is_home() || is_front_page() || is_page() || is_404() || is_singular() ) {
			$page_id = get_queried_object_id();
			$header_image_src = get_the_post_thumbnail_url( $page_id, 'full' );
		}

		if ( is_shop() ) {
			$page_id = get_option( 'woocommerce_shop_page_id' );
			$header_image_src = get_the_post_thumbnail_url( $page_id, 'full' );
		}

		return $header_image_src;
	}
}

