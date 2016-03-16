<?php if ( get_field('performance_images') ): ?>
  <?php $i = 0; ?>
  <div id="carousel-example-generic" class="carousel slide carousel--performance-images" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
        <?php while( has_sub_field('performance_images') ): ?>
          <?php 
            $image = get_sub_field('image');
          ?>
            <!-- <a href="<?php// echo $image['url']; ?>" data-lightbox="images"> -->
              <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="image-<?php echo $i; ?>"/>
              <!-- <span class="shade"></span> -->
            <!-- </a> -->
        <?php 
          $i++; 
          if ($i % 5 === 0) echo '</div><div class="item">';
        ?>
        <?php endwhile; ?>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <hr>
  </div>

<?php endif; ?>