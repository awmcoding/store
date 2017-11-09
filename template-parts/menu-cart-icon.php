<?php global $woocommerce; ?>
<div class="cart">
	<a href="<?php echo wc_get_cart_url(); ?>">
		<?php if ( $woocommerce->cart->cart_contents_count > 0 ) : ?>
			<span class="current-cart-items"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
		<?php endif; ?>
	</a>
</div>
