<header>
	<div class="container clearfix">
		<div class="main-panel clearfix">
			<?php get_template_part( 'template-parts/menu-cart', 'icon' ); ?>
		</div>
		<div class="search-panel">
			<a href="#"><?php esc_html_e( 'חפש', 'ayuna' ); ?></a>
			<?php get_search_form(); ?>
		</div>
		<div class="mobile-toggle">
			<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/burger.png" alt="<?php esc_attr_e( 'פתח תפריט', 'ayuna' ); ?>" /></a>
		</div>
		<?php get_template_part( 'template-parts/main', 'navigation' ); ?>
	</div>
</header>
