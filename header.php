<?php
session_start();
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package calplus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'calplus' ); ?></a>
	


		<nav class="navbar navbar-dark navbar-expand-lg bg-black py-4 py-lg-5 border-bottom sticky-navbar">
			<div class="container-fluid px-5">
				<div class="site-branding">
					<?php
					the_custom_logo();
					?>
				</div>
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-custom-icon"><i class="bi bi-list"></i></span>
				</button>
				<!-- *** Offcanvas *** -->
				<div class="offcanvas offcanvas-start d-flex d-lg-none bg-black" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
					<div class="row offcanvas-header mt-3 py-3">
						<div class="col-6">
							<?php
								the_custom_logo();
							?>
						</div>
						<div class="col-6 d-flex justify-content-end align-self-center">
							<button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close">
								<i class="bi bi-x-lg"></i>
							</button>
						</div>	
					</div>
					<div class="row offcanvas-body">
						<div class="col-12 d-flex justify-content-center align-self- ps-0">
							<nav class="navbar-header text-white d-flex flex-column align-items-center">
								<div class="navbar-nav text-white text-center mb-5">
									<?php
											wp_nav_menu(
												array(
													'theme_location' => 'menu-2',
													'menu_id'        => 'offcanvas-menu',
												)
											);
										?>
								</div>
								<form class="d-flex border border-white rounded-5 header-search mb-5" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input class="header-form-control rounded-5 text-white pe-5 ps-3 bg-transparent border-0" type="search" placeholder="Suche..." aria-label="Search" name="s">
									<input type="hidden" name="post_type" value="product">
									<button class="btn text-white" type="submit"><i class="bi bi-search"></i></button>
								</form>
								<?php echo do_shortcode("[woo_cart_but]"); ?>
							</nav>
							
						</div>
					</div>
				</div>
				<!-- *** Offcanvas End -->
				<div class="collapse navbar-collapse justify-content-evenly" id="navbarNav">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
					?>
					<form class="d-flex border border-white rounded-5 header-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input class="header-form-control rounded-5 text-white pe-5 ps-3 bg-transparent border-0" type="search" placeholder="Suche..." aria-label="Search" name="s">
						<input type="hidden" name="post_type" value="product">
						<button class="btn text-white" type="submit"><i class="bi bi-search"></i></button>
					</form>
					<?php echo do_shortcode("[woo_cart_but]"); ?>
				</div>
			</div>
		</nav>
		<?php get_template_part('template-parts/header/categories');?>
		

	<?php get_template_part('template-parts/header/floating_contact_button');?>