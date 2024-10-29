<?php
/**
 * Woocommerce hooks and functions
 */

class Cristina_Woo_Hooks {

	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'crtistina_setup_theme' ] );

		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_bafter_main_content', 'woocommerce_output_content_wrapper_end', 10 );
		// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

		add_action( 'woocommerce_before_main_content', [ $this, 'cristina_open_content_wrapper' ], 10 );
		add_action( 'woocommerce_after_main_content', [ $this, 'cristina_close_content_wrapper' ], 10 );
		add_action( 'woocommerce_before_shop_loop', [ $this, 'cristina_custom_header_container_start' ], 15);
		add_action( 'woocommerce_before_shop_loop', [ $this, 'cristina_custom_header_container_end' ], 35 );

		// add_filter( 'woocommerce_show_page_title', '__return_false' );
		add_filter( 'woocommerce_show_page_title', [ $this, 'cristina_remove_shop_title' ], 10 );
		// add_filter( 'woocommerce_catalog_orderby', [ $this, 'cristina_catalog_orderby' ], 10 );
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

}

new Cristina_Woo_Hooks();