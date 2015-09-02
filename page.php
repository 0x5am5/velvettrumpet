<?php get_header(); ?>

<div class="wrapper<?php if (get_the_title() === 'Productions') echo ' production-list'; ?>">
	<div class="content">

	<?php while ( have_posts() ) : the_post();

		if (!is_front_page()) { ?>

			<h1<?php if(get_field('hide_header')) :  echo ' class="access"';  endif; ?>><?php echo get_the_title($ID); ?></h1>

		<?php } else { ?>

			<h1 class="access">Velvet Trumpet</h1>

			<?php get_template_part( 'template-parts/content', 'slider' );

		}

		if(get_field('mission_statement')) :

			get_template_part( 'template-parts/content', 'mission-statement' );

		endif;

		if(get_field('staff_member')) :
			
			get_template_part( 'template-parts/content', 'employees' );

		endif;
		
		if(get_the_title() === 'Productions') :

			get_template_part( 'template-parts/content', 'productions' );

		endif;
			

		if (get_the_title() === 'Soggy Brass') {
			
			get_template_part( 'template-parts/content', 'soggy-brass' );

		} else {

			the_content();

		}

	endwhile; ?>

	</div>
</div>
	
<?php get_footer(); ?>