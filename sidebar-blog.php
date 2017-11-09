<aside class="blog-nav">
  <div class="search-container">
    <form role="search" class="search-form" action="<?php echo home_url( '/' ); ?>" method="get">
      <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'הכנס מילת חיפוש', 'ayuna' ); ?>" required />
      <input type="submit" value="<?php esc_attr_e( 'חפש', 'ayuna' ); ?>"/>
    </form>
  </div>
  <div class="categories">
    <div class="title"><?php esc_html_e( 'קטגוריות', 'ayuna' ); ?></div>
    <nav>
      <ul>
        <?php $cats = get_categories(); ?>
        <?php foreach( $cats as $cat ) : ?>
          <li><a href="<?php echo get_category_link( $cat->term_id ); ?>"><?php echo $cat->name; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
  <div class="published">
    <div class="title"><?php esc_html_e( 'פורסם לאחרונה', 'ayuna' ); ?></div>

    <?php $recent = new WP_Query( [
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 5,
    ] ); ?>

    <?php if( $recent->have_posts() ) : while( $recent->have_posts() ) : $recent->the_post(); ?>
      <a href="<?php the_permalink(); ?>" class="published-article">
        <span class="article-img">
          <img src="<?php the_post_thumbnail_url( 'ayuna_blog_sidebar' ); ?>" alt="<?php the_title(); ?>" class="img-responsive"/>
        </span>
        <span class="article-data">
          <span class="name"><?php the_title(); ?></span>
          <span class="publish-date"><?php the_time( 'd.m.Y' ); ?></span>
        </span>
      </a>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</aside>
