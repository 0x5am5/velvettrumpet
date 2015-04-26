<?php get_header(); ?>

<div class="content">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php if (!is_front_page()) { ?>
			<h1<?php if(get_field('hide_header')) :  echo ' class="access"';  endif; ?>><?php echo get_the_title($ID); ?></h1>
		<?php } else {
			echo '<h1 class="access">Velvet Trumpet</h1>';
		} ?>

		<?php if (is_front_page()) { ?> 

			<ul>
				<li><a href="#">Productions</a></li>
				<li><a href="#">Soggy Brass</a></li>
			</ul>
		<? } ?>

		<?php if (get_the_title() === 'Productions') {
			// check for rows (parent repeater)
			if( get_field('productions') ): ?>
					<ol class="list-inline">
						<?php while( has_sub_field('productions') ): ?>
							<li>
								<a href="<?php the_sub_field('link'); ?>">
									<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php the_sub_field('title'); ?>">
								</a>
							</li>
						<?php endwhile; ?>
					</ol>						
				<?php endif;
		} else {
			 the_content();
		} ?>


		<?php if( get_field('staff_member') ): ?>
			<?php $counter = 0; ?>
			<div class="grid employees">
				<?php while( has_sub_field('staff_member') ): ?>
					<div class="col w-33">
						<div class="inner">
							<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
							<h3>
								<?php the_sub_field('name'); ?><span class="access"> - <?php the_sub_field('role'); ?></span>
							</h3>
							<?php the_sub_field('role'); ?>
						</div>
					</div>
					<?php $counter ++;	?>	
					<?php if ($counter % 3 == 0) { ?>
						</div>	
						<div class="grid">
					<?php } ?>	
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

	<?php endwhile; ?>

</div>
	
<?php get_footer(); ?>
