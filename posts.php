<?php get_header(); ?>

<div class="wrapper<?php if (get_the_title() === 'Productions') echo ' production-list'; ?>">
	<div class="content">

	<?php while ( have_posts() ) : the_post(); ?>

			 the_content();

	<?php endwhile; ?>
	</div>
</div>
	
<?php get_footer(); ?>