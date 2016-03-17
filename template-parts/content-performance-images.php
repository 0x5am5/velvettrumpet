<?php if ( get_field('performance_images') ): ?>
  <?php $i = 0; ?>
  <div id="performance-images-desk" class="carousel slide carousel--performance-images hidden-xs" data-ride="carousel">
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
    <a class="left carousel-control" href="#performance-images-desk" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#performance-images-desk" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <hr>
  </div>

  <?php $i = 0; ?>
  <div id="performance-images-mob" class="carousel slide carousel--performance-images visible-xs-block" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
    <?php while( has_sub_field('performance_images') ): ?>
      <div class="item<?php if ($i === 0) echo ' active'; ?>">
        
        <?php $image = get_sub_field('image'); ?>
          <!-- <a href="<?php// echo $image['url']; ?>" data-lightbox="images"> -->
            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="image-<?php echo $i; ?>"/>
            <!-- <span class="shade"></span> -->
          <!-- </a> -->

      </div>
    <?php $i++; ?>
    <?php endwhile; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#performance-images-mob" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#performance-images-mob" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <hr>
  </div>
<?php endif; ?>