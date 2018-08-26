<?php
/**
 * Template Name: Pricing Page
 *
 * @package Geralt
 * @since Geralt 0.1
 */
?>

<?php get_header() ?>

<div class="container text-center">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
		
			<h1><?php the_title() ?></h1>
			<?php the_content() ?>
				
		<?php endwhile; ?>
			
	<?php endif; ?>

</div>

<?php get_footer() ?>