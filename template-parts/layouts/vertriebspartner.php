<?php if(have_rows('vertriebspartner')):
    $headline = get_sub_field('headline');?>
    <div class="container py-5">
        <div class="row py-5">
            <div class="col text-center">
                <h2 class="pb-3 pb-lg-5 text-uppercase"><?= $headline; ?>Unsere Vertriebspartner</h2>
                <div class="row">
                    <?php while(have_rows('vertriebspartner')): the_row();
                        $image = get_sub_field('image');
                        $logo = get_sub_field('logo');?>
                        <div class="col-12 col-lg-6">
                            <div class="<?php if((get_row_index()%2)==1):?>pe-lg-5 pb-5 pb-lg-0 <?php else:?>ps-lg-5<?php endif;?>">
                                <img src="<?= wp_get_attachment_image_url($image, 'full');?>" class="img-fluid" alt="...">
                                <div class="row d-flex justify-content-center vertriebspartner-row">
                                    <div class="col-10 col-lg-7">
                                        <div class="tagline bg-blue text-white text-uppercase p-2 text-center mx-5">
                                            <h3>Premium Vertriebspartner</h3>
                                        </div>
                                        <div class="p-5 shadow bg-white">
                                            <img src="<?= wp_get_attachment_image_url($logo, 'full');?>" class="img-fluid" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>
        
        
    </div>
<?php endif; ?>