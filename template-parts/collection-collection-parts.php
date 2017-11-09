<section class="collection-parts">
	<div class="container four">
		<div class="heading title-line1">
			<div class="subtitle top"><?php esc_html_e( 'לצפיה במפרט המלא', 'ayuna' ); ?></div>
			<div class="items-container">
				<?php if(get_field( 'product_collections')): ?>
					<?php foreach (get_field( 'product_collections') as $product): ?>
						<?php $pro = new WC_Product($product->ID); ?>
						<div class="item"><img src="<?php echo $pro->get_image($size); ?>" alt=""/>
							<div class="item-data">
								<div class="name">
									<p><?php echo $product->post_title; ?></p>
								</div>
								<div class="price">
									<p><?php echo $pro->get_price(); ?> <i>₪</i></p>
								</div>
								<a href="?add-to-cart=<?php echo $product->ID; ?>" data-quantity="1" data-product_id="<?php echo $product->ID; ?>" data-product_sku="" class="to-cart btn brown product_type_simple add_to_cart_button ajax_add_to_cart"><span><?php esc_html_e( 'הוסף', 'ayuna' ); ?></span></a>
								<a href="<?php echo get_permalink($product->ID); ?>" class="btn black clickable"><?php esc_html_e( 'לצפייה במפרט המלא', 'ayuna' ); ?></a>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			<div class="subtitle bottom"><?php esc_html_e( 'סגור מפרט המלא', 'ayuna' ); ?></div>
		</div>
	</div>
</section>


