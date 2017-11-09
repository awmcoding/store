
<section class="about">
	<div class="container">
		<h3 class="heading title-line2"><?php esc_html_e( 'אודות', 'ayuna' ); ?></h3>
		<img src="<?php the_field( 'about_image' ); ?>" alt=""/>

		<?php foreach ( get_field( 'abot_information' ) as $information ) : ?>
			<div class="subtitle">
				<p><?php echo esc_html( $information[ 'about_subtitle' ] ); ?></p>
			</div>
			<p><?php echo esc_html( $information[ 'about_description' ] ); ?></p>
		<?php endforeach; ?>

		<?php foreach ( get_field( 'about_button' ) as $button ) : ?>
			<a href="<?php echo esc_html( $button[ 'about_link' ] ); ?>" class="btn brown"><?php echo esc_html( $button[ 'about_label' ] ); ?></a>
		<?php endforeach; ?>
	</div>
</section>

