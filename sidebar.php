<div class="title">
	<p><?php esc_html_e( 'מבצעים', 'ayuna' ); ?></p>
</div>

<?php

$taxonomy     = 'product_cat';
$orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';
$empty        = 0;

$args = array(
	'taxonomy'     => $taxonomy,
	'orderby'      => $orderby,
	'show_count'   => $show_count,
	'pad_counts'   => $pad_counts,
	'hierarchical' => $hierarchical,
	'title_li'     => $title,
	'hide_empty'   => $empty
);
$all_categories = get_categories( $args );
foreach ($all_categories as $cat) {
	if($cat->category_parent == 0) {
		$category_id = $cat->term_id;
		echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'" class="accardion-head"><span class="accardion-redirect">'. $cat->name .'</span></a>';

		$args2 = array(
			'taxonomy'     => $taxonomy,
			'child_of'     => 0,
			'parent'       => $category_id,
			'orderby'      => $orderby,
			'show_count'   => $show_count,
			'pad_counts'   => $pad_counts,
			'hierarchical' => $hierarchical,
			'title_li'     => $title,
			'hide_empty'   => $empty
		);
		$sub_cats = get_categories( $args2 );
		echo "<ul>";
		if($sub_cats) {
			foreach($sub_cats as $sub_category) {
				echo  "<li><a class='accordion-child' href='".get_term_link( $sub_category )."'>".$sub_category->name."</a></li>" ;
			}
		}
		echo "</ul>";

	}
}
?>

<div class="store-search">
	<p>מחפשים משהו ספציפי?</p>
	<div class="search-field">

		<form role="search" action="<?php echo home_url( '/' ); ?>" method="get">
			<input type="text" name="s" id="s" value="<?php the_search_query(); ?>" placeholder="<?php esc_attr_e( 'חיפוש...', 'ayuna' ); ?>" />
		</form>


	</div>
</div>






