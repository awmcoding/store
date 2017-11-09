
<?php
	$collections = get_field( 'inspiration_collections', 29 );
?>
<section class="inspiration">
	<div class="section-title">
		<div class="container">
			<h2 class="heading title-line3"><?php the_field('inspiration_title', 29);?></h2>
			<div>
				<p><?php the_field('inspiration_info', 29);?></p>
			</div>
		</div>
	</div>

	<div class="container">
		<ul class="tabs-panel">
			<?php foreach ($collections as $collection): ?>
				<li><a href="#tab-<?php echo $collection->ID; ?>"><?php echo $collection->post_title; ?></a></li>
			<?php endforeach; ?>
		</ul>

		<?php foreach ($collections as $collection): ?>
			<div id="tab-<?php echo $collection->ID; ?>" class="tab">
				<?php foreach (get_field('collection_gallery', $collection->ID) as $gallery): ?>
					<div class="photo">
						<a href="<?php echo get_permalink($collection->ID); ?>"><img src="<?php echo $gallery['sizes']['large']; ?>" alt="" class="img-responsive"/></a>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
</section>


