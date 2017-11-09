<section class="process" id="restore_process">
	<div class="container">
		<h3 class="heading title-line1"><?php the_field( 'renovation_title' ); ?></h3>
		<div class="info">
			<p><?php the_field( 'renovation_info' ); ?></p>
		</div>
		<div class="process-container">
			<?php foreach ( get_field( 'renovation_steps' ) as $step ) : ?>
				<div class="item">
					<div class="step">
						<p><i><?php echo esc_html( $step[ 'step_number' ] ); ?></i></p>
					</div>
					<div class="name">
						<p><?php echo esc_html( $step[ 'step_name' ] ); ?></p>
					</div>
					<div class="description">
						<p><?php echo esc_html( $step[ 'step_description' ] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
