<?php
/*
Template Name: 2 col
*/

$parents = get_post_ancestors( $post->ID );
?>
<?php get_header(); ?>

<div class="wrapper">
<div class="content">

	<?php while ( have_posts() ) : the_post(); ?>

	<h1<?php if(get_field('hide_header')) :  echo ' class="access"';  endif; ?>><?php echo get_the_title($ID); ?></h1>
			
		<div class="grid<?php if (get_the_title($ID) == 'Soggy Brass') echo ' soggy-brass'; ?>">
			<div class="col w-50<?php if (get_the_title($ID) == 'Soggy Brass') echo ' left-col'; ?>">
				<div class="pad">
				<?php if (get_field('poster_image')) : ?>
					<div class="poster-large">
						<img src="<?php echo get_field('poster_image')['url']; ?>" alt="<?php echo get_field('poster_image')['title']; ?>" width="350" height="495" />
					</div>
				<?php endif; ?>
				<?php if (get_field('performance_dates')) : ?>
					<h2 class="access">Dates of Performance</h2>
					<ol class="bullet-list">
					<?php
						while( has_sub_field('performance_dates') ): 
							echo '<li>'.get_sub_field('date').'</li>';
						endwhile; 
					?>
					</ol>
				<?php endif; ?>
				<?php if (get_field('running_time')) :
					echo 'Running time | '.get_field('running_time').' minutes';
				endif; ?>
				<?php if (get_field('next_soggy_brass')) :
					echo get_field('next_soggy_brass');
				endif; ?>
				</div>
			</div>
			<div class="col w-50<?php if (apply_filters("the_title", get_the_title(end($parents))) === 'Productions') echo ' production'; if (get_the_title($ID) == 'Soggy Brass') echo ' right-col'; ?>">
				<?php if (get_the_title($ID) != 'Soggy Brass') { ?>
					<div class="h2"><?php echo get_the_title($ID); ?></div>
				<?php } ?>
				<?php if (get_field('tagline')) : ?>
					<em class="tagline">'<?php echo get_field('tagline'); ?>'</em>
				<?php endif; ?>
				<?php if (get_field('synopsis')) : ?>
					<h2 class="access">Synopsis</h2>
					<?php echo get_field('synopsis'); ?>
				<?php endif; ?>
				<?php if (get_field('cast')) : ?>
					<h2 class="cast">CAST</h2>
					<ul class="main-cast">
					<?php
						while( has_sub_field('cast') ): 
							echo '<li>'.get_sub_field('name').'</li>';
						endwhile; 
					?>
					</ul>
				<?php endif; ?>
				<?php if (get_field('additional_crew')) : ?>
					<ul>
					<?php
						 while( has_sub_field('additional_crew') ): 
							 echo '<li>'.get_sub_field('role').' '.get_sub_field('name').'</li>';
						 endwhile; 
					?>
					</ul>
				<?php endif; ?>
				<?php echo the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
</div>
</div>
<?php get_footer(); ?>