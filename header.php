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
		<?php
		$cristina_current_page_id = get_queried_object_id();
		?>
		<img src="<?php echo get_the_post_thumbnail_url( $cristina_current_page_id, 'full' ); ?>" alt="">
		<header class="cristina-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<?php
							$cristina_logo_id = get_theme_mod( 'custom_logo' );
							$cristina_logo = wp_get_attachment_image_src( $cristina_logo_id, 'full' );

							if ( has_custom_logo() ) {
								printf(
									'<a href="%1$s" class="cristina-site-logo"><img src="%2$s" alt="" /></a>',
									esc_url( home_url() ),
									esc_url( $cristina_logo[0] )
								);
							} else {
								printf(
									'<a href="%1$s" class="cristina-site-logo">%2$s</a>',
									esc_url( home_url() ),
									esc_html__( get_bloginfo( 'name' ), 'cristina-yt' )
								);
							}
						?>
					</div>
					<div class="col-md-6">
						<?php
						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu(
								[
									'theme_location' => 'primary',
									'container' => false,
									'menu_class' => '',
									'menu_id' => '',
									'depth' => 2
								]
							);
						}
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<h1 class="cristina-page-title"><?php echo esc_html__( single_post_title(), 'cristina-yt' ); ?></h1>
					</div>
				</div>
			</div>
		</header>
