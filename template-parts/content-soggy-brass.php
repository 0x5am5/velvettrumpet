<?php if( get_field('soggy_image') ):
	$image = get_field('soggy_image');
	echo '<img src="'.$image['url'].'" class="soggy-image no-shadow" alt="Soggy Brass">';
endif; ?>

<div class="soggybrass">
	<div class="soggy-info">
		<?php the_field('information'); ?>
	</div>

	<div class="grid">
		<div class="col w-50">
			<div class="pad">
				<h2>What is Soggy Brass?</h2>
				<?php the_field('soggy_what'); ?>							
			</div>
		</div>
		<div class="col w-50">
			<div class="pad">
				<h2>How can I take part?</h2>
				<?php the_field('soggy_how'); ?>												
			</div>
		</div>
	</div>				
</div>