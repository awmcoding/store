<nav class="main-nav">
	<ul>
		<?php wp_nav_menu( [
			'menu_id'        => 'right-menu',
			'container'      => false,
			'depth'          => 1,
			'theme_location' => 'right-menu',
			'items_wrap' 		 => '%3$s'
		] ); ?>
		<li class="logo"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt=""/></a></li>
		<?php wp_nav_menu( [
			'menu_id'        => 'left-menu',
			'container'      => false,
			'depth'          => 1,
			'theme_location' => 'left-menu',
			'items_wrap' 		 => '%3$s'
		] ); ?>
	</ul>
</nav>
