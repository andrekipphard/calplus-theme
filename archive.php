<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package calplus
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			

		
			<?php if ( have_posts() ) : ?>
				<div class="row pt-4 pb-3 pb-lg-0 pt-lg-5">
					<div class="col-12 col-lg-3 d-flex align-items-center mb-3 mb-lg-0">
					</div>
					<div class="col-12 col-lg-6 text-center">
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							<h1 class="woocommerce-products-header__title page-title"><?php post_type_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1>
							<p><?php the_archive_description( '<div class="archive-description">', '</div>' ); ?></p>
						<?php endif; ?>
					</div>
					<div class="col-3">

					</div>
				</div>
				<div class="row py-4 py-lg-5">
					<div class="col-12 col-lg-3 sidebar-col">
						<div class="border rounded border-dark p-4">
							<div id="woocommerce-sidebar" class="woocommerce-sidebar">
								<?php get_sidebar(); ?>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-9">
						<div class="row">
							<div class="col d-flex flex-column">
								<div class="border border-dark rounded pt-4 ps-4 pe-4 pb-0 mb-4">
									<?php
										/* Start the Loop */
										while ( have_posts() ) :
											the_post();

											/*
											* Include the Post-Type-specific template for the content.
											* If you want to override this in a child theme, then include a file
											* called content-___.php (where ___ is the Post Type name) and that will be used instead.
											*/
											get_template_part( 'template-parts/archive-content', get_post_type() );

										endwhile;

										the_posts_navigation();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>


			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
			
		</div>
		<?php if(have_rows('logo_carousel', 'options')):?>
    <div class="row me-0">
        <div class="col">
            <div class="swiper mySwiper py-4 py-lg-5">
                <div class="swiper-wrapper">
                    <?php while(have_rows('logo_carousel', 'options')): the_row();
                        $logo = get_sub_field('logo_carousel', 'options');?>
                        <div class="swiper-slide shadow rounded p-5"><img src="<?= wp_get_attachment_image_url($logo, 'full');?>" class="img-fluid" alt="..."></div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
	</main><!-- #main -->


<?php

get_footer();
