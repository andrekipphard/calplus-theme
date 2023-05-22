<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 *
 * @var bool   $readonly If the input should be set to readonly mode.
 * @var string $type     The input type attribute.
 */

defined( 'ABSPATH' ) || exit;

/* translators: %s: Quantity. */
$label = ! empty( $args['product_name'] ) ? sprintf( esc_html__( '%s quantity', 'woocommerce' ), wp_strip_all_tags( $args['product_name'] ) ) : esc_html__( 'Quantity', 'woocommerce' );

?>
<div class="quantity h-100 d-flex flex-row align-items-center">
	<?php
	/**
	 * Hook to output something before the quantity input field.
	 *
	 * @since 7.2.0
	 */
	do_action( 'woocommerce_before_quantity_input_field' );
	?>
    <span class="me-3">Stückzahl: </span>
	<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
    <input type="button" class="minus me-1 h-100 border-black border rounded bg-white" value="-">
	<input
		type="<?php echo esc_attr( $type ); ?>"
		<?php echo $readonly ? 'readonly="readonly"' : ''; ?>
		id="<?php echo esc_attr( $input_id ); ?>"
		class="border-black border rounded h-100 me-1 <?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
		name="<?php echo esc_attr( $input_name ); ?>"
		value="<?php echo esc_attr( $input_value ); ?>"
		title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ); ?>"
		size="4"
		min="<?php echo esc_attr( $min_value ); ?>"
		max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
		<?php if ( ! $readonly ) : ?>
			step="<?php echo esc_attr( $step ); ?>"
			placeholder="<?php echo esc_attr( $placeholder ); ?>"
			inputmode="<?php echo esc_attr( $inputmode ); ?>"
			autocomplete="<?php echo esc_attr( isset( $autocomplete ) ? $autocomplete : 'on' ); ?>"
		<?php endif; ?>
	/>
    <input type="button" class="h-100 border-black border rounded plus me-3 bg-white" value="+">
	<?php
	/**
	 * Hook to output something after quantity input field
	 *
	 * @since 3.6.0
	 */
	do_action( 'woocommerce_after_quantity_input_field' );
	?>
</div>
<script>
    (function($) {
  $(document).on('click', '.plus, .minus', function() {
    // Get the quantity input field and its current value
    var $quantityInput = $(this).siblings('.qty');
    var currentValue = parseFloat($quantityInput.val());

    // Get the step value (if defined)
    var step = parseFloat($quantityInput.attr('step'));
    if (isNaN(step)) {
      step = 1; // Default step value
    }

    // Increment or decrement the quantity based on the clicked button
    if ($(this).hasClass('plus')) {
      $quantityInput.val(currentValue + step);
    } else {
      if (currentValue > step) {
        $quantityInput.val(currentValue - step);
      }
    }

    // Trigger a change event on the quantity input field
    $quantityInput.trigger('change');
  });
})(jQuery);

    </script>
<?php
