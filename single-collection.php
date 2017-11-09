<?php
get_header();

?>
<!--section.new-line-->
<?php get_template_part( 'template-parts/single', 'collection-new-line' ); ?>
<!--section.new-line-->

<!--section.collection-parts-->
<?php get_template_part( 'template-parts/collection', 'collection-parts' ); ?>
<!--section.collection-parts-->

<!--section.response-->
<?php get_template_part( 'template-parts/collection', 'response' ); ?>
<!--section.response-->

<!--section.callback-->
<?php get_template_part( 'template-parts/home', 'callback' ); ?>
<!--section.callback-->


<?php get_footer(); ?>
