<?php
/**
 * FUNCTIONS
 */
include_once( 'inc/plugins/gravity-forms.php' );
include_once( 'inc/plugins/woocommerce.php' );
include_once( 'inc/plugins/acf-pro.php' );


// Basic theme setup
add_action( 'after_setup_theme', 'ayuna_theme_setup' );

function ayuna_theme_setup() {

    # Setup theme text domain.
    load_theme_textdomain( 'ayuna', get_template_directory_uri() . '/languages' );

    # Handle <title> tag using wp_title.
    add_theme_support( 'title-tag' );

    # Enable dynamic menus.
    add_theme_support( 'menus' );

    # Enable post thumbnails.
    add_theme_support( 'post-thumbnails' );

    # HTML5 support.
    add_theme_support( 'html5', [ 'gallery', 'caption' ] );

    # Register menus.
    register_nav_menus( [
        'right-menu'   => __( 'תפריט מימין', 'ayuna' ),
        'left-menu'   => __( 'בתפריט השמאלי', 'ayuna' ),
        'footer-menu' => __( 'תפריט פוטר', 'ayuna' )
    ] );

    # WooCommerce Integration
    add_theme_support( 'woocommerce' );

    # Add Blog Images Sizes
    add_image_size( 'ayuna_blog_sidebar', 70, 70, true );
    add_image_size( 'ayuna_blog_footer', 390, 270, true );

    # Remove unnecessary abilities.
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rest_output_link_wp_head' );

}


// Register theme assets
add_action( 'wp_enqueue_scripts', 'ayuna_register_assets' );

function ayuna_register_assets() {

    # CSS
    wp_enqueue_style( 'gfonts-assistant', 'https://fonts.googleapis.com/css?family=Assistant:300,400,600&amp;amp;subset=hebrew' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css' );
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );
    wp_enqueue_style( 'theme-css', get_stylesheet_uri(), [ 'gfonts-assistant', 'font-awesome', 'normalize', 'slick' ] );


    # JavaScript

    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.1.1.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/assets/js/scripts.js', [
        'jquery',
        'slick',
        'jquery-ui',
        'fancybox'
    ], false, true );


}

// Remove Emojis
add_action( 'init', 'ayuna_remove_emojis' );

function ayuna_remove_emojis() {

    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'wp_resource_hints', 'ayuna_remove_emojis_dns_prefetch', 10, 2 );

}


function ayuna_remove_emojis_dns_prefetch( $urls, $relation_type ) {

    if ( 'dns-prefetch' == $relation_type ) {

        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
        $urls          = array_diff( $urls, array( $emoji_svg_url ) );

    }

    return $urls;

}


// Hide admin bar
add_filter( 'show_admin_bar', '__return_false' );



add_filter ( 'yith_wcan_use_wp_the_query_object', '__return_true');


function wpb_widgets_init() {
    register_sidebar( array(
        'name' =>__( 'Right Sidebar', 'wpb'),
        'id' => 'custom-side-bar',
        'before_widget' => '<div class="widget-content">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wpb_widgets_init' );
