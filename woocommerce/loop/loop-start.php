<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

$page_id = wc_get_page_id('shop');
?>

<!--section.about-->
<section class="about">
    <div class="container"><img src="<?php the_field('shop_banner', $page_id);?>" alt="" class="img-responsive"/>
        <h1 class="heading title-line2"><?php the_field('banner_title', $page_id);?></h1>
        <ul class="store-nav">
            <?php foreach ( get_field('banner_links', $page_id) as $link ) : ?>
                <li><a href="<?php echo esc_html( $link[ 'link' ] ); ?>"><?php echo esc_html( $link[ 'label' ] ); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<!--section.about-->

<!--section.store-->
<section class="store" id="store">
    <div class="container four">
        <h2 class="heading title-line1"><?php esc_html_e( 'המוצרים שלנו', 'ayuna' ); ?></h2>
        <p class="subtitle"><?php esc_html_e( 'בכל תקופה אנחנו מייצרים ליין חדש של מוצרים במהדורה מוגבלת', 'ayuna' ); ?></p>
            <div class="store-container">
                <aside>
                    <?php get_sidebar(); ?>
                </aside>
                    <article>
                            <?php $result = woocommerce_catalog_ordering();?>
                        <div class="items-container">
