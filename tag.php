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
    require_once get_template_directory() . '/inc/card-layout-general.php'; // Include general card layout definition
    echo geralt_card_layout_general(get_queried_object_id(), 'tag_id');
  ?>
</div>

<?php get_footer() ?>