<?php
/**
 * The template for displaying the header
 *
 * @package Geralt
 * @since Geralt 0.1
 */
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head() ?>
	</head>

	<body <?php body_class() ?>>

	<?php
		// nav bar
		require_once get_template_directory() . '/partials/navbar.php';
	?>