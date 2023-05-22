<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products pt-5 mt-5">

		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'This might also interest you', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2 class="pb-5 text-center text-uppercase"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		
		<?php woocommerce_product_loop_start(); ?>

            <?php $index_item = 1;?>
            <div id="carouselRelated" class="carousel carousel-dark slide">
                <div class="carousel-inner p-5">
                    <?php $index = 0;?>
                    <?php while($index < count($related_products)):?>
                        <?php $index_product = 1;?>
                        <div class="carousel-item<?php if($index_item==1):?> active<?php endif;?>">
                            <div class="row">
                                <?php while($index_product<5 && $index < count($related_products)):
                                        $product_title = $related_products[$index]->get_title();
                                        $product_permalink = $related_products[$index]->get_permalink();
                                        $product_cats = $related_products[$index]->get_categories();
                                        $product_short_desc = $related_products[$index]->get_short_description();
                                        ?>
                                    <div class="col-3">
                                        <div class="p-4 h-100 shadow rounded d-flex flex-column position-relative">
                                            <?php 
                                                if( $related_products[$index]->is_on_sale() ) {
                                                    echo '<div class="onsale-badge p-3"><img src="/wp-content/uploads/2023/05/Bildschirm­foto-2023-05-04-um-15.21.24.png" alt="..."></div>';
                                                }
                                            ?>
                                            <a href="<?= $produt_permalink; ?>"><img src="<?php echo wp_get_attachment_url( $related_products[$index]->get_image_id(), 'large' ); ?>" class="img-fluid" alt="..."></a>
                                            <h3 class="text-uppercase mt-5 mb-5"><?= $product_title;?></h3>
                                            <h4 class="mb-3"><?= $product_cats; ?></h4>
                                            <p class="mb-5 text-black-50"><?= $product_short_desc;?></p>
                                            <a href="<?= $product_permalink; ?>" class="align-self-center"><button class="btn btn-secondary text-uppercase" type="button">Detailansicht</button></a>
                                        </div>
                                    </div>
                                    <?php $index_product++;?>
                                    <?php $index++;?>
                                <?php endwhile;?>
                            </div>
                        </div>
                        <?php $index_item++;?>
                    <?php endwhile; ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselRelated" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselRelated" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>

		<?php woocommerce_product_loop_end(); ?>

	</section>
	<?php
endif;

wp_reset_postdata();
