<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
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
 * @version 2.4.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>

<div class="product-details">
	<?php if ( ! empty( get_field( 'general_description' ) ) ) : ?>
		<div class="type">
			<p><?php esc_html_e( 'תיאור כללי', 'ayuna' ); ?></p>
		</div>
		<div class="info">
			<p><?php the_field('general_description');?></p>
		</div>
	<?php endif; ?>

	<?php if ( ! empty( get_field( 'more_info' ) ) ) : ?>
		<div class="type">
			<p><?php esc_html_e( 'מידע נוסף', 'ayuna' ); ?></p>
		</div>
		<div class="info">
			<p><?php the_field('more_info');?></p>
		</div>
	<?php endif; ?>

	<?php if ( ! empty( get_field( 'materials' ) ) ) : ?>
		<div class="type">
			<p><?php esc_html_e( 'חומרים', 'ayuna' ); ?></p>
		</div>
		<div class="info">
			<p><?php the_field('materials');?></p>
		</div>
	<?php endif; ?>

	<?php if ( ! empty( get_field( 'instructions' ) ) ) : ?>
		<div class="type">
			<p><?php esc_html_e( 'הוראות טיפול', 'ayuna' ); ?></p>
		</div>
		<div class="info">
			<p><?php the_field('instructions');?></p>
		</div>
	<?php endif; ?>
	</div>




	<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

		<p class="full-price"><b>סה”כ:</b><span><?php echo $product->get_price(); ?> <?php esc_html_e( 'ש”ח', 'ayuna' ); ?></span></p>

		<meta itemprop="price" content="<?php echo esc_attr( $product->get_display_price() ); ?>" />
		<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
		<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

	</div>






