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
			
			<div class="grid">
				<div class="pad">
					<?php the_content(); ?>					
					<?php if (get_the_title($ID) === 'Soggy Brass') : ?>
						<ul>
						<?php

							$args = array('category_name' => 'soggy brass', 'orderby' => 'date');

							foreach ( get_posts( $args ) as $post ) : setup_postdata( $post ); ?>																
									<li class="col-sm-4">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</li>
								
							<?php endforeach; 
							wp_reset_postdata();?>
						</ul>

					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>		
</div>
<?php get_footer(); ?>