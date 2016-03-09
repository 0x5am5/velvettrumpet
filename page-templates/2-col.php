<?php
/*
Template Name: 2 col
*/

$parents = get_post_ancestors( $post->ID );

?>
<?php get_header(); ?>

<div class="wrapper">
  <div class="container">

  <?php while ( have_posts() ) : the_post(); ?>

    <?php $page_title = get_the_title($ID); ?>

    <?php if ($_GET['add-to-cart']) : ?>
      <div class="woocommerce">
        <div class="woocommerce-message">
          <a href="cart" class="button wc-forward">View Cart</a> 
          This item was successfully added to your cart.
        </div>    
      </div>
    <?php endif; ?>
      
    <div class="row">
      <div class="col-md-6">
        <div class="visible-xs-block text-center">
          <div class="h2"><?php echo $page_title; ?></div>
          <em class="tagline"><?php the_field('tagline') ?></em>
        </div>
      <?php if (get_field('poster_image')) : ?>
        <div class="poster-large">
          <?php if(get_field('booking_now')) : ?>
            <span class="icon booking"></span>
          <?php endif; ?>
          <img src="<?php echo get_field('poster_image')['url']; ?>" alt="<?php echo get_field('poster_image')['title']; ?>"/>
        </div>
      <?php endif; ?>
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
      <div class="col-sm-6<?php if (apply_filters("the_title", get_the_title(end($parents))) === 'Productions') echo ' production'; if ($page_title == 'Soggy Brass') echo ' right-col'; ?>">
        <div class="hidden-xs">
          <h1 class="h2"><?php echo $page_title; ?></h1>
          <em class="tagline"><?php the_field('tagline') ?></em>      
        </div>
        <h2 class="sr-only">Synopsis</h2>        
        <?php the_content(); ?>
        
        <h2 class="cast">CAST</h2>
        <ul class="main-cast">
        <?php
          while( has_sub_field('cast') ): 
            echo '<li>'.get_sub_field('name').'</li>';
          endwhile; 

          if (get_field('additional_crew')) :
            while( has_sub_field('additional_crew') ): 
              echo '<li>'.get_sub_field('role').' '.get_sub_field('name').'</li>';
            endwhile; 
          endif;
        ?>
        </ul>
        <?php if (get_field('other_info')) { ?>
          <div class="other-info">
          <?php the_field('other_info'); ?>
          </div>
        <?php } ?>
      
        </div>
      </div>

      <div class="additional-info visible-xs-block">
        <h2 class="sr-only">Dates of Performance</h2>
        <ol class="bullet-list">
        <?php
          while( has_sub_field('performance_dates') ) :
            echo '<li>'.get_sub_field('date').'</li>';
          endwhile; 
        ?>
        </ol>
      <?php } ?>

      <?php if (get_field('running_time')) { echo 'Running time | '.get_field('running_time').' minutes'; } ?>

      <?php if (get_field('next_soggy_brass')) { echo get_field('next_soggy_brass'); }?>
      
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

      <?php get_template_part( 'template-parts/content', 'performance-images' ); ?>
      
      <?php 
        $args = array(
          'sort_order' => 'asc',
          'sort_column' => 'post_date',
          'child_of' => $parents[0],
          'post_type' => 'page',
          'post_status' => 'publish'
        );

        set_query_var( 'parents', $parents );
        set_query_var( 'args', $args );
        get_template_part( 'template-parts/content', 'post-nav' ); 
      ?>

    </div>
  <?php endwhile; ?>
</div>
</div>
<?php get_footer(); ?>