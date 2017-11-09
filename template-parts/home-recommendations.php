<?php
$collections = get_field( 'collections' );
?>
<section class="recommendations">
	<div class="container">
		<h5 class="heading title-line3"><?php esc_html_e( 'המלצות לסידור חללים', 'ayuna' ); ?></h5>
		<ul class="tabs-panel">
			<?php if($collections) :?>
				<?php foreach ( $collections as $collection ) : ?>
					<li><a href="#tabs-<?php echo $collection->ID; ?>"><?php echo $collection->post_title; ?></a></li>
				<?php endforeach; ?>
			<?php endif;?>
		</ul>

		<?php foreach ( $collections as $collection ) : ?>
			<div id="tabs-<?php echo $collection->ID; ?>" class="tab">
				<div id="slider1" class="tab-slides">
					<?php if(get_field('collection_gallery', $collection->ID)) :?>
						<?php foreach ( get_field('collection_gallery', $collection->ID) as $gallery ) : ?>
							<div class="slide">
								<img src="<?php echo $gallery['sizes']['large']; ?>" alt="" class="img-responsive"/>
<!--								<div class="data">-->
<!--									<div class="name">-->
<!--										<p>--><?php //the_field( 'collection_name', $collection->ID); ?><!--</p>-->
<!--									</div>-->
<!--									<div class="info">-->
<!--										<p>--><?php //the_field( 'collection_info', $collection->ID); ?><!--</p>-->
<!--									</div><a href="--><?php //the_permalink( $collection->ID ); ?><!--" class="btn white">--><?php //esc_html_e( 'המשך לרכישה', 'ayuna' ); ?><!--</a>-->
<!--								</div>-->
							</div>
						<?php endforeach; ?>
					<?php endif;?>
				</div>

				<?php foreach ( get_field( 'recommendation_button' ) as $button ) : ?>
					<a href="<?php echo esc_html( $button[ 'link' ] ); ?>" class="btn brown"><?php echo esc_html( $button[ 'label' ] ); ?></a>
				<?php endforeach; ?>

			</div>
		<?php endforeach; ?>
	</div>
</section>
