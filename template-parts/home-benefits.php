
<section class="benefits">
	<div class="container">
		<h4 class="heading title-line1"><?php esc_html_e( 'היתרונות של AYUNA', 'ayuna' ); ?></h4>
		<?php foreach ( get_field( 'benefit_description' ) as $description ) : ?>
			<p><?php echo esc_html( $description[ 'description_field' ] ); ?></p>
		<?php endforeach; ?>
		<div class="benefits-container">
			<?php foreach ( get_field( 'benefit' ) as $benefit ) : ?>
				<div class="item">
					<div class="img-container"><img src="<?php echo esc_html( $benefit[ 'benefit_image' ] ); ?>" alt=""/></div>
					<p><?php echo esc_html( $benefit[ 'about_benefit' ] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
		<?php foreach ( get_field( 'benefit_button' ) as $button ) : ?>
			<a href="<?php echo esc_html( $button[ 'button_link' ] ); ?>" class="btn brown"><?php echo esc_html( $button[ 'button_text' ] ); ?></a>
		<?php endforeach; ?>

	</div>
</section>