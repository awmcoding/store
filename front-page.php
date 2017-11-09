<?php get_header(); ?>

<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

<!--section.main-slider-->
    <?php get_template_part( 'template-parts/main', 'sidebar' ); ?>
<!--section.main-slider-->

<!-- Popular Products -->
    <?php get_template_part( 'template-parts/home-popular', 'products' ); ?>
<!-- /Popular Products -->

<!--section.about-->
    <?php get_template_part( 'template-parts/home-about', 'us' ); ?>
<!--section.about-->

<!--section.benefits-->
    <?php get_template_part( 'template-parts/home', 'benefits' ); ?>
<!--section.benefits-->

<!--section.recommendations-->
    <?php get_template_part( 'template-parts/home', 'recommendations' ); ?>
<!--section.recommendations-->

<!--section.response-->
    <?php get_template_part( 'template-parts/collection', 'response' ); ?>
<!--section.response-->

<!--section.callback-->
    <?php get_template_part( 'template-parts/home', 'callback' ); ?>
<!--section.callback-->

    
<?php endwhile; endif; ?>

<?php get_footer(); ?>
