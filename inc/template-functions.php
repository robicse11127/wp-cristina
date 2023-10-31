<?php
/**
 * Contains all template related functions.
 */

if ( ! function_exists( 'cristina_post_metas' ) ) {

	/**
	 * Generate post metas in a loop.
	 *
	 * @return void
	 */
	function cristina_post_metas() {
		// Post terms.
		$terms = get_the_term_list( get_the_ID(), 'category', '', ', ' );
		printf(
			'<span class="cristina-post-terms">%1$s: %2$s</span>',
			esc_html__( 'In', 'cristina-yt' ),
			wp_kses_post( $terms )
		);

		// Post author.
		printf(
			'<span class="cristina-post-author">%1$s: %2$s</span>',
			esc_html__( 'By', 'cristina-yt' ),
			wp_kses_post( get_the_author_posts_link() )
		);

		// Post Date.
		printf(
			'<span class="cristina-post-date">%1$s: %2$s</span>',
			esc_html__( 'On', 'cristina-yt' ),
			esc_html__( get_the_date(), 'cristina-yt' )
		);
	}

}

if ( ! function_exists( 'cristina_header_image' ) ) {

	/**
	 * Get page header image
	 *
	 * @return int $header_image_src Return the current page id.
	 */
	function cristina_header_image() {
		$header_image_src = '';
		if ( is_home() || is_front_page() || is_page() || is_singular() || is_404() ) {
			$page_id = get_queried_object_id();
			$header_image_src = get_the_post_thumbnail_url( $page_id, 'full' );
		}

		if ( function_exists( 'is_shop' ) && is_shop() ) {
			$page_id = get_option( 'woocommerce_shop_page_id' );
			$header_image_src = get_the_post_thumbnail_url( $page_id, 'full' );
		}

		return $header_image_src;
	}

}