<?php
    // Initialize an empty array to store the products
    $sale_products = array();

    // Get all products on sale
    $product_ids = wc_get_product_ids_on_sale();

    // Loop through the products on sale
    foreach ( $product_ids as $product_id ) {
        // Get the product object
        $product = wc_get_product( $product_id );

        // Check if the product is a variation
        if ( $product->is_type( 'variation' ) ) {
            // Get the parent product object
            $parent_product = wc_get_product( $product->get_parent_id() );

            // Check if the parent product is on sale
            if ( $parent_product->is_on_sale() ) {
            // Add the parent product to the array
            $sale_products[] = $parent_product;
            }
        } else {
            // Add the product to the array
            $sale_products[] = $product;
        }
    }
    $index =0;
?>
<div class="container py-4 py-lg-5 neues-und-angebote">
    <div class="row py-4 py-lg-5">
        <div class="col-12 text-center">
            <h2 class="pb-3 pb-lg-5 text-uppercase">Neues und Angebote</h2>
        </div>
        <div class="col-12">
            <div class="row">
                <?php while($index<3 && !empty($sale_products[$index])):
                    $product_title = $sale_products[$index]->get_title();
                    $product_permalink = $sale_products[$index]->get_permalink();
                    $product_cats = $sale_products[$index]->get_categories();
                    $product_short_desc = $sale_products[$index]->get_short_description();
                    ?>
                <div class="col-12 col-lg-3 mb-5 mb-lg-0">
                    <div class="p-4 h-100 shadow rounded d-flex flex-column position-relative">
                        <?php 
                            if( $sale_products[$index]->is_on_sale() ) {
                                echo '<div class="onsale-badge p-3"><img src="/wp-content/uploads/2023/05/Bildschirm­foto-2023-05-04-um-15.21.24.png" alt="..."></div>';
                            }
                        ?>
                        <a href="<?= $product_permalink; ?>"><img src="<?php echo wp_get_attachment_url( $sale_products[$index]->get_image_id(), 'large' ); ?>" class="img-fluid" alt="..."></a>
                        <h3 class="text-uppercase mt-5 mb-5"><?= $product_title;?></h3>
                        <h4 class="mb-3"><?= $product_cats; ?></h4>
                        <p class="mb-5 text-black-50"><?= $product_short_desc;?></p>
                        <a href="<?= $product_permalink; ?>" class="align-self-center"><button class="btn btn-secondary text-uppercase" type="button">Detailansicht</button></a>
                    </div>
                </div>
                <?php $index++;?>
                <?php endwhile; ?>
                <div class="col-12 col-lg-3">
                    <div class="p-4 h-100 shadow rounded d-flex flex-column">
                        <a href="/angebote/"><img src="/wp-content/uploads/2023/05/Bildschirm­foto-2023-05-04-um-15.21.24.png" class="img-fluid" alt="..."></a>
                        <h3 class="text-uppercase mt-5 mb-5">Alle Angebote</h3>
                        <h4 class="mb-3">In allen Kategorien</h4>
                        <p class="mb-5 text-black-50">Entdecken Sie jetzt unsere Neuerscheinungen und Angebote unseres gesamten Sortiments.</p>
                        <a href="/angebote/" class="align-self-center"><button class="btn btn-secondary text-uppercase" type="button">Angebote ansehen</button></a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>