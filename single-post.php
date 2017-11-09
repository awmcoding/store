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
          <div class="photo">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail(); ?>
            </a>
          </div>
          <div class="article-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </div>
          <div class="article-date"><?php the_time( 'd.m.Y' ); ?></div>
          <div class="description">
            <?php the_content(); ?>
          </div>
          <div class="article-panel">
            <div class="share">
              <ul>
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Facebook" class="fb-share"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/home?status=<?php the_permalink(); ?>" title="Twitter" class="tw-share"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Google+" class="g-share"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div>
        </article>
      <?php endwhile; endif; ?>

    </div>
  </div>
</section>
<!-- /Blog Posts -->



<?php get_footer(); ?>
