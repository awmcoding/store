<form role="search" class="search-form" action="<?php echo home_url( '/' ); ?>" method="get">
  <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'הכנס מילת חיפוש', 'ayuna' ); ?>" />
</form>
