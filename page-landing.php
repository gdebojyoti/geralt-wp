<?php
/**
 * Template Name: Landing Page v3
 *
 * @package Geralt
 * @since Geralt 0.1
 */
?>

<?php get_header() ?>

<div class="container">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content() ?>
	<?php endwhile ?>
</div>

<?php get_footer() ?>