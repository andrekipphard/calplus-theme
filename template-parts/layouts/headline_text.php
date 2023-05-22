<?php
    $headline = get_sub_field('headline');
    $col_layout = get_sub_field('col_layout');
?>
<div class="container py-5">
    <div class="row py-5">
        <div class="col">
            <h2><?= $headline; ?></h2>
            <?php if($col_layout == 'Eine Spalte'):?>
                <?php $text = get_sub_field('text'); ?>
                <p><?= $text;?></p>
            <?php endif;?>
            <?php if($col_layout == 'Zwei Spalten'):
                $text_left = get_sub_field('text_left'); 
                $text_right = get_sub_field('text_right');?>
                <div class="row">
                    <div class="col-6">
                        <p><?= $text_left;?></p>
                    </div>
                    <div class="col-6">
                        <p><?= $text_right;?></p>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>