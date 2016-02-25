<?php $page_title = get_the_title($ID); ?>

<h1 class="sr-only"><?php echo $page_title; ?></h1>

<?php if ($_GET['add-to-cart']) : ?>
  <div class="woocommerce">
    <div class="woocommerce-message">
      <a href="cart" class="button wc-forward">View Cart</a> 
      This item was successfully added to your cart.
    </div>    
  </div>
<?php endif; ?>

<div class="row<?php if ($page_title == 'Soggy Brass') : echo ' soggy-brass'; endif; ?>">
  <div class="col-md-6<?php if ($page_title == 'Soggy Brass') echo ' left-col'; ?>">
      <?php 
        if (has_post_thumbnail() || get_field('poster_image')) : ?>
        <div class="poster-large">
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
  <?php if ($page_title != 'Soggy Brass') { ?>
  <div class="h2"><?php echo $page_title; ?></div>
  <?php } ?>
  <?php if (get_field('tagline')) : ?>
  <em class="tagline">'<?php echo get_field('tagline'); ?>'</em>
<?php endif; ?>
<?php if ($page_title != 'Soggy Brass') { ?>
<h2 class="sr-only">Synopsis</h2>        
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
  <h2 class="sr-only">Dates of Performance</h2>
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
set_query_var( 'parents', $parents );

$args = array(
  'sort_order' => 'asc',
  'sort_column' => 'post_date',
  'post_type' => 'post',
  'post_status' => 'publish'
  ); 

get_template_part( 'template-parts/content', 'post-nav'); 
?>

</div>