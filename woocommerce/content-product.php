<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
    <?php               
        $product_title = $product->get_title();
        $product_permalink = $product->get_permalink();
        $product_price = $product->get_price_html();
        $product_id = $product->get_id();
        $product_subcats = get_product_subcategories($product_id);
        $product_short_desc = $product->get_short_description();
    ?>
    <div class="p-4 h-100 shadow rounded d-flex flex-row position-relative align-items-center">
        <?php 
            if( $product->is_on_sale() ) {
                echo '<div class="onsale-badge p-3"><img src="/wp-content/uploads/2023/05/Bildschirm­foto-2023-05-04-um-15.21.24.png" alt="..."></div>';
            }
        ?>
        <div class="col-4">
            <div class="pe-3">
            <a href="<?= $product_permalink; ?>"><img src="<?php echo wp_get_attachment_url( $product->get_image_id(), 'large' ); ?>" class="img-fluid" alt="..."></a>
            </div>
            
        </div>
        <div class="col-4">
            <div class="px-3">
            <h3 class="text-uppercase"><?= $product_title;?></h3>
            <h4 class="">
                <?php $category_count = 1;?>
                <?php foreach ($product_subcats as $subcategory):?>
                        <a href="<?=$subcategory['url'];?>"><?= $subcategory['name'];?></a><?php if($category_count<count($product_subcats)):?>,<?php endif;?>
                        <?php $category_count++;?>
                        <?php endforeach;
                ?>
            </h4>
            <hr>
            <p class="price"><?= $product_price; ?></p>
            <hr>
            <a href="<?= $product_permalink; ?>"><button class="btn btn-secondary text-uppercase" type="button">Detailansicht</button></a>
            </div>
            
        </div>
        <div class="col-4">
            <div class="border-start ps-3">
                <p class="text-black-50"><?= $product_short_desc;?></p>
            </div>
        </div>
    </div>
</li>