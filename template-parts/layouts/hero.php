<?php if(have_rows('slide')):?>
    <div class="bg-primary py-5">
        <div class="container hero pb-5">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <?php while(have_rows('slide')): the_row();?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= get_row_index()-1;?>" <?php if(get_row_index()==1):?>class="active"<?php endif;?> aria-current="true" aria-label="Slide <?= get_row_index();?>"></button>
                    <?php endwhile;?>
                </div>
                <div class="carousel-inner">
                    <?php while(have_rows('slide')): the_row();
                        $image = get_sub_field('image');?>
                        <div class="carousel-item<?php if(get_row_index()==1):?> active<?php endif;?>">
                            <img src="<?= wp_get_attachment_image_url($image, 'full');?>" class="d-block w-100" alt="...">
                        </div>
                    <?php endwhile;?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
<?php endif;?>
