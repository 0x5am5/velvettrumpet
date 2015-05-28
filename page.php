<?php get_header(); ?>

<div class="wrapper<?php if (get_the_title() === 'Productions') echo ' production-list'; ?>">
	<div class="content">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php if (!is_front_page()) { ?>
			<h1<?php if(get_field('hide_header')) :  echo ' class="access"';  endif; ?>><?php echo get_the_title($ID); ?></h1>
		<?php } else {
			echo '<h1 class="access">Velvet Trumpet</h1>';
		} ?>

		<?php if( get_field('mission_statement') ): ?>
			<h2>Mission Statement</h2>
			<div class="mission-statement">
				<?php the_field('mission_statement'); ?>
			</div>
		<?php endif; ?>


		<?php if( get_field('staff_member') ): ?>
			<?php $counter = 0; ?>
			<h2>The Velvet Trumpeteers</h2>
			<div class="grid employees">
				<?php while( has_sub_field('staff_member') ): ?>
					<div class="col w-33">
						<div class="inner">
							<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>">
							<h3>
								<?php the_sub_field('name'); ?><span class="access"> - <?php the_sub_field('role'); ?></span>
							</h3>
							<span aria-hidden="true"><?php the_sub_field('role'); ?></span>
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

		<?php if (get_the_title() === 'Productions') {
			// check for rows (parent repeater)
			if( get_field('productions') ): ?>
				<div class="grid">
					<?php //for ($b = count(get_field('productions')); $b > 1; $b--; ) { 
						for ($b = count(get_field('productions'))-1; $b >= 0; $b--) { 
							$row = get_field('productions')[$b];
							$image = $row['image'];
							?>

							<div class="col w-33 production">
								<?php if ($row['link']!='') { ?>
									<a href="<?php echo $row['link']; ?>">
									<?php if($row['booking']) { ?>
										<span class="icon booking"></span>
									<?php } ?>
									<span class="shade"></span>
								<?php } ?>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $row['title']; ?>">
							<?php if ($row['link']!='') { ?></a><?php } ?>
							</div>
							<?php if ($b%3 == 3) echo "</div><div class='grid'>"; ?>
					<?php }?>
				</div>
			<?php endif;
		} else {
			 the_content();
		} ?>

		

	<?php endwhile; ?>
</div>
</div>
	
<?php get_footer(); ?>