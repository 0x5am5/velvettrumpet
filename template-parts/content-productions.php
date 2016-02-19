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

		<div class="col-sm-4 production">
			<a href="<?php echo $guid; ?>">				
				<?php if($booking) : echo '<span class="icon booking"></span>'; endif; ?>
				<span class="shade"></span>
				<img src="<?php echo $production['url']; ?>" alt="<?php echo get_the_title($id).' - '.get_field('production_year', $id) ?>" class="img-responsive">							
			</a>
		</div>						
		
	<?php endif;
	
endforeach; ?>

</div>