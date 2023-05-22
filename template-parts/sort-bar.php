<div class="row d-flex bg-dark text-white rounded p-4 mb-4 mx-0">
    <div class="col-3 d-flex flex-row-reverse align-items-center justify-content-between">
        <?php if (have_posts()): ?>
            <?php do_action('woocommerce_before_shop_loop'); ?>
        <?php endif; ?>
    </div>
    <div class="col-4 d-flex align-items-center d-flex justify-content-center">
        <form class="woocommerce-products-per-page" action="" method="get">
            <select name="products-per-page" id="products-per-page" class="woocommerce-select">
                <?php
                $current_value = isset($_GET['products-per-page']) ? $_GET['products-per-page'] : get_option('posts_per_page');
                $options = array(4, 8, 12, 16, 32); // Add or modify the desired options here
                
                // Add the current value to the options array if it doesn't exist
                if (!in_array($current_value, $options)) {
                    $options[] = $current_value;
                }

                foreach ($options as $option) {
                    printf(
                        '<option value="%s" %s>%s</option>',
                        esc_attr($option),
                        selected($current_value, $option, false),
                        esc_html($option)
                    );
                }
                ?>
            </select>
            <label class="ms-3" for="products-per-page">Pro Seite</label>
            <?php 
                global $wp_query;
                $total_products = $wp_query->found_posts;?>
            <span class="ms-3 text-white-50">(<?= $total_products;?> Produkte)</span>
        </form>

    </div>
    <div class="col-5 woocommerce-pagination-col d-flex justify-content-end">
        
        <?php do_action('woocommerce_after_shop_loop'); ?>
    </div>
</div>