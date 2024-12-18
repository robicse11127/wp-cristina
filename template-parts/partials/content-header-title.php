<?php
/**
 * Header title template part
 */
?>
<!-- Header Title -->
<div class="container">
	<div class="row">
		<?php
		if ( is_home() || is_front_page() || is_page() ) :
		?>
			<div class="col-xs-12">
				<h1 class="cristina-page-title text-center"><?php echo esc_html__( single_post_title(), 'cristina-yt' ); ?></h1>
			</div>
		<?php
		elseif( is_category() || is_author() || is_tag() ) :
		?>
			<div class="col-xs-12">
				<h1 class="cristina-page-title text-center"><?php echo wp_kses( get_the_archive_title(), [ 'span' => [] ] ); ?></h1>
			</div>
		<?php
		elseif( is_shop() ) :
		?>
			<div class="col-xs-12">
				<h1 class="cristina-page-title text-center"><?php woocommerce_page_title(); ?></h1>
			</div>
		<?php
		elseif( is_singular() && ! is_product() ) :
		?>
			<div class="col-xs-12">
				<h1 class="cristina-single-page-title"><?php echo esc_html__( single_post_title(), 'cristina-yt' ); ?></h1>
			</div>
			<div class="cristina-post-metas mt-2 mb-2">
				<?php
					// Generate post metas.
					cristina_post_metas();
				?>
			</div>
		<?php
		elseif( is_404() ) :
			?>
			<h1 class="cristina-page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cristina-yt' ); ?></h1>
			<?php
		elseif( is_search() ):
			?>
			<h1 class="cristina-page-title cristina-search-page-title"><?php wp_title(); ?></h1>
			<?php
		else :
			// Do something else

		endif;
		?>
		</div>
	</div>
</div>
