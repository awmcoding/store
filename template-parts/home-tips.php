
<section class="tips">
	<div class="container">
		<h6 class="heading title-line1"><?php esc_html_e( 'טיפים לעיצוב הבית וחידוש רהיטים', 'ayuna' ); ?></h6>
		<div class="tips-container">
			<?php
			$recent = new WP_Query( [
				'post_type' => 'post',
				'posts_per_page' => 3,
				'post_status' => 'publish',
			] );

			if( $recent->have_posts() ) : while( $recent->have_posts() ) : $recent->the_post(); ?>
				<div class="tip">
					<div class="data">
						<div class="name">
							<p><?php the_title(); ?></p>
						</div>
						<div class="date">
							<p><?php the_time( 'd.m.Y' ); ?>
							</p>
						</div>
						<div class="info">
							<?php the_excerpt(); ?>
						</div><a href="<?php the_permalink(); ?>"><?php esc_html_e( 'קרא עוד', 'ayuna' ); ?></a>
					</div>
					<div class="photo"><img src="<?php the_post_thumbnail_url( 'ayuna_blog_footer' ); ?>" alt="<?php the_title(); ?>" class="img-responsive"/></div>
				</div>
			<?php endwhile; endif; wp_reset_postdata(); ?>

		</div>
	</div>
</section>
