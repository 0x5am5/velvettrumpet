<div class="row">

<?php $args = array(
	'sort_order'   => 'desc',
	'child_of'     => get_the_ID(),
	'post_type'    => 'page',
	'post_status'  => 'publish',
	'sort_column'  => 'post_date',
); 

$paged = get_pages($args);

foreach(get_pages($args) as $value) :

	$id = $value->ID;

	if ( get_field('poster_image', $id) ) : 

		$production = get_field('poster_image', $id);
		$booking = get_field('booking_now', $id);
		$guid = $value->post_name;
	?>

<<<<<<< HEAD
		<div class="col-md-4">
=======
		<div class="col-sm-4">
>>>>>>> cf48d2bbf4d16f5e742a9845c5add7d2ccad728a
			<div class="production">
				<a href="<?php echo $guid; ?>">				
					<?php if($booking) : echo '<span class="icon booking"></span>'; endif; ?>
					<span class="shade"></span>
<<<<<<< HEAD
					<img src="<?php echo $production['url']; ?>" alt="<?php echo get_the_title($id).' - '.get_field('production_year', $id) ?>">							
=======
					<img src="<?php echo $production['url']; ?>" alt="<?php echo get_the_title($id).' - '.get_field('production_year', $id) ?>" class="img-responsive">							
>>>>>>> cf48d2bbf4d16f5e742a9845c5add7d2ccad728a
				</a>				
			</div>
		</div>						
		
	<?php endif;
	
endforeach; ?>

</div>