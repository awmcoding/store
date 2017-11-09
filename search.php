<?php get_header(); ?>

<!--section.search-->
<section class="search">
    <div class="container four">
        <h2 class="heading title-line1 text-center"><?php echo esc_html( sprintf( __( 'תוצאות חיפוש עבור "%s"', 'ayuna' ), get_search_query() ) ); ?></h2>
        <div class="items-container">

            <?php if( have_posts() ) : ?>

            <?php while( have_posts() ) : the_post(); global $product; ?>

              <div class="item">
                  <?php the_post_thumbnail(); ?>
                  <div class="item-data">
                      <div class="name">
                        <p><?php echo $post->post_title; ?></p>
                      </div>
                      <div class="price">
                          <p><?php echo $product->get_price(); ?> <i>₪</i></p>
                      </div>
                      <a href="?add-to-cart=<?php the_ID(); ?>" data-quantity="1" data-product_id="<?php the_ID(); ?>" data-product_sku="<?php echo $product->get_sku(); ?>" class="to-cart btn brown product_type_simple add_to_cart_button ajax_add_to_cart"><span><?php esc_html_e( 'הוסף', 'ayuna' ); ?></span></a>
                      <a href="<?php the_permalink(); ?>" class="btn black clickable"><?php esc_html_e( 'לצפייה במפרט המלא', 'ayuna' ); ?></a>
                  </div>
              </div>

            <?php endwhile; ?>

            <?php else: ?>

              <p class="no-results"><?php esc_html_e( 'לא נמצאו נכסים התואמים לקריטריוני החיפוש שלך.', 'ayuna' ); ?></p>

            <?php endif; ?>

        </div>
    </div>
</section>
<!--section.search-->


<?php get_footer(); ?>
