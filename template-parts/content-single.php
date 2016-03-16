<?php $page_title = get_the_title($ID); ?>

<div class="row<?php if ($page_title == 'Soggy Brass') : echo ' soggy-brass'; endif; ?>">
  <div class="col-sm-6">
    <div class="visible-xs-block text-center">
      <div class="h2"><?php echo $page_title; ?></div>
      <em class="tagline">
      <?php 
        if (get_field('tagline')):
            the_field('tagline');
        elseif (get_field('the_venue')):
          echo get_the_date('jS F Y').' | '.get_field('the_venue');
        endif; 
      ?> 
    </em> 
    </div>
    <?php if (has_post_thumbnail() || get_field('poster_image')) : ?>
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
  </div>
  <div class="col-sm-6 text-center">
    <div class="hidden-xs">
      <h1 class="h2"><?php echo $page_title; ?></h1>
      <em class="tagline">
        <?php 
          if (get_field('tagline')):
              the_field('tagline');
          elseif (get_field('the_venue')):
            echo get_the_date('jS F Y').' | '.get_field('the_venue');
          endif; 
        ?> 
      </em>      
    </div>
    <?php echo the_content(); ?>
  </div>
  <?php 
    $args = array(
     'sort_order' => 'asc',
     'sort_column' => 'post_date',
     'post_type' => 'post',
     'post_status' => 'publish',
     'category_name' => 'soggy brass'
    ); 
    set_query_var( 'args', $args );
    get_template_part( 'template-parts/content', 'post-nav'); 
  ?>
</div>