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
            <img src="<?php echo get_field('poster_image')['url']; ?>" alt="<?php echo get_field('poster_image')['title']; ?>" />
          </div>
        <?php endif; ?>
<?php if (get_field('poster_image_soggy')) : ?>
          <div class="poster-large">
            <img src="<?php echo get_field('poster_image_soggy')['url']; ?>" alt="<?php echo get_field('poster_image_soggy')['title']; ?>" />
          </div>
        <?php endif; ?>
        <div class="additional-info">
        <?php if (get_field('performance_dates')) { ?>
          <h2 class="access">Dates of Performance</h2>
          <ol class="bullet-list">
            <?php
              while( has_sub_field('performance_dates') ) { 
                echo '<li>'.get_sub_field('date').'</li>';
              } 
            ?>
          </ol>
          <?php if($_GET['dev']=='true') {  } ?>
        <?php } ?>

          <?php if (get_field('running_time')) { echo 'Running time | '.get_field('running_time').' minutes'; } ?>

          <?php if (get_field('next_soggy_brass')) { echo get_field('next_soggy_brass'); }?>
          <?php 
            if(get_field('add_to_cart') && $_GET['dev']) { 
              $pageURL = $_SERVER["REQUEST_URI"];

              if(count($_GET)>0) {
                $pageURL .= '&add-to-cart=';
              } else {
                $pageURL .= '?add-to-cart=';
              }       
              $pageURL .= get_field('add_to_cart');           
          ?>
              <a href="<?php echo $pageURL; ?>" title="Add to cart" class="button"> Add to cart</a>
              
          <?php } ?>
          </div>
          
        </div>
      </div>
      <div class="col w-50<?php if (apply_filters("the_title", get_the_title(end($parents))) === 'Productions') echo ' production'; if (get_the_title($ID) == 'Soggy Brass') echo ' right-col'; ?>">
        <?php if (get_the_title($ID) != 'Soggy Brass') { ?>
          <div class="h2"><?php echo get_the_title($ID); ?></div>
        <?php } ?>
        <?php if (get_field('tagline')) : ?>
          <em class="tagline">'<?php echo get_field('tagline'); ?>'</em>
        <?php endif; ?>
        <?php if (get_the_title($ID) != 'Soggy Brass') { ?>
          <h2 class="access">Synopsis</h2>        
        <?php } ?>
        <?php echo the_content(); ?>
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
        <?php if (get_field('other_info')) { ?>
          <div class="other-info">
          <?php echo get_field('other_info'); ?>
          </div>
        <?php } ?>
      
        </div>
      </div>

      <div class="additional-info mobile">
      <?php if (get_field('performance_dates')) { ?>
        <h2 class="access">Dates of Performance</h2>
        <ol class="bullet-list">
        <?php
          while( has_sub_field('performance_dates') ) { 
            echo '<li>'.get_sub_field('date').'</li>';
          } 
        ?>
        </ol>
      <?php } ?>

      <?php if (get_field('running_time')) { echo 'Running time | '.get_field('running_time').' minutes'; } ?>

      <?php if (get_field('next_soggy_brass')) { echo get_field('next_soggy_brass'); }?>
      
      </div>

      <?php if (get_field('reviews')) : ?><h2 class="access">Reviews</h2>
        <div class="reviews">
        <?php
           while( has_sub_field('reviews') ): 
             echo '<div><div class="border"></div>'.get_sub_field('rating').' <blockquote cite="'.get_sub_field('source_link').'">"'.get_sub_field('quote').'" - <a href="'.get_sub_field('source_link').'" target="_blank">'.get_sub_field('reviewer').'</a></blockquote></div>';
           endwhile; 
        ?>
        </div>
      <?php endif; ?>

	<?php if ( get_field('performance_images') && $_GET['dev'] ) : ?>
	<?php $i = 0; ?>
	<div class="performance-images">
	<div class="grid">
		<?php while( has_sub_field('performance_images') ): ?>
			<?php $i++; ?>
			<div class="col w-25"><a href="<?php echo get_sub_field('image')['url']; ?>" data-lightbox="images"><img src="<?php echo get_sub_field('image')['sizes']['thumbnail']; ?>" alt="image-<?php echo $i; ?>"/><span class="shade"></span></a></div>
			<?php if ($i % 4 == 0)  echo '</div><div class="grid">'; ?>
		<?php endwhile; ?>
	</div>
	</div>
	<?php endif; ?>
    </div>
  <?php endwhile; ?>
</div>
</div>
<?php get_footer(); ?>