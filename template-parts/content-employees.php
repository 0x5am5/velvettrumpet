<?php $i = 0; ?>
<h2>The Velvet Trumpeteers</h2>
<div class="grid employees">
	<?php while( has_sub_field('staff_member') ): ?>
		<div class="col <?php if ($i < 3 ) echo 'w-33'; else echo 'w-50'; ?>">
			<div class="inner">
				<?php if (the_sub_field('image')) : ?>
					<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
				<?php endif; ?>
				<h3>
					<?php the_sub_field('name'); ?><span class="access"> - <?php the_sub_field('role'); ?></span>
				</h3>
				<span><?php the_sub_field('role'); ?></span>
			</div>
		</div>
	<?php $i++; ?>
	<?php endwhile; ?>
</div>