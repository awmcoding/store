<section class="projects" id="projects">
	<div class="container six">
		<h2 class="heading title-line1"><?php esc_html_e( 'צפו בפרוייקטים שלנו', 'ayuna' ); ?></h2>
		<div class="restore-container">
			<?php foreach ( get_field( 'restored_projects' ) as $project ) : ?>
				<div class="item"><img src="<?php echo esc_html( $project[ 'project_image' ] ); ?>" alt=""/>
					<div class="project-data">
						<div class="name">
							<p><?php echo esc_html( $project[ 'project_name' ] ); ?></p>
						</div><a href="<?php echo esc_html( $project[ 'project_image' ] ); ?>" class="project-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/zoom.png" alt=""/></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
