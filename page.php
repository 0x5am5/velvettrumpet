<?php get_header(); ?>

<div class="wrapper<?php if (get_the_title() === 'Productions') echo ' production-list'; ?>">
	<div class="container">
	
		<main>
			<article>
				<?php while ( have_posts() ) : the_post(); ?>

					<section>

						<?php if (is_front_page()) : ?>

							<header>
								<h1 class="sr-only">Velvet Trumpet</h1>
							</header>

							<?php get_template_part( 'template-parts/content', 'slider' ); ?>

						<?php else : ?>

							<header>
								<h1 class="sr-only"><?php the_title($ID); ?></h1>
							</header>

						<?php endif; ?>

						<?php if(get_field('mission_statement')) : ?>
							
							<header>
								<h2>Mission Statement</h2>
							</header>

							<div class="mission-statement">
								<?php the_field('mission_statement'); ?>
							</div>  

						<?php endif; ?>

						<?php 
							if (has_post_thumbnail()) :
				              echo get_the_post_thumbnail($ID, 'full', array('class'=>'soggy-image no-shadow img-responsive featured-img'));
							endif; 
						?>

						<?php 

						if(get_field('staff_member')) :
							
							get_template_part( 'template-parts/content', 'employees' );

						endif;
						
						if(get_the_title() === 'Productions') :

							get_template_part( 'template-parts/content', 'productions' );

						endif; 

						?>
							
						<div class="main-content"><?php the_content(); ?></div>

					</section>
				<?php endwhile; ?>
			</article>
		</main>

	</div>
</div>
	
<?php get_footer(); ?>