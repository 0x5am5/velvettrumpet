<h2>Showing now!</h2>
<?php

	$args = array( 
		'post_type' => 'product',
		'posts_per_page' => 10
	);

	$loop = new WP_Query( $args );

	if ($loop) :
		global $product; 

		echo '<ul class="products">';

		while ( $loop->have_posts() ) : $loop->the_post(); 
				echo '<li><a href="'.get_permalink().'">'. woocommerce_get_product_thumbnail(). ' ' . get_the_title() . '</a></li>';
		endwhile; 

		echo '</ul>';

	else :

		echo '<p>Sorry, No shows available right now.</p>';

	endif;

	wp_reset_postdata();
	
?>