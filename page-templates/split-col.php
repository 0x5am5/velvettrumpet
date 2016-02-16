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
			<?php if (get_field('information')) : ?>
				<div class="soggy-info">
					<?php the_field('information'); ?>
				</div>
			<?php endif; ?>

			<div class="row">
				<div class="col-md-4">
						<?php the_field('soggy_what'); ?>							
				</div>
				<div class="col-md-4">
						<?php the_field('soggy_how'); ?>												
				</div>
			</div>	
			
			<div class="row">
					<?php the_content(); ?>					
					<?php if (get_the_title($ID) === 'Soggy Brass') : ?>
						<ul style="display: none;">
						<?php

							$args = array('category' => 'soggy brass', 'orderby' => 'date');

							foreach ( get_posts( $args ) as $post ) : setup_postdata( $post ); ?>
								<?php $year = the_date( 'Y'); ?>
								<?php $prevYear; ?>
								<?php if ($year > $prevYear) echo '</ul>'.$year.'<ul>'; ?>
									<li>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</li>
								<?php $prevYear = $year; ?>
							<?php endforeach; 
							wp_reset_postdata();?>
						</ul>

					<?php endif; ?>
			</div>
		</div>
		<?php endwhile; ?>
	</div>		
</div>
<?php get_footer(); ?>