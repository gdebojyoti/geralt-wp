<?php
/**
 * The template for displaying tag page
 *
 * @package Geralt
 * @since Geralt 0.3.1
 */
?>

<?php get_header() ?>

<div class="container">
  <?php
    require_once get_template_directory() . '/inc/constants.php';

    if( function_exists('geralt_p_card_layout_general') ) {
      geralt_p_card_layout_general(get_queried_object_id(), 'tag_id');
    } else {
      echo GERALT_PLUGIN_MISSING;
    }
  ?>
</div>

<?php get_footer() ?>