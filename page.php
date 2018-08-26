<?php
/**
 * The template for displaying a generic page
 *
 * @package Geralt
 * @since Geralt 0.1
 */
?>

<?php get_header() ?>

<div class="container">

	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php the_title( '<h1>', '</h1>' ) ?>
			<?php the_content() ?>
				
		<?php endwhile; ?>
			
	<?php endif; ?>

</div>

<?php get_footer() ?>