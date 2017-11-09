<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>


	<?php

		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>


<!--section.product-->
<section class="product">
	<div class="container">
<!--		--><?php //wc_get_template_part( 'content', 'single-product' ); ?>

		<div class="product-data">
			<?php do_action( 'woocommerce_single_product_summary' ); ?>

			<div class="share">
				<a a href="whatsapp://send?text=<?php the_title(); ?> <?php the_permalink(); ?>" data-action="share/whatsapp/share" title="WhatsApp"><?php esc_html_e( 'WhatsApp', 'ayuna' ); ?></a>
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Facebook"><?php esc_html_e( 'Facebook', 'ayuna' ); ?></a>
			</div>
			<div class="product-callback">
				<p><?php esc_html_e( 'רוצים לברר פרטים נוספים לגבי פריט זה?', 'ayuna' ); ?></p><a href="<?php the_field('contact_us_link', 'option'); ?>"><?php esc_html_e( 'צרו איתנו קשר בלחיצה כאן', 'ayuna' ); ?></a>
			</div>
		</div>
		<div class="product-photos">

			<?php do_action( 'woocommerce_before_single_product_summary' ); ?>


		</div>

	</div>
</section>
<!--section.product-->

		<?php endwhile; // end of the loop. ?>

<!--section.callback-->
	<?php get_template_part( 'template-parts/single-product', 'callback' ); ?>
<!--section.callback-->

<!--section.collection-parts-->
	<?php get_template_part( 'template-parts/single-page', 'collection' ); ?>
<!--section.collection-parts-->

<!--section.response-->
	<?php get_template_part( 'template-parts/collection', 'response' ); ?>
<!--section.response-->

	<?php

		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
//		do_action( 'woocommerce_sidebar' );
	?>



<?php get_footer( 'shop' ); ?>
