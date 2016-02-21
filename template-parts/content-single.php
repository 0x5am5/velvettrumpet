<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="row">
		<div class="col sm-6">
			<?php if (get_field('poster_image')) : ?>
				<div class="poster-large">
	            	<?php if(get_field('booking_now')) : ?><span class="icon booking"></span><?php endif; ?>
            	
            		<img src="<?php echo $image[0]; ?>" alt="<?php echo get_field('poster_image')['title']; ?>"/>
	        	</div>
	        <?php endif; ?>
	        <?php 
	        	if ( has_post_thumbnail() ) :
					the_post_thumbnail();
				endif;  
			?>
        <div class="additional-info">
          <?php if (get_field('performance_dates')) : ?>
            <h2 class="sr-only">Dates of Performance</h2>
            <ol class="bullet-list">
              <?php
                while( has_sub_field('performance_dates') ) { 
                  echo '<li>'.get_sub_field('date').'</li>';
                } 
              ?>
            </ol>
          <?php endif; ?>

          <?php if (get_field('running_time')) { echo '<p>Running time | '.get_field('running_time').' minutes</p>'; } ?>

          <?php if (get_field('next_soggy_brass')) { the_field('next_soggy_brass'); } ?>
          
          <?php if(get_field('add_to_cart')) : ?>
                  
              <?php
                $pageURL = $_SERVER["REQUEST_URI"];
                // $pageURL = $_SERVER['HTTP_HOST'];

                if(count($_GET)>0) {
                  $pageURL .= '&add-to-cart=';
                } else {
                  $pageURL .= '?add-to-cart=';
                }       
                $pageURL .= get_field('add_to_cart'); 
              ?>
                
                <p>
                  <a href="<?php echo $pageURL; ?>" title="Book now" class="button button--buy">Book now!</a>                
                </p>
                  
              <?php endif; ?>
          </div>
		</div>
		<div class="col sm-6">
			<?php if ($page_title != 'Soggy Brass') : ?>
	          <div class="h2"><?php echo $page_title; ?></div>
	        <?php endif; ?>

	        <?php if (get_field('tagline')) : ?>
	          <em class="tagline">'<?php echo get_field('tagline'); ?>'</em>
	        <?php endif; ?>

	        <?php if ($page_title != 'Soggy Brass') : ?>
	          <h2 class="sr-only">Synopsis</h2>        
	        <?php endif; ?>

	        <?php echo the_content(); ?>

	        <?php if (get_field('cast')) : ?>
	          <h2 class="cast">Cast</h2>
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

	        <?php if (get_field('other_info')) : ?>
	        	<div class="other-info">
					<?php echo get_field('other_info'); ?>
	        	</div>
	        <?php endif; ?>

	        <div class="additional-info mobile">
	        	<?php if (get_field('performance_dates')) : ?>
		        	<h2 class="sr-only">Dates of Performance</h2>
		        	<ol class="bullet-list">
		        		<?php
		        		while( has_sub_field('performance_dates') ) { 
		        			echo '<li>'.get_sub_field('date').'</li>';
		        		} 
		        		?>
		        	</ol>
	        	<?php endif; ?>

	        	<?php if (get_field('running_time')) : echo 'Running time | '.get_field('running_time').' minutes'; endif; ?>

	        	<?php if (get_field('next_soggy_brass')) : echo get_field('next_soggy_brass'); endif; ?>
	        </div>

	        <?php if (get_field('reviews')) : ?>
		        <h2 class="sr-only">Reviews</h2>
		        <div class="reviews">
		        	<?php
		        	while( has_sub_field('reviews') ): 
		        		echo '<div><div class="border"></div>'.get_sub_field('rating').' <blockquote cite="'.get_sub_field('source_link').'">"'.get_sub_field('quote').'" - <a href="'.get_sub_field('source_link').'" target="_blank">'.get_sub_field('reviewer').'</a></blockquote></div>';
		        	endwhile; 
		        	?>
		        </div>
	    	<?php endif; ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
