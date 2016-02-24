<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage sixteen
 * @since Velvet Trumpet 1.0
 */
get_header();  ?>

<div class="wrapper<?php if (get_the_title() === 'Productions') echo ' production-list'; ?>">
  <div class="container">
    <?php 
    	// Start the loop.
      while ( have_posts() ) : the_post();

        // Include the single post content template.
        get_template_part( 'template-parts/content', 'single' );

      endwhile;
    ?>
  </div>
</div>

<?php get_footer(); ?>