<?php
/* Template Name: Contact Us */
    get_header();
?>

<!--section.about-->
<section class="about">
  <div class="container"><img src="<?php the_field( 'contact_hero_image' ); ?>" alt="" class="img-responsive"/>
    <h1 class="heading title-line2"><?php the_title(); ?></h1>
  </div>
</section>
<!--section.about-->

<!--section.contacts-->
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
<section class="contacts">
  <div class="container">
    <div class="heading"><?php the_content(); ?></div>
    <div class="contacts-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/phone-icon.png" alt=""/>
      <p><a href="tel:<?php the_field( 'contact_phone' ); ?>"><?php the_field( 'contact_phone' ); ?></a></p>
    </div>
    <div class="contacts-item"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/location-icon.png" alt=""/>
      <p><?php the_field( 'contact_address' ); ?></p>
    </div>
  </div>
</section>
<?php endwhile; endif; ?>
<!--section.contacts-->

<!--section.callback-->
<?php get_template_part( 'template-parts/home', 'callback' ); ?>
<!--section.callback-->

<!--section.map-->
<section id="map" class="map"></section>
<!--section.map-->

<?php get_footer(); ?>
