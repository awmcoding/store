
<section class="new-line">
	<div class="section-title">
		<div class="container">
			<h1 class="heading title-line3"><?php esc_html_e( 'הקולקציה החדשה שלנו', 'ayuna' ); ?></h1>
			<div>
				<p><?php the_field( 'new_collection_text' ); ?></p>
			</div>
		</div>
	</div>

	<div class="inner-tabs">
		<div class="container">
			<p><?php esc_html_e( 'מחפשים השראה לחדר ספציפי? בחרו כאן את החללים שתרצו לראות:', 'ayuna' ); ?></p>
			<ul class="tabs-panel test">
				<?php
					$args = array( 'post_type' => 'collection', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
					<li class="switchable"><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></li>
				<?php
					endwhile;
				?>
			</ul>
			<div id="" class="tab">
				<div class="slide">
					<?php
						$args = array( 'post_type' => 'collection', 'posts_per_page' => -1 );
						$loop = new WP_Query( $args );
						if( $loop->have_posts() ) : $loop->the_post();
					?>
						<img src="<?php the_field( 'collection_image'); ?>" alt="" class="img-responsive"/>
					<?php
						endif;
					?>
				</div>
			</div>

		</div>
	</div>

</section>

