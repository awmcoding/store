<?php get_header(); ?>

<!-- Blog Header -->
<section class="about">
  <div class="container"><img src="<?php the_field( 'blog_hero_image', get_option( 'page_for_posts' ) ); ?>" alt="<?php echo get_the_title( get_option( 'page_for_posts' ) ); ?>" class="img-responsive"/>
    <h1 class="heading title-line2"><?php echo get_the_title( get_option( 'page_for_posts' ) ); ?></h1>
  </div>
</section>
<!-- /Blog Header -->

<!-- Blog Posts -->
<section class="blog">
  <div class="container">

    <!-- Sidebar -->
    <?php get_sidebar( 'blog' ); ?>
    <!-- /Sidebar -->

    <div class="blog-container">

      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <article>
          <div class="blog-page clearfix">
            <div class="photo">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium'); ?>
              </a>
            </div>
            <div class="about-article">
              <div class="article-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </div>
              <div class="article-date"><?php the_time( 'd.m.Y' ); ?></div>
              <div class="description">
                <?php the_excerpt(); ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'המשך לקרוא', 'ayuna' ); ?></a>
            </div>
          </div>
        </article>
      <?php endwhile; endif; ?>

      <div class="pagination">
        <div class="container">
          <?php previous_posts_link( __( 'לעמוד הקודם', 'ayuna' ) ); ?>
          <?php next_posts_link( __( 'לעמוד הבא', 'ayuna' ) ); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Blog Posts -->

<!--section.tips-->
<?php get_template_part( 'template-parts/home', 'tips' ); ?>
<!--section.tips-->

<?php get_footer(); ?>
