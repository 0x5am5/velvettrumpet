<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="wrapper">
		<main id="main" class="content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="news-page"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>
			
			<?php if (is_single()) : echo '<a href="news">< Back to news</a>'; endif; ?>
			<!-- <div class="grid"> -->
				<!-- <div class="col w-75"> -->
				
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

			
				<article>
				<h2>
					<?php if (is_single()) : ?>
						<?php the_title(); ?>
					<?php else : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>				
					<?php endif; ?>
				</h2>
				<p>Posted on: <?php the_date(); ?></p>
					
				<div class="article-content">
					<?php if ( has_post_thumbnail()) {
   						$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
   						echo '<div class="wp-post-image">';
   						if (is_single()) :
   							echo '<img src="' . $full_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" />';
   						else :
   							echo '<a href="'. get_the_permalink() .'"><img src="' . $full_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" /></a>';   				
   						endif;
   						echo '</div>';
 					} ?>
					<?php 
						if (is_single()) :
							the_content();
						else :
							the_excerpt();
						endif; 
					?>
				</div>
				
				<?php if (!is_single()) : ?>
					<div class="article-footer">
						<a href="<?php the_permalink(); ?>" title="Read more of <?php the_title(); ?>">Read more.</a>					
					</div>
				<?php endif; ?>

				<p class="tags"><?php the_tags('Tags: ', '<span class="access">,</span>'); ?></p>

				</article>	


			<?php
			// End the loop.
			endwhile; 

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) ); ?>

				<!-- </div> -->
				<!-- <div class="col w-25"> -->
					
					<?php  //get_template_part('templates-content', 'shows'); ?>
<!-- 
				</div> -->
			<!-- </div> -->


		<?php
		// If no content, include the "No posts found" template.
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
