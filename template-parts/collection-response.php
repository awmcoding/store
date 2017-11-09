<section class="response">
	<div class="container">
		<h3 class="heading title-line3"><?php esc_html_e( 'לקוחות ממליצים', 'ayuna' ); ?></h3>
		<div class="subtitle">
			<p><?php esc_html_e( 'הלקוחות שלנו אוהבים לפרגן בהמלצות חמות', 'ayuna' ); ?></p>
		</div>
		<div class="response-slider">
			<div data-slick="{&quot;slidesToShow&quot;: 1}" class="slides">
				<?php foreach ( get_field( 'responses', 'option' ) as $response ) : ?>
					<div class="slider-item">
						<div class="avatar"><img src="<?php echo esc_html( $response[ 'image' ] ); ?>" alt=""/></div>
						<div class="data">
							<div class="title">
								<p><?php echo esc_html( $response[ 'title' ] ); ?></p>
							</div>
							<div class="author">
								<p><?php echo esc_html( $response[ 'author' ] ); ?></p>
							</div>
							<div class="content">
								<p><?php echo esc_html( $response[ 'content' ] ); ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="response-slider-nav">
				<div class="left-arr"></div>
				<div class="right-arr"></div>
			</div>
		</div>
	</div>
</section>