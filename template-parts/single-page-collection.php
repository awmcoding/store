<?php //$page = get_page_by_title( 'Collection' ); var_dump($page);?>
<section class="collection-parts">
	<div class="container four">
		<h3 class="heading title-line1"><?php esc_html_e( 'מוצרים תואמים', 'ayuna' ); ?></h3>
		<div class="items-container">
			<?php if(get_field( 'single_page_products', 29 )): ?>
				<?php foreach (get_field( 'single_page_products', 29) as $product): ?>
					<?php
						$pro = new WC_Product($product->ID);
					?>
					<div class="item">
						<?php echo $pro->get_image($size); ?>
						<div class="item-data">
							<div class="name">
								<p><?php echo $product->post_title; ?></p>
							</div>
							<div class="price">
								<p><?php echo $pro->get_price(); ?> <i>₪</i></p>
							</div>
							<a href="?add-to-cart=<?php the_ID(); ?>" data-quantity="1" data-product_id="<?php the_ID(); ?>" data-product_sku="" class="to-cart btn brown product_type_simple add_to_cart_button ajax_add_to_cart"><span>הוסף</span></a>
							<a href="<?php echo get_permalink($product->ID); ?>" class="btn black clickable">לפרטים</a>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>


