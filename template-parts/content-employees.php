<h2>The Velvet Trumpeteers</h2>
<div class="row employees">
	<?php while( has_sub_field('staff_member') ): ?>
		<div class="col-sm-4">
			<?php if (the_sub_field('image')) : ?>
				<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
			<?php endif; ?>
			<div class="h3">
				<?php the_sub_field('name'); ?>					
			</div>
			<span class="sr-only"> - <?php the_sub_field('role'); ?></span>
			<?php the_sub_field('role'); ?>
		</div>
	<?php endwhile; ?>
</div>