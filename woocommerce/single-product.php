<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 
// Access the values
$product_id = get_the_ID();
$product_categories = get_the_terms($product_id, 'product_cat');
$product_subcats = get_product_subcategories($product_id);
?>
<div class="container">

    <div class="row pt-4 pb-3 pb-lg-0 pt-lg-5 mb-0 mb-lg-5">
        <div class="col-12 col-lg-3 d-flex align-items-center mb-3 mb-lg-0">
            <?php woocommerce_breadcrumb();?>
        </div>
        <div class="col-12 col-lg-6 text-center">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <a class="text-black" href="">
					<h1 class="woocommerce-products-header__title page-title">
						<?php $category_count = 1;?>
						<?php if($product_subcats):?>
							<?php foreach ($product_subcats as $subcategory):?>
								<a class="text-black" href="<?=$subcategory['url'];?>"><?= $subcategory['name'];?></a><?php if($category_count<count($product_subcats)):?>,<?php endif;?>
								<?php $category_count++;?>
							<?php endforeach;?>
						<?php else:?>
							<?php $category_count = 1;?>
							<?php foreach ($product_categories as $category):
								$category_name = $category->name; // Category name
								$category_link = get_term_link($category); // Category link?>
								<a class="text-black" href="<?=$category_link;?>"><?= $category_name;?></a><?php if($category_count<count($product_categories)):?>,<?php endif;?>
								<?php $category_count++;?>
							<?php endforeach;?>
						<?php endif;?>
					</h1>
				</a>
                
            <?php endif; ?>
        </div>
        <div class="col-12 col-lg-3">

        </div>
    </div>
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

</div>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
