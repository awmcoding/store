<section class="about">
	<div class="container"><img src="<?php the_field( 'restore_image' ); ?>" alt="" class="img-responsive"/>
		<h1 class="heading title-line2"><?php the_field( 'restore_title' ); ?></h1>
		<div class="info">
			<?php foreach ( get_field( 'restore_info' ) as $info ) : ?>
				<p><?php echo esc_html( $info[ 'text' ] ); ?></p>
			<?php endforeach; ?>
		</div>
		<ul class="store-nav">
			<?php foreach ( get_field( 'restore_buttons' ) as $button ) : ?>
				<li><a href="<?php echo esc_html( $button[ 'link' ] ); ?>"><?php echo esc_html( $button[ 'label' ] ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>