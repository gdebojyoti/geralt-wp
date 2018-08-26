<?php
/**
 * The template for displaying the right sidebar
 *
 * @package Geralt
 * @since Geralt 0.1
 */
?>

<?php if (is_active_sidebar('sidebar-1')) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar('sidebar-1') ?>
	</aside>
<?php endif ?>