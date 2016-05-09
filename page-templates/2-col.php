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
      <div class="col-sm-6">
        <div class="visible-xs-block text-center production__title">
          <div class="h2" itemprop="itemReviewed"><?php echo $page_title; ?></div>
          <em class="tagline">
            <?php 
              if (get_field('tagline')):
                  the_field('tagline');
              elseif (get_field('venue')):
                echo get_the_date('jS F \'y').' | '.get_field('venue');
              endif; 
            ?> 
          </em> 
        </div>
        <?php if (has_post_thumbnail() || get_field('poster_image')) : ?>
          <div class="poster-large production__poster">
            <?php if(get_field('booking_now')) : ?>
            <span class="icon booking"></span>
            <?php endif; ?>
            <?php if (has_post_thumbnail()) :
              the_post_thumbnail('post-thumbnail');
            elseif(get_field('poster_image')) : ?> 
              <img src="<?php echo get_field('poster_image')['url']; ?>" alt="<?php echo get_field('poster_image')['title']; ?>"/>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <div class="additional-info production__additional-info">
          <div class="hidden-xs">
          <?php if (get_field('performance_dates')) : ?>
              <h2 class="sr-only">Dates of Performance</h2>
              <ol class="bullet-list">
                <?php
                  while( has_sub_field('performance_dates') ) :
                    echo '<li>'.get_sub_field('date').'</li>';
                  endwhile;
                ?>
              </ol>
          <?php endif; ?>

          <?php if (get_field('running_time')) echo '<p>Running time | '.get_field('running_time').' minutes</p>'; ?>
          </div>

          <?php if (get_field('next_soggy_brass')) the_field('next_soggy_brass'); ?>
          
          <?php if(get_field('add_to_cart')) : ?>
                  
            <?php
              $pageURL = $_SERVER["REQUEST_URI"];

              if(count($_GET)>0) :
                $pageURL .= '&add-to-cart=';
              else :
                $pageURL .= '?add-to-cart=';
              endif;

              $pageURL .= get_field('add_to_cart'); 
            ?>
                
            <p>
              <a href="<?php echo $pageURL; ?>" title="Book now" class="button button--buy">Book now!</a>                
            </p>
                  
          <?php endif; ?>
        </div>      
      </div>
      <div class="col-sm-6<?php if ($page_title == 'Soggy Brass') echo ' right-col'; ?>">
        <div class="hidden-xs production__title">
          <h1 class="h2"><?php echo $page_title; ?></h1>
          <em class="tagline">
            <?php 
              if (get_field('tagline')):
                  the_field('tagline');
              elseif (get_field('venue')):
                echo get_the_date('jS F \'y').' | '.get_field('venue');
              endif; 
            ?> 
          </em>     
        </div>
        <h2 class="sr-only">Synopsis</h2>        
        <?php the_content(); ?>
        
        <h2 class="cast text-uppercase">CAST</h2>
        <ul class="list-unstyled">
        <?php
          while( has_sub_field('cast') ): 
            echo '<li>'.get_sub_field('name').'</li>';
          endwhile; 

          if (get_field('additional_crew')) :
            
            echo '<li class="divider"></li>';

            while( has_sub_field('additional_crew') ): 
              echo '<li>'.get_sub_field('role').' '.get_sub_field('name').'</li>';
            endwhile; 
          endif;
        ?>
        </ul>
        <?php if (get_field('other_info')) : ?>
          <div class="other-info">
          <?php the_field('other_info'); ?>
          </div>
        <?php endif; ?>
      
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

      <?php if (get_field('running_time')) { echo 'Running time | '.get_field('running_time').' minutes'; } ?>

      <?php if (get_field('next_soggy_brass')) { echo get_field('next_soggy_brass'); }?>
      
      </div>

      <?php if (get_field('reviews')) : ?>
        <?php $rating = 0; ?>
        <?php $reviews = 0; ?> 
        <h2 class="sr-only">Reviews</h2>
        <?php while(has_sub_field('reviews')): 
          $reviews++;
          echo '<blockquote itemprop="review" itemtype="http://schema.org/VisualArtwork" cite="'.get_sub_field('source_link').'">';

          if (has_sub_field('star_rating')) :
            $i;
            echo '<div>';
            for ($i = 1; $i < get_sub_field('star_rating'); $i++) { 
              echo '<span class="glyphicon glyphicon-star"></span>';
            }
            if ($i > $rating) $rating = $i;
            echo '</div>';
          endif;
          echo '<span itemprop="reviewBody">"'.get_sub_field('quote').'</span>"<footer><a href="'.get_sub_field('source_link').'" target="_blank" itemprop="reviewer">'.get_sub_field('reviewer').'</a></footer></blockquote>';
        endwhile; 
        
        if (($rating-1) > 0) :
          echo '<span class="sr-only"><span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"><span itemprop="ratingValue">'.($i-1).'</span></span> star rating</span>';
        endif;
        echo '<meta itemprop="reviewCount" content="'.$reviews.'">';
      endif; ?>

      <?php get_template_part( 'template-parts/content', 'performance-images' ); ?>
      
      <?php 

        $args = array(
          'sort_order' => 'asc',
          'sort_column' => 'post_date',
          'child_of' => $post->post_parent,
          'post_type' => 'page',
          'post_status' => 'publish'
        );

        set_query_var( 'args', $args );
        get_template_part( 'template-parts/content', 'post-nav' ); 
      ?>

    </div>
  <?php endwhile; ?>
</div>
</div>
<?php get_footer(); ?>