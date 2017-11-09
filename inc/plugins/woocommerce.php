<?php
/**
 * WooCommerce
 */
// Remove WooCommerce functions.
add_filter( 'woocommerce_show_page_title', '__return_false' );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_before_main_content', 'remove_sidebar' );

function remove_sidebar() {
    if ( is_shop() || is_product_category()) {
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
}

function remove_woocommerce_breadcrumbs() {
    if (is_shop() || is_product() || is_product_category()) {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    }
}

add_action( 'wp_head', 'remove_woocommerce_breadcrumbs' );

// custum pagination
function custom_paginate_links( $args = '' ) {
    global $wp_query, $wp_rewrite;

    // Setting up default values based on the current URL.
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );

    // Get max pages and current page out of the current query, if available.
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

    // Append the format placeholder to the base URL.
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

    // URL base depends on permalink settings.
    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

    $defaults = array(
        'base' => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format' => $format, // ?page=%#% : %#% is replaced by the page number
        'total' => $total,
        'current' => $current,
        'show_all' => false,
        'prev_next' => true,
        'prev_text' => __('&laquo; Previous'),
        'next_text' => __('Next &raquo;'),
        'end_size' => 1,
        'mid_size' => 2,
        'type' => 'plain',
        'add_args' => array(), // array of query args to add
        'add_fragment' => '',
        'before_page_number' => '',
        'after_page_number' => ''
    );

    $args = wp_parse_args( $args, $defaults );

    if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
    }

    // Merge additional query vars found in the original URL into 'add_args' array.
    if ( isset( $url_parts[1] ) ) {
        // Find the format argument.
        $format = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
        $format_query = isset( $format[1] ) ? $format[1] : '';
        wp_parse_str( $format_query, $format_args );

        // Find the query args of the requested URL.
        wp_parse_str( $url_parts[1], $url_query_args );

        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        foreach ( $format_args as $format_arg => $format_arg_value ) {
            unset( $url_query_args[ $format_arg ] );
        }

        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
    }

    // Who knows what else people pass in $args
    $total = (int) $args['total'];
    if ( $total < 2 ) {
        return;
    }
    $current  = (int) $args['current'];
    $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
    if ( $end_size < 1 ) {
        $end_size = 1;
    }
    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
        $mid_size = 2;
    }
    $add_args = $args['add_args'];
    $r = '';
    $page_links = array();
    $dots = false;

    if ( $args['prev_next'] && $current && 1 < $current ) :
        $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current - 1, $link );
        if ( $add_args )
            $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];

        /**
         * Filters the paginated links for the given archive pages.
         *
         * @since 3.0.0
         *
         * @param string $link The paginated link URL.
         */
        $page_links[] = '<a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
    endif;
    for ( $n = 1; $n <= $total; $n++ ) :
        if ( $n == $current ) :
            $page_links[] = "<span class='page-numbers current'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span>";
            $dots = true;
        else :
            if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $n, $link );
                if ( $add_args )
                    $link = add_query_arg( $add_args, $link );
                $link .= $args['add_fragment'];

                /** This filter is documented in wp-includes/general-template.php */
                $page_links[] = "<a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a>";
                $dots = true;
            elseif ( $dots && ! $args['show_all'] ) :
                $page_links[] = '<span class="page-numbers dots">' . __( '&hellip;' ) . '</span>';
                $dots = false;
            endif;
        endif;
    endfor;
    if ( $args['prev_next'] && $current && $current < $total ) :
        $link = str_replace( '%_%', $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current + 1, $link );
        if ( $add_args )
            $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];

        /** This filter is documented in wp-includes/general-template.php */
        $page_links[] = '<a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
    endif;
    switch ( $args['type'] ) {
        case 'array' :
            return $page_links;

        case 'list' :
            $r .= "<ul class='page-numbers'>\n\t<li>";
            $r .= join("</li>\n\t<li>", $page_links);
            $r .= "</li>\n</ul>\n";
            break;

        case 'custum':
            $next_prev = "<div class=\"pagination clearfix\"><ul class=\"next-prev\">";
            $num_links = "<ul class=\"pager\">";

            foreach ($page_links as $p){
                if (strpos($p, 'prev') !== false || strpos($p, 'next') !== false) $next_prev .= "<li>$p</li>";
                else $num_links .= "<li>$p</li>";
            }

            $next_prev .= "</ul>";
            $num_links .= "</ul></div>";

            $r = $next_prev.$num_links;
            break;

        default :
            $r = join("\n", $page_links);
            break;


    }
    return $r;
}

/**
 * Cart icon AJAX
 */
 add_filter( 'add_to_cart_fragments', 'ayuna_woocommerce_update_cart_icon' );

 function ayuna_woocommerce_update_cart_icon( $fragments ) {

 	global $woocommerce;

 	ob_start();

 	get_template_part( 'template-parts/menu-cart', 'icon' );

 	$fragments[ 'div.cart' ] = ob_get_clean();

 	return $fragments;

 }

function use_theme_variable_template($template, $template_name, $template_path) {

    if (strpos($template_name, 'variable.php')) {
        $template = get_template_directory().'/woocommerce/single-product/add-to-cart/variable.php';
    }
    return $template;
}

add_filter('woocommerce_locate_template', 'use_theme_variable_template', 20, 3);


add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );



add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    return $fields;
}


// save the extra field when checkout is processed
function save_newsletter_fields( $order_id ){
    if ( ! empty( $_POST['newsletter'] ) ) {
        update_post_meta( $order_id, '_newsletter', sanitize_text_field( $_POST['newsletter'] ) );
    }

}
add_action( 'woocommerce_checkout_update_order_meta', 'save_newsletter_fields' );


add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_newsletter_field_display_admin_order_meta' );

function my_custom_newsletter_field_display_admin_order_meta($order){
    $news = (get_post_meta( $order->id, '_newsletter', true )) ? "Yes" : "No";
    echo '<p><strong>Newsletter:</strong> ' . $news . '</p>';
}


add_filter( 'woocommerce_checkout_fields' , 'custom_comment_field' );

function custom_comment_field( $fields ) {
    $fields['billing']['billing_comment'] = array(
        'type'      => 'textarea',
        'label'     => __('הערות'),
        'required'  => true,
        'class'     => array('form-row-wide'),
        'clear'     => true,
    );

    return $fields;
}

add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_comment_field_display_admin_order_meta' );

function my_custom_comment_field_display_admin_order_meta($order){
    $comments = (get_post_meta( $order->id, '_billing_comment', true ));
    echo '<p><strong>Comment:</strong> ' . $comments . '</p>';
}





