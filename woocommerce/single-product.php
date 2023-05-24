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
$return_cat = $_SESSION['return_cat'];
$return_cat_url = $_SESSION['return_cat_url'];?>
<div class="container">

    <div class="row pt-4 pb-3 pb-lg-0 pt-lg-5">
        <div class="col-12 col-lg-3 d-flex align-items-center mb-3 mb-lg-0">
            <?php woocommerce_breadcrumb();?>
        </div>
        <div class="col-12 col-lg-6 text-center">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <a class="text-black" href="<?= $return_cat_url; ?>"><h1 class="woocommerce-products-header__title page-title"><?= $return_cat; ?></h1></a>
                
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
