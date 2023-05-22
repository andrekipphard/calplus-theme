<?php if ( have_rows( 'floating_contact_button', 'options' ) ) : ?>
	<?php while ( have_rows( 'floating_contact_button', 'options' ) ) :
		the_row(); 
        $floating_contact_button_text = get_sub_field( 'floating_contact_button_text', 'options' );
        $floating_contact_button_url = get_sub_field( 'floating_contact_button_url', 'options' );
    ?>
        <a href="<?= $floating_contact_button_url; ?>" class="floating-button">
            <button class="btn btn-secondary text-uppercase" type="button"><i class="bi bi-telephone-fill me-3"></i><?= $floating_contact_button_text; ?></button>
        </a>
    <?php endwhile; ?>
<?php endif; ?> 
