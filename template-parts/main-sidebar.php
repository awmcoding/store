
<section class="main-slider">
	<div class="container">
		<?php foreach ( get_field( 'slide' ) as $slide ) : ?>
			<div class="slide">
				<h1 class="slide-title"><?php echo esc_html( $slide[ 'slide_title' ] ); ?></h1>
				<div class="slide-info">
					<p><?php echo esc_html( $slide[ 'slide_info' ] ); ?></p>
				</div>

				<?php foreach ( $slide[ 'slide_button' ] as $button ) : ?>
					<a href="<?php echo esc_html( $button[ 'button_link' ] ); ?>" class="btn white"><?php echo esc_html( $button[ 'button_text' ] ); ?></a>
				<?php endforeach; ?>

				<img src="<?php echo esc_html( $slide[ 'slide_image' ] ); ?>" alt="" class="img-responsive"/>
				<div class="slide-label">
					<div class="title">
						<p><?php echo esc_html( $slide[ 'label_title' ] ); ?></p>
					</div>
					<div class="price">
						<p><?php echo esc_html( $slide[ 'label_price' ] ); ?> <i>₪</i></p>
					</div>

					<?php foreach ( $slide[ 'label_button' ] as $label_btn ) : ?>
						<a href="<?php echo esc_html( $label_btn[ 'label_button_link' ] ); ?>" class="btn brown"><?php echo esc_html( $label_btn[ 'label_button_text' ] ); ?></a>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
</section>
