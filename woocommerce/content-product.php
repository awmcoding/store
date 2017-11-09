<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;


// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="item" <?php post_class(); ?>>
	<?php
//	do_action( 'woocommerce_before_shop_loop_item' );
	do_action( 'woocommerce_before_shop_loop_item_title' );
	?>
	<div class="item-data">
		  <div class="name">
			<p><?php the_title(); ?></p>
		  </div>
		  <div class="price">
			<p><?php echo $product->get_price(); ?> <i>₪</i></p>
		  </div>
			<a href="?add-to-cart=<?php the_ID(); ?>" data-quantity="1" data-product_id="<?php the_ID(); ?>" data-product_sku="" class="to-cart btn brown product_type_simple add_to_cart_button ajax_add_to_cart"><span>הוסף</span></a>
			<a href="<?php the_permalink(); ?>" class="btn black clickable">לפרטים</a>
	</div>

</div>






