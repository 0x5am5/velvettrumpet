<?php
/*
Template Name: 2 col
*/

$parents = get_post_ancestors( $post->ID );

?>
<?php get_header(); ?>

<div class="wrapper">
  <div class="container<?php if (apply_filters("the_title", get_the_title(end($parents))) === 'Productions') echo ' production'; ?>">
    <main>
      <article>
        <?php while ( have_posts() ) : the_post(); ?>
          
          <section itemscope itemtype="http://schema.org/Event">
            
            <?php $page_title = get_the_title($ID); ?>

            <header>
              <h1 class="sr-only" itemprop="name"><?php echo $page_title; ?></h1>
            </header>
            

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
                  <div class="h2"><?php echo $page_title; ?></div>
                  <em class="tagline">
                    <?php if (get_field('tagline')):
                      the_field('tagline');
                    elseif (get_field('venue')):
                      echo get_the_date('jS F \'y').' | '.get_field('venue');
                    endif; ?> 
                  </em> 
                </div>

                <?php if (has_post_thumbnail() || get_field('poster_image')) : ?>
                  <div class="poster-large production__poster">
                    <?php if (has_post_thumbnail()) :
                      the_post_thumbnail('post-thumbnail', array('itemprop' => 'image'));
                    elseif(get_field('poster_image')) : ?> 
                      <img itemprop="image" src="<?php echo get_field('poster_image')['url']; ?>" alt="<?php echo get_field('poster_image')['title']; ?>"/>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                <div class="hidden-xs">
                  <?php if (get_field('performance_dates')) : ?>
                      <h2 class="sr-only">Dates of Performance</h2>
                      
                      <ol class="bullet-list">
                        <?php while( has_sub_field('performance_dates') ) :
                    
                          $fullDate = get_sub_field('date');
                          $startDate = get_sub_field('start_date');
                          $endDate = get_sub_field('end_date');
                          $venue = get_sub_field('venue');

                          if ($fullDate) :
                            echo '<li>'.$fullDate.'</li>';
                          else : ?>
                            <li>
                              <span itemprop="startDate" value="<?php echo $startDate; ?>"><?php echo date("jS F", strtotime($startDate)); ?></span>
                              <?php if ($endDate) : ?>
                                - <span itemprop="endDate" value="<?php echo $endDate; ?>"><?php echo date("jS F", strtotime($endDate)); ?></span>
                              <?php endif; ?>
                              <?php echo date("Y", strtotime($startDate)); ?>
                              <?php echo ' at <span itemprop="location">' . $venue . '</span>'; ?>
                            </li>
                          <?php endif; ?>
                        <?php endwhile; ?>
                      </ol>
                  <?php endif; ?>

                  <?php if (get_field('running_time')) echo '<p>Running time | '.get_field('running_time').' minutes</p>'; ?>
                </div>

                <?php if (get_field('next_soggy_brass')) the_field('next_soggy_brass'); ?>
                
                <?php if (get_field('add_to_cart')) : ?>
                        
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

              <div class="col-sm-6<?php if ($page_title == 'Soggy Brass') echo ' right-col'; ?>">
                <div class="hidden-xs production__title">
                  <h2><?php echo $page_title; ?></h2>
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

                <span itemprop="description">
                  <?php the_content(); ?>
                </span>       
                
                <h2 class="cast text-uppercase">Cast</h2>
                
                <ul class="list-unstyled">
                  <?php while( has_sub_field('cast') ): 
                    echo '<li itemprop="actor">'.get_sub_field('name').'</li>';
                  endwhile; 

                  if (get_field('additional_crew')) :

                    $creativeRole = get_sub_field('role_category') ? 'itemprop="'.get_sub_field('role_category').'"' : '';

                    echo '<li class="divider"></li>';

                    while( has_sub_field('additional_crew') ): 
                      echo '<li '.$creativeRole.'>'.get_sub_field('role').' '.get_sub_field('name').'</li>';
                    endwhile; 

                  endif; ?>
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
                  <?php while( has_sub_field('performance_dates') ) :
                    
                    $fullDate = get_sub_field('date');
                    $startDate = get_sub_field('start_date');
                    $endDate = get_sub_field('end_date');
                    $venue = get_sub_field('venue');

                    if ($fullDate) :
                      echo '<li>'.$fullDate.'</li>';
                    else : ?>
                      <li>
                        <span itemprop="startDate" value="<?php echo $startDate; ?>"><?php echo date("jS F", strtotime($startDate)); ?></span>
                        <?php if ($endDate) : ?>
                          - <span itemprop="endDate" value="<?php echo $endDate; ?>"><?php echo date("jS F", strtotime($endDate)); ?></span>
                        <?php endif; ?>
                        <?php echo date("Y", strtotime($startDate)); ?>
                        <?php echo ' at <span itemprop="location">' . $venue . '</span>'; ?>
                      </li>
                    <?php endif; ?>
                  <?php endwhile; ?>
                </ol>

                <?php if (get_field('running_time')) : ?>
                  <meta itemprop="duration" value="P <?php the_field('running_time'); ?>M">
                  Running time | <?php the_field('running_time'); ?> minutes</span>
                <?php endif; ?>

                <?php if (get_field('next_soggy_brass')) :  the_field('next_soggy_brass'); endif; ?>
              </div>

              <?php if (get_field('reviews')) : ?>

                <h2 class="sr-only">Reviews</h2>
                
                <?php while(has_sub_field('reviews')): ?>
                  <div itemscope itemtype="http://schema.org/Review">
                    <blockquote cite="<?php echo get_sub_field('source_link'); ?>">
                      <meta itemprop="itemReviewed" value="<?php echo $page_title; ?>">
                      
                      <?php if (has_sub_field('star_rating')) : ?>
                        <div>
                          <?php for ($i = 1; $i < get_sub_field('star_rating'); $i++) { 
                            echo '<span class="glyphicon glyphicon-star"></span>';
                          } ?>
                          
                          <span itemprop="reviewRating" class="sr-only">
                            <?php get_sub_field('star_rating'); ?>
                          </span>
                          
                        </div>
                      <?php endif; ?>
                    
                      "<span itemprop="reviewBody"><?php echo get_sub_field('quote'); ?></span>"
                      
                      <footer>
                        <a href="<?php echo get_sub_field('source_link'); ?>" target="_blank" itemprop="reviewer">
                          <?php echo get_sub_field('reviewer'); ?>
                        </a>
                      </footer>
                    </blockquote>
                  </div>
                  <?php endwhile; ?>

              <?php endif; ?>

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
          </section>
        <?php endwhile; ?>
      </article>
    </main>
  </div>
</div>
<?php get_footer(); ?>