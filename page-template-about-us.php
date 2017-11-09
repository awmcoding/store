<?php
/* Template Name: About Us */
    get_header();
?>

<!--section.about-->
<section class="about">
    <div class="container"><img src="<?php the_field( 'about_us_image' ); ?>" alt="" class="img-responsive"/>
        <h1 class="heading title-line2"><?php the_field( 'aboutus_title' ); ?></h1>
        <?php foreach ( get_field( 'about_us_info' ) as $aboutus ) : ?>
            <div class="subtitle">
                <p><?php echo esc_html( $aboutus[ 'about_subtitle' ] ); ?></p>
            </div>
            <p><?php echo esc_html( $aboutus[ 'about_text' ] ); ?></p>
        <?php endforeach; ?>

    </div>
</section><!--section.about-->
<!--section.more-about-->
<section class="more-about">
    <div class="container">
        <h2 class="heading title-line1"><?php esc_html_e( 'עוד קצת עלינו', 'ayuna' ); ?></h2>
        <div class="more-container">
            <?php foreach ( get_field( 'more_info' ) as $more_info ) : ?>
                <div class="item">
                    <div class="photo"><img src="<?php echo esc_html( $more_info[ 'image' ] ); ?>" alt="" class="img-responsive"/></div>
                    <div class="data">
                        <div class="subtitle">
                            <p><?php echo esc_html( $more_info[ 'subtitle' ] ); ?></p>
                        </div>
                        <p><?php echo $more_info[ 'text' ]; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--section.more-about-->

<!--section.callback-->
<?php get_template_part( 'template-parts/home', 'callback' ); ?>
<!--section.callback-->

<!--section.map-->
<section id="map" class="map"></section>
<!--section.map-->

<?php get_footer(); ?>
