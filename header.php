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
		<header class="cristina-header d-flex flex-column justify-content-between" style="background-image: url(<?php echo esc_url( cristina_header_image() ); ?>)">
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
					<div class="col-md-6 d-flex jsutify-content-end align-items-center">
						<?php
						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu(
								[
									'theme_location' => 'primary',
									'container' => 'nav',
									'container_class' => 'cristina-header-nav',
									'menu_class' => 'cristina-header-menu',
									'menu_id' => '',
									'depth' => 2
								]
							);
						}
						?>
					</div>
				</div>
			</div>
			<?php
				// Load header title template part.
				get_template_part( 'template-parts/partials/content', 'header-title' );
			?>
		</header>
