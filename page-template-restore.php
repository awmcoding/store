<?php
/* Template Name: Restore*/
    get_header();

?>

<!--section.about-->
    <?php get_template_part( 'template-parts/restore', 'about' ); ?>
<!--section.about-->

<!--section.projects-->
    <?php get_template_part( 'template-parts/restore', 'projects' ); ?>
<!--section.projects-->

<!--section.process-->
    <?php get_template_part( 'template-parts/restore', 'process' ); ?>
<!--section.process-->

<!--section.callback-->
    <?php get_template_part( 'template-parts/restore', 'callback' ); ?>
<!--section.callback-->

<!--section.response-->
<?php get_template_part( 'template-parts/collection', 'response' ); ?>
<!--section.response-->

<?php get_footer(); ?>
