<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<div class="container">
    <div class="row pt-5">
        <div class="col-3 d-flex align-items-center">
            <?php woocommerce_breadcrumb();?>
        </div>
        <div class="col-6 text-center">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
            <?php endif; ?>
        </div>
        <div class="col-3">

        </div>
    </div>
    <div class="row py-5">
        <div class="col-3">
            <div class="border rounded border-dark p-4">
                <h3>Filtern nach</h3>
                <hr>
                <?php if ( is_active_sidebar( 'woocommerce-sidebar' ) ) : ?>
                    <div id="woocommerce-sidebar" class="woocommerce-sidebar">
                        <?php dynamic_sidebar( 'woocommerce-sidebar' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col d-flex flex-column">
                    <?php get_template_part('template-parts/sort-bar');?>
                    <div>
                        <?php get_template_part('template-parts/featured_products');?>
                    </div>
                    <div class="border border-dark rounded pt-4 ps-4 pe-4 pb-0 mb-4">
                        <?php
                        if ( woocommerce_product_loop() ) {
                            woocommerce_product_loop_start();
                            if ( wc_get_loop_prop( 'total' ) ) {
                                while ( have_posts() ) {
                                    the_post();
                                    
                                    /**
                                     * Hook: woocommerce_shop_loop.
                                     */
                                    do_action( 'woocommerce_shop_loop' );
                                    wc_get_template_part( 'content', 'product' );
                                }
                            }
                            woocommerce_product_loop_end();
                        } else {
                            /**
                             * Hook: woocommerce_no_products_found.
                             *
                             * @hooked wc_no_products_found - 10
                             */
                            do_action( 'woocommerce_no_products_found' );
                        }
                        ?>
                    </div>
                    <?php get_template_part('template-parts/sort-bar');?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(have_rows('logo_carousel', 'options')):?>
    <div class="row me-0">
        <div class="col">
            <div class="swiper mySwiper pt-5 pb-5">
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
<?php
    get_footer( 'shop' );
?>


