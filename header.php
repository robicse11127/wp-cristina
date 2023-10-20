<?php
/**
 * Header template file.
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ) ?>">
		<meta name="viewport" content="width=device-width, intial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!-- header section starts -->
		<?php
		global $post;
		$cristina_current_page_id = get_queried_object_id();
		?>
		<header class="cristina-header d-flex flex-column justify-content-between" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( $cristina_current_page_id, 'full' ) ); ?>')">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<?php
							$cristina_logo_id = get_theme_mod( 'custom_logo' );
							$cristina_logo = wp_get_attachment_image_src( $cristina_logo_id, 'full' );

							if ( has_custom_logo() ) {
								printf(
									'<a href="%1$s" class="cristina-site-logo"><img src="%2$s" /></a>',
									esc_url( home_url() ),
									esc_url( $cristina_logo[0] )
								);
							} else {
								echo bloginfo( 'name' );
							}
						?>
					</div>
					<div class="col-xs-12 col-md-6 d-flex justify-content-end align-items-center">
						<?php
						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu(
								[
									'theme_location'  => 'primary',
									'container'       => 'nav',
									'container_class' => 'cristina-header-nav',
									'menu_class'      => 'cristina-header-menu',
									'menu_id'         => '',
									'depth'           => 2
								]
							);
						} else {
							printf(
								'<a href="%1$s">%2$s</a>',
								esc_url( admin_url( '/nav-menus.php' ) ),
								esc_html__( 'Asign a menu', 'cristina-yt' )
							);
						}
						?>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<?php
					if ( is_home() || is_front_page() || is_page() ) :
					?>
					<div class="col-xs-12">
						<h1 class="cristina-page-title text-center"><?php echo esc_html__( single_post_title(), 'cristina-yt' ); ?></h1>
					</div>
					<?php
					elseif( is_singular() ):
					?>
						<div class="col-xs-12">
							<h1 class="cristina-single-page-title"><?php echo esc_html__( single_post_title(), 'cristina-yt' ); ?></h1>
						</div>
						<div class="col-xs-12">
							<div class="cristina-post-metas mb-2 mt-2">
								<?php
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
								?>
							</div>
						</div>
					<?php
					endif;
					?>
				</div>
			</div>
		</header>
		<!-- header section ends -->