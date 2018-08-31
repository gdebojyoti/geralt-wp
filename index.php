<?php
/**
 * The main template file
 *
 * @package Geralt
 * @since Geralt 0.1
 */
?>

<?php get_header() ?>

<!-- <div class="jumbotron">
	<div class="container text-center">
		<h1><?php bloginfo('name') ?></h1>
		<h3><?php bloginfo('description') ?></h3>
	</div>
</div> -->

<div class="container">
	<?php
    require_once get_template_directory() . '/inc/card-layout-general.php'; // Include general card layout definition
    echo geralt_card_layout_general(0);
  ?>
</div>

<?php get_footer() ?>