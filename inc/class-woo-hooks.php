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
		// remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);



		add_action( 'woocommerce_before_main_content', [ $this, 'cristina_open_content_wrapper' ], 10 );
		add_action( 'woocommerce_after_main_content', [ $this, 'cristina_close_content_wrapper' ], 10 );
		add_action( 'woocommerce_before_shop_loop', [ $this, 'cristina_custom_header_container_start' ], 15);
		add_action( 'woocommerce_before_shop_loop', [ $this, 'cristina_custom_header_container_end' ], 35 );
		add_action( 'woocommerce_after_shop_loop', [ $this, 'cristina_custom_product_pagination' ], 10 );
		add_action( 'woocommerce_share', [ $this, 'cristina_woocommerce_share' ]);

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
		add_filter( 'wc_add_to_cart_message_html', [ $this, 'cristina_add_to_cart_message_html' ], 10, 2 );
		add_filter( 'post_class', [$this, 'cristina_post_class'], 10, 3 );
		add_filter( 'woocommerce_product_thumbnails_columns', [ $this, 'cristina_product_thumbnails_columns' ] );
		add_filter( 'woocommerce_product_price_class', [$this, 'cristina_product_price_class'] );
		add_filter( 'woocommerce_short_description', [$this, 'cristina_short_description'] );
		add_filter( 'woocommerce_structured_data_product', [$this, 'cristina_structured_data_product'], 10, 2 );
		add_filter( 'woocommerce_product_tabs', [$this, 'cristina_product_tabs'] );
	}

	public function cristina_remove_shop_sidebar_from_shop() {
		if ( is_shop() || is_product() ) {
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
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

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

	public function cristina_add_to_cart_message_html( $message, $product_id ) {
		$product = wc_get_product( (string) array_key_first($product_id) );
		$message = sprintf(
			'<a href="%s" class="button wc-forward">%s</a> %s',
			esc_url( $product->get_permalink() ),
			__( 'Continue Shopping', 'woocommerce' ),
			__( 'Product has been added to your basket.', 'woocommerce' )
		); // $product->get_name();
		return $message;
	}

	public function cristina_post_class( $classes, $class, $post_id ) {
		if ( is_singular('product') && 'product' === get_post_type( $post_id ) ) {
			$classes[] = 'cristina-custom-product';
		}
		return $classes;
	}

	public function cristina_product_thumbnails_columns() {
		return 6;
	}

	public function cristina_product_price_class($class) {
		return $class .' cristina-product-price';
	}

	public function cristina_short_description($content) {
		return $content .'<p class="cristina-short-description">This is a custom short description</p>';
	}

	public function cristina_woocommerce_share() {
		echo 'Share this product';
	}

	public function cristina_structured_data_product( $markup, $product ) {
		// echo '<pre>'; echo print_r( $markup );echo '</pre>';die();
		// echo '<pre>'; echo print_r( $product );echo '</pre>';die();
		return $markup;
	}

	public function cristina_product_tabs( $tabs ) {
		// echo '<pre>'; echo print_r( $tabs );echo '</pre>';die();
		unset( $tabs['reviews'] );

		$tabs['custom_tab'] = [
			'title' => 'Custom Tab',
			'priority' => 20,
			'callback' => [ $this, 'cristina_custom_product_tab' ]
		];

		return $tabs;
	}

	public function cristina_custom_product_tab() {
		echo '<h2>Custom Proeduct Tab</h2>';
		echo '<p>This is a custom tab</p>';
	}
}

new Cristina_Woo_Hooks();