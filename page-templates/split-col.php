<?php
/*
Template Name: Split col
*/

$parents = get_post_ancestors( $post->ID );

?>
<?php get_header(); ?>

<div class="wrapper">
  	<div class="container">

	<?php while ( have_posts() ) : the_post(); ?>

		<h1<?php if(get_field('hide_header')) :  echo ' class="sr-only"';  endif; ?>><?php the_title($ID); ?></h1>

		<?php 
			if (has_post_thumbnail()) :
              echo get_the_post_thumbnail($ID, 'full', array('class'=>'soggy-image no-shadow img-responsive featured-img'));
			elseif( get_field('banner') ) :
				$image = get_field('banner');
				echo '<img src="'.$image['url'].'" class="soggy-image no-shadow img-responsive featured-img" alt="Soggy Brass">';
			endif; 
		?>

		<div class="soggybrass">
			<?php if (get_field('information')) : ?>
				<div class="soggy-info">
					<?php the_field('information'); ?>
				</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-sm-6 text-justify">
					<?php the_field('soggy_what'); ?>							
				</div>
				<div class="col-sm-6 text-justify">
					<?php the_field('soggy_how'); ?>												
				</div>
			</div>	
			
			<?php the_content(); ?>					
			
			<?php if (get_the_title($ID) === 'Soggy Brass') : ?>
				<?php get_template_part( 'template-parts/content', 'soggybrass-archive' ); ?>
			<?php endif; ?>
		</div>
		<?php endwhile; ?>
	</div>		
</div>
<?php get_footer(); ?>