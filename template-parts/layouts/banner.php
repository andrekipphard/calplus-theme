<?php
    $headline = get_sub_field('headline');
    $text = get_sub_field('text');
    $button_text = get_sub_field('button_text');
    $button_url = get_sub_field('button_url');
?>
<div class="container">
    <div class="p-5 bg-dark rounded shadow">
        <div class="row">
            <div class="col-4 text-white text-uppercase d-flex align-items-center">
                <h2 class="mb-0"><?= $headline; ?></h2>
            </div>
            <div class="col-5 text-white d-flex align-items-center">
                <?= $text; ?>
            </div>
            <div class="col-3 d-flex align-items-center justify-content-end">
                <a href="<?= $button_url; ?>" class="align-self-center"><button class="btn btn-secondary text-uppercase" type="button"><?= $button_text; ?></button></a>
            </div>
        </div>
       
    </div>
</div>