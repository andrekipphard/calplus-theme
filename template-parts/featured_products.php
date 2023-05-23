<?php $featured_products = array();?>
<?php if(is_Shop()):?>
    <?php
        $args = array(
            'limit' => 3,
            'status' => 'publish',
            'meta_query'     => array(
                array(
                    'key'     => 'featured',
                    'value'   => 'Ja',
                    'compare' => '=',
                ),
            ),
            'return' => 'ids',
        );
        $product_ids = wc_get_products( $args );
    ?>

<?php else:?>
    <?php
        $current_category = get_queried_object();
        $category_slug = $current_category->slug;
        $args = array(
            'limit' => 3,
            'status' => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $category_slug,
                ),
            ),
            'meta_query'     => array(
                'relation' => 'AND', // Add a relation parameter to enforce AND logic
                array(
                    'key'     => 'featured',
                    'value'   => 'Ja',
                    'compare' => '=',
                ),
            ),
            'return' => 'ids',
        );
        $product_ids = wc_get_products( $args );
    ?>
<?php endif;?>
<?php 
    foreach($product_ids as $product_id){
        $product = wc_get_product( $product_id );
        $featured_products[] = $product;
    }
?>
<?php if($featured_products):?>
    <div class="border border-dark rounded mt-4 p-4 mb-4">
        <div class="row featured-products">
            <?php $index=0;
                while(!empty($featured_products[$index])):
                    $product_title = $featured_products[$index]->get_title();
                    $product_permalink = $featured_products[$index]->get_permalink();
                    $product_cats = $featured_products[$index]->get_categories();
                    $product_short_desc = $featured_products[$index]->get_short_description();
                ?>
            <div class="col-12 col-lg-4 mb-4 mb-lg-0">
                <div class="p-4 h-100 shadow rounded d-flex flex-column position-relative">
                    <?php 
                        if( $featured_products[$index]->is_on_sale() ) {
                            echo '<div class="onsale-badge p-3"><img src="/wp-content/uploads/2023/05/Bildschirm­foto-2023-05-04-um-15.21.24.png" alt="..."></div>';
                        }
                    ?>
                    <a href="<?= $product_permalink; ?>"><img src="<?php echo wp_get_attachment_url( $featured_products[$index]->get_image_id(), 'large' ); ?>" class="img-fluid" alt="..."></a>
                    <h3 class="text-uppercase mt-5 mb-5"><?= $product_title;?></h3>
                    <h4 class="mb-3"><?= $product_cats; ?></h4>
                    <p class="mb-5 text-black-50"><?= $product_short_desc;?></p>
                    <a href="<?= $product_permalink; ?>" class="align-self-center"><button class="btn btn-secondary text-uppercase" type="button">Detailansicht</button></a>
                </div>
            </div>
            <?php $index++;?>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;?>
   