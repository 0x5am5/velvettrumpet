<?php 
	// $args = array(
	// 	'sort_order' => 'asc',
	// 	'sort_column' => 'post_date',
	// 	'child_of' => $parents[0],
	// 	'post_type' => 'page',
	// 	'post_status' => 'publish'
	// ); 
	$pages = array();
?>

<nav>
	<div class="post-nav">
		<?php 
			foreach (get_posts($args) as $page) {		

				$pages[] += $page->ID;

				// $year = get_field("production_year", $id);				
				//$url = get_field('poster_image', $id)['url'];

				// echo '<img src="'.$url.'" alt="'.get_the_title($id).' - '.$year.'">';							
			}

			$current = array_search(get_the_ID(), $pages);
			$prevID = $pages[$current-1];
			$nextID = $pages[$current+1];
		?>

		<div class="row">
			<div class="col-xs-6">
				<?php if (!empty($nextID)) { ?>
					<a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>">« Next</a>
				<?php } else { ?>
					<span>« Next</span>
				<?php } ?>
			</div>
			<div class="col-xs-6">
				<?php if (!empty($prevID)) { ?>			
					<a href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>">Previous »</a>
				<?php } else { ?>
					<span>Previous »</span>
				<?php } ?>
			</div>
		</div>
	</div>
</nav>