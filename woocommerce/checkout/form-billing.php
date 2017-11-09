<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/** @global WC_Checkout $checkout */

if(isset($_POST['newsletter'])){
	exit("aaa");
}

?>

	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<h3><?php _e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

	<?php else : ?>

		<div class="title"><?php _e( 'Billing Details', 'woocommerce' ); ?></div>

	<?php endif; ?>

<div class="checkout-form">
	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>




	<?php
	$mybillingfields=array(
		"billing_first_name",
		"billing_last_name",
//		"billing_company",
		"billing_email",
		"billing_phone",
//		"billing_state",
//		"billing_country",
		"billing_address_1",
		"billing_postcode",
		"billing_city",
		"billing_comment",

	);
	foreach ($mybillingfields as $key) :

		?>
		<?php woocommerce_form_field( $key, $checkout->checkout_fields['billing'][$key], $checkout->get_value( $key ) ); ?>
	<?php endforeach; ?>



	<?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>
	
	<p class="form-row form-row-wide create-account">
		<input class="input-checkbox" id="newsletter" <?php checked( ( true === $checkout->get_value( 'newsletter' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', true ) ) ), true) ?> type="checkbox" name="newsletter" value="1" /> <label for="newsletter" class="checkbox"><?php _e( 'מאשר/ת קבלת עדכונים וחומר פרסומי', 'woocommerce' ); ?></label>
	</p>

	<?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>

	<?php if ( $checkout->enable_guest_checkout ) : ?>

		<p class="form-row form-row-wide create-account">
			<input class="input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true) ?> type="checkbox" name="createaccount" value="1" /> <label for="createaccount" class="checkbox"><?php _e( 'Create an account?', 'woocommerce' ); ?></label>
		</p>

	<?php endif; ?>


	<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

	<?php if ( ! empty( $checkout->checkout_fields['account'] ) ) : ?>

		<div class="create-account">

			<p><?php _e( 'Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'woocommerce' ); ?></p>

			<?php foreach ( $checkout->checkout_fields['account'] as $key => $field ) : ?>

				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

			<?php endforeach; ?>

			<div class="clear"></div>

		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

<?php endif; ?>


</div>


