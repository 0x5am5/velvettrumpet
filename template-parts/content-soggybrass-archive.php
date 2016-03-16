<div class="soggy-brass-archive">
	<h2>Archive</h2>
	<div class="row">
		<ul class="list-unstyled">
			<?php
			$args = array('category_name' => 'soggy brass', 'orderby' => 'date', 'posts_per_page' => 10);
			foreach (get_posts($args) as $post) : setup_postdata( $post ); ?>
			<li class="col-sm-3 col-xs-6 text-center">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail('thumbnail', array('class'=>'img-responsive')); ?>
					<?php 											
					if(get_field('sb_number')) : 
						echo get_field('sb_number').' | ';
					endif; 

					echo get_the_date('F \'y');
					?>
				</a>
			</li>
		<?php endforeach; 
		wp_reset_postdata();?>
	</ul>							
</div>
</div>