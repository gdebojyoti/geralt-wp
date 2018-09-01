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
    require_once get_template_directory() . '/inc/constants.php';

    if( function_exists('geralt_p_card_layout_general') ) {
      geralt_p_card_layout_general();
    } else {
      echo GERALT_PLUGIN_MISSING;
    }
  ?>
</div>

<?php get_footer() ?>