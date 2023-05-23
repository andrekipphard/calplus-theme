<div class="row bg-dark text-white text-center pt-3 me-0 categories-icons">
    <div class="col-6">
        <div class="row">
            <?php
                // Retrieve WooCommerce main product categories
                $categories = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => false,
                    'parent' => 0, // Only top-level categories
                    'orderby' => 'menu_order', // Order by standard
                    'order' => 'ASC', // Ascending order
                ));
                $index = 0;
                
                // Loop through the categories and display the images
                foreach ($categories as $key => $category) {
                    if($index <4):
                        $category_image_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $category_image_url = wp_get_attachment_image_src($category_image_id, 'full')[0];
                        $category_link = get_term_link($category->term_id, 'product_cat');
                        $category_name = $category->name;
                    ?>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <div class="px-3">
                                <a href="<?php echo $category_link; ?>">
                                    <img class="img-fluid<?php if (!is_product_category($category_name) && is_product_category()): ?> opacity-50 <?php endif; ?>" src="<?php echo $category_image_url; ?>" style="width:100px;">
                                </a>
                            </div>
                        </div>
                        <?php
                        unset($categories[$key]);
                        $index++;
                    endif;
                }
            
            ?>
        </div>
    </div>
    <div class="col-6">
        <div class="row">
            <?php
                foreach ($categories as $key => $category) {
                    if($index >=4):
                        $category_image_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $category_image_url = wp_get_attachment_image_src($category_image_id, 'full')[0];
                        $category_link = get_term_link($category->term_id, 'product_cat');
                        $category_name = $category->name;
                    ?>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <div class="px-3">
                                <a href="<?php echo $category_link; ?>">
                                    <img class="img-fluid<?php if (!is_product_category($category_name) && is_product_category()): ?> opacity-50 <?php endif; ?>" src="<?php echo $category_image_url; ?>" style="width:100px;">
                                </a>
                            </div>
                        </div>
                        <?php
                        unset($categories[$key]);
                        $index++;
                    endif;
                }
            ?>
        </div>
    </div>
</div>

<div class="row bg-dark text-white text-center pb-2 me-0 sticky-row categories-names">
    <div class="col-6">
        <div class="row">
            <?php
                // Retrieve WooCommerce main product categories
                $categories = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => false,
                    'parent' => 0, // Only top-level categories
                    'orderby' => 'menu_order', // Order by standard
                    'order' => 'ASC', // Ascending order
                ));
                $index = 0;
                
                // Loop through the categories and display the images
                foreach ($categories as $key => $category) {
                    if($index <4):
                        $category_image_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $category_name = $category->name;
                        $category_link = get_term_link($category->term_id, 'product_cat');
                    ?>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <div class="px-3">
                                <a href="<?php echo $category_link; ?>" class="categorie-name-link">
                                    <h6 class="text-uppercase mt-3 text-white"><?= $category_name; ?></h6>
                                </a>
                            </div>
                        </div>
                        <?php
                        unset($categories[$key]);
                        $index++;
                    endif;
                }
                
            ?>
        </div>
    </div>
    <div class="col-6">
        <div class="row">
            <?php
                foreach ($categories as $key => $category) {
                    if($index >=4):
                        $category_image_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $category_name = $category->name;
                        $category_link = get_term_link($category->term_id, 'product_cat');
                    ?>
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <div class="px-3">
                                <a href="<?php echo $category_link; ?>" class="categorie-name-link">
                                    <h6 class="text-uppercase mt-3 text-white"><?= $category_name; ?></h6>
                                </a>
                            </div>
                        </div>
                        <?php
                        unset($categories[$key]);
                        $index++;
                    endif;
                }
            ?>
        </div>
    </div>
</div>
