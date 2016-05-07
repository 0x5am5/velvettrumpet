
<nav>
	<div class="post-nav">
		<?php 
			$pages = array();
			$query = $query ? $query : get_pages($args);

			foreach ($query as $page) {		
				$pages[] += $page->ID;						
			}

			$current = array_search(get_the_ID(), $pages);
			$prevID = $pages[$current-1];
			$nextID = $pages[$current+1];
		?>

		<div class="row">
			<div class="col-xs-6">
				<?php if (!empty($nextID)) { ?>
					<a href="<?php the_permalink($nextID); ?>" title="<?php the_title($nextID); ?>">« Next</a>
				<?php } else { ?>
					<span>« Next</span>
				<?php } ?>
			</div>
			<div class="col-xs-6">
				<?php if (!empty($prevID)) { ?>			
					<a href="<?php the_permalink($prevID); ?>" title="<?php the_title($prevID); ?>">Previous »</a>
				<?php } else { ?>
					<span>Previous »</span>
				<?php } ?>
			</div>
		</div>
	</div>
</nav>