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

elseif (get_field('slider')) :
	$i = 0;
	$images = get_field('slider');
	shuffle($images);
?>
	<ul class="slideshow">
		<?php foreach($images as $value) { ?>
		<?php 
			if ($i == 0) { 
				echo '<li class="show">'; 
			} else { 
				echo '<li>'; 
			} 
			$image = $value['image'];
			$alt;
			if ($image['alt']) {
				$alt = $image['alt'];
			} else {
				$alt = $image['title'];
			}
		?>	
			<?php if ($value['video_link'] && $value['video']) : ?>
				<iframe src="https://www.youtube.com/embed/<?php echo $value['video_link']; ?>" frameborder="0" width="100%" height="415"></iframe>
			<?php else :  ?>
				<?php $link = $value['page_link']; ?>
				<?php if ($link) : echo '<a href="'.$link.'">'; endif; ?>						
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $alt; ?>">
				<?php if ($link) : echo '</a>'; endif; ?>
			<?php endif; ?>
		</li>	
		<?php $i++; ?>
		<?php } ?>			
	</ul>
<?php endif; ?>