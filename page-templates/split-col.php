<?php
/*
Template Name: Split col
*/

$parents = get_post_ancestors( $post->ID );

?>
<?php get_header(); ?>

<div class="wrapper">
  	<div class="content">

	<?php while ( have_posts() ) : the_post(); ?>

		<h1<?php if(get_field('hide_header')) :  echo ' class="access"';  endif; ?>><?php echo get_the_title($ID); ?></h1>

		<?php if( get_field('banner') ) :
			$image = get_field('banner');
			echo '<img src="'.$image['url'].'" class="soggy-image no-shadow" alt="Soggy Brass">';
		endif; ?>

		<div class="soggybrass">
			<div class="soggy-info">
				<?php the_field('information'); ?>
			</div>

			<div class="grid">
				<div class="col w-50">
					<div class="pad alpha">
						<?php the_field('soggy_what'); ?>							
					</div>
				</div>
				<div class="col w-50">
					<div class="pad omega">
						<?php the_field('soggy_how'); ?>												
					</div>
				</div>
			</div>				
		</div>
		<?php endwhile; ?>
	</div>		
</div>
<?php get_footer(); ?>