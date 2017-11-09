<?php
/**
 * ACF Pro
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( [
		'page_title'  => __( 'Theme Options', 'ayuna' ),
		'menu_title'  => __( 'Theme Options', 'ayuna' ),
		'menu_slug'   => 'theme-options',
		'parent_slug' => 'themes.php'
	] );

}