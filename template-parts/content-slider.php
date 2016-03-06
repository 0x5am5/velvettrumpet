<?php 
if (has_post_thumbnail()) :
	
	$link = get_post_custom( $post->ID )['featured_image_link'][0];

	if ( $link ) :
    	echo '<a href="'.$link.'">';		
	endif;

	echo get_the_post_thumbnail();

	if ( $link ) :
    	echo '</a>';		
	endif;
elseif( get_field('slider') ): ?>
	<?php 
		$i = 0;
		$indicator = 0;
		$images = get_field('slider');
		shuffle($images);		
	?>
	<div class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php foreach($images as $value) { ?>
	    		<li data-target="#image-slider" data-slide-to="<?php echo $indicator ?>"></li>
	    		<?php $indicator++; ?>
			<?php } ?>
		  </ol>
		<?php endif; ?>
		<div class="carousel-inner" role="listbox">		
			<?php foreach($images as $value) {

				$image = $value['image'];
				$alt;
				if ($image['alt']) :
					$alt = $image['alt'];
				else :
					$alt = $image['title'];
				endif;

				if ($i == 0) echo '<div class="item active">';
				else echo '<div class="item">';
				
				if ($value['video_link'] && $value['video']) : ?>
					<iframe src="https://www.youtube.com/embed/<?php echo $value['video_link']; ?>" frameborder="0" width="100%" height="415"></iframe>
				<?php 
				else :
					$link = $value['page_link'];
					if ($link) : echo '<a href="'.$link.'">'; endif;
				?>				
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $alt; ?>">
				<?php 
					if ($link) : echo '</a>'; endif;
				endif;
				?>	
				</div>
				<?php $i++; ?>
			<?php } ?>	
		</div>	
		<a class="left carousel-control" href="#image-slider" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#image-slider" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>	
	</div>
<?php endif; ?>