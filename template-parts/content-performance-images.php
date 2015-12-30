<?php if ( get_field('performance_images') && $_GET['dev'] ) : ?>
  <?php $i = 0; ?>
  <div class="performance-images">
   <div class="grid">
  	<?php while( has_sub_field('performance_images') ): ?>
  		<?php $i++; ?>
  		<div class="col w-25"><a href="<?php echo get_sub_field('image')['url']; ?>" data-lightbox="images"><img src="<?php echo get_sub_field('image')['sizes']['thumbnail']; ?>" alt="image-<?php echo $i; ?>"/><span class="shade"></span></a></div>
  		<?php if ($i % 4 == 0)  echo '</div><div class="grid">'; ?>
  	<?php endwhile; ?>
   </div>
  </div>
<?php endif; ?>