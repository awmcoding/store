<section class="popular">
	<div class="container four">
		<h2 class="heading title-line1"><?php esc_html_e( 'המוצרים הפופולריים', 'ayuna' ); ?></h2>
		<div class="popular-items">
			<?php
				$populars = get_field( 'popular_products' );

				foreach ( $populars as $popular ) :
					$product = new WC_Product($popular->ID);
			?>
					<div class="item"><?php echo get_the_post_thumbnail( $popular->ID, 'medium'); ?>
						<div class="item-data">
							<div class="name">
								<p><?php echo $popular->post_title; ?></p>
							</div>
							<div class="price">
								<p><?php echo $product->get_price();?> <i>&#8362;</i></p>
							</div>

							<a href="?add-to-cart=<?php echo $popular->ID; ?>" data-quantity="1" data-product_id="<?php echo $popular->ID; ?>" data-product_sku="" class="to-cart btn brown product_type_simple add_to_cart_button ajax_add_to_cart"><span><?php esc_html_e( 'הוסף', 'ayuna' ); ?></span></a>
							<a href="<?php echo get_permalink($popular->ID); ?>" class="btn black clickable"><?php esc_html_e( 'לפרטים', 'ayuna' ); ?></a>
						</div>
					</div>
			<?php
				endforeach;
			?>
		</div>
	</div>
</section>




