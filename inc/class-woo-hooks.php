<?php
/**
 * Woocommerce hooks and functions
 */

class Cristina_Woo_Hooks {

	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'crtistina_setup_theme' ] );
		add_action( 'wp', [ $this, 'cristina_remove_shop_sidebar_from_shop' ] );

		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_bafter_main_content', 'woocommerce_output_content_wrapper_end', 10 );
		// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );


		add_action( 'woocommerce_before_main_content', [ $this, 'cristina_open_content_wrapper' ], 10 );
		add_action( 'woocommerce_after_main_content', [ $this, 'cristina_close_content_wrapper' ], 10 );
		add_action( 'woocommerce_before_shop_loop', [ $this, 'cristina_custom_header_container_start' ], 15);
		add_action( 'woocommerce_before_shop_loop', [ $this, 'cristina_custom_header_container_end' ], 35 );
		add_action( 'woocommerce_after_shop_loop', [ $this, 'cristina_custom_product_pagination' ], 10 );

		// add_filter( 'woocommerce_show_page_title', '__return_false' );
		add_filter( 'woocommerce_show_page_title', [ $this, 'cristina_remove_shop_title' ], 10 );
		// add_filter( 'woocommerce_catalog_orderby', [ $this, 'cristina_catalog_orderby' ], 10 );
		add_filter( 'woocommerce_loop_product_link', [ $this, 'cristina_loop_product_link' ], 10, 2 );
		add_filter( 'woocommerce_sale_flash', [ $this, 'cristina_sale_flash' ], 10 );
		add_filter( 'woocommerce_product_loop_title_classes', [ $this, 'cristina_product_loop_title_classes' ], 10 );
		add_filter( 'woocommerce_product_add_to_cart_text', [ $this, 'cristina_product_add_to_cart_text' ], 10 );
		add_filter( 'gettext', [ $this, 'cristina_gettext' ], 20, 3 );
		add_filter( 'loop_shop_columns', [ $this, 'cristina_loop_shop_columns' ], 999 );
		add_filter( 'loop_shop_per_page', [ $this, 'cristina_shop_per_page' ], 20 );
	}

	public function cristina_remove_shop_sidebar_from_shop() {
		if ( is_shop() ) {
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		}
	}

	public function cristina_loop_shop_columns() {
		return 3;
	}

	public function cristina_shop_per_page() {
		return 6;
	}

	public function crtistina_setup_theme() {
		add_theme_support( 'woocommerce' );
	}

	public function cristina_remove_shop_title() {
		return false;
	}

	public function cristina_open_content_wrapper() {
		?>
		<div id="primary" class="cristina-content-area">
			<main id="main" class="cristina-site-main">
				<div class="container">
					<div class="row">
		<?php
	}

	public function cristina_close_content_wrapper() {
		?>
					</div>
				</div>
			</main>
		</div>
		<?php
	}

	public function cristina_custom_header_container_start() {
		?>
		<div class="cristina-custom-shop-header-wrapper">
		<?php
	}

	public function cristina_custom_header_container_end() {
		?>
		</div>
		<?php
	}

	public function cristina_catalog_orderby( $sortby ) {
		unset( $sortby['popularity'] );
		unset( $sortby['rating'] );
		unset( $sortby['date'] );
		unset( $sortby['price'] );

		$sortby['price-desc'] = 'Custom Price: High to Low';
		$sortby['price-asc'] = 'Custom Price: Low to High';

		return $sortby;
	}

	public function cristina_loop_product_link( $link, $product ) {
		$link = $link .'?custom=something';
		return $link;
	}

	public function cristina_sale_flash( $content ) {
		$content = '<span class="onsale">' . esc_html__( 'Hot!', 'woocommerce' ) . '</span>';
		return $content;
	}

	public function cristina_product_loop_title_classes( $classes ) {
		$classes = $classes .' custom-class';
		return $classes;
	}

	public function cristina_product_add_to_cart_text( $text ) {
		$text = '<> Buy Now';
		return $text;
	}

	public function cristina_gettext( $translated, $text, $domain ) {
		if (  'View cart' === $text && 'woocommerce' === $domain ) {
			$translated = 'View Basket';
		}
		return $translated;
	}

	public function cristina_custom_product_pagination() {
		global $wp_query;
		echo paginate_links( [
			'total' => $wp_query->max_num_pages,
			'prev_text' => '&laquo; Previous',
			'next_text' => 'Next &raquo;',
		] );
	}

}

new Cristina_Woo_Hooks();