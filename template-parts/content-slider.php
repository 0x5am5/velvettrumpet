<?php if( get_field('slider') ): ?>
	<?php 
		$i = 0;
		$images;
		
		if (get_field_object('animate_slider')['value']) :		
			$images = get_field('slider');
			shuffle($images);
		else :
			$images = [get_field('slider')[0]];
		endif; 
	?>
	<div style="display:none;">
		<?php echo get_field_object('animate_slider')['value']; ?>
		<?php var_dump($images); ?>
	</div>
	<ul class="slideshow">
		<?php foreach($images as $value) { ?>
		<?php 
	//  <li>
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