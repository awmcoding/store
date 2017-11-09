<!--footer-->
<footer>
    <div class="contacts">
        <div class="title">
            <p><?php esc_html_e( 'צור קשר', 'ayuna' ); ?></p>
        </div>
        <div class="adress">
            <p><?php the_field( 'contact_address', 'option' ); ?></p>
        </div>
        <div class="tel"><a href="tel:<?php the_field( 'contact_phone', 'option' ); ?>" class="phone">+ <?php the_field( 'contact_phone', 'option' ); ?></a></div>
        <div class="email"><a href="<?php the_field( 'contact_email', 'option' ); ?>" class="mail"><?php the_field( 'contact_email', 'option' ); ?></a></div>
    </div>

    <div class="social">
        <div class="title">
            <p><?php esc_html_e( 'עיונה ברשתות חברתיות', 'ayuna' ); ?></p>
        </div>
        <div class="links">
            <?php get_template_part( 'template-parts/footer-social', 'networks' ); ?>
        </div>
    </div>

    <div class="subscribe">
        <div class="title">
            <p><?php esc_html_e( 'הצטרפו למועדון', 'ayuna' ); ?></p>
        </div>
        <p><?php esc_html_e( 'רוצים להירשם לניוזלטר שלנו ולהישאר מועדכונים בכל מה שחדש', 'ayuna' ); ?> </p>
        <?php echo do_shortcode(get_field( 'footer_search_form', 'option' )); ?>
        <div class="subscribe_text clearfix">
            <div class="ayuna_logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/developed-by.svg" alt="" /></div>
            <div class="logo_link"><a href="http://ayuna.roi.one/תקנון-אתר/">תקון אתר</a></div>
        </div>
    </div>

</footer>
<!--footer-->

<?php wp_footer(); ?>

<?php if( is_page_template( 'page-template-about-us.php' ) || is_page_template( 'page-template-contact-us.php' ) ) : ?>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYavB_THDEXkwr0KFXcSp-RJ4Ua3sl0uM&amp;callback=initMap" async="async" defer="defer"></script>
  <script>
      map_icon = '<?php echo get_template_directory_uri(); ?>';
  </script>

<?php endif; ?>

</body>
</html>
