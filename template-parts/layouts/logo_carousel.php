<?php if(have_rows('logo')):?>
<div class="row me-0">
    <div class="col">
        <div class="swiper mySwiper py-4 py-lg-5">
            <div class="swiper-wrapper">
                <?php while(have_rows('logo')): the_row();
                    $logo = get_sub_field('logo');?>
                    <div class="swiper-slide shadow rounded py-5 px-4 p-lg-5"><img src="<?= wp_get_attachment_image_url($logo, 'full');?>" class="img-fluid" alt="..."></div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>