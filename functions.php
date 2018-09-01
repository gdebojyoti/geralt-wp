<?php


// basic stuff
if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}


// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';


// load stylesheets
function geralt_enqueue_styles () {
	// bootstrap
	wp_enqueue_script('bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'));
	wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
	// stylesheets
	wp_enqueue_style('geralt-styles', get_stylesheet_uri());
	wp_enqueue_style('geralt-styles-mobile', get_template_directory_uri() . '/assets/css/mobile.css');
	wp_enqueue_style('geralt-styles-utilities', get_template_directory_uri() . '/assets/css/utilities.css');
	wp_enqueue_style('geralt-styles-cards', get_template_directory_uri() . '/assets/css/cards.css');
	wp_enqueue_style('geralt-styles-post', get_template_directory_uri() . '/assets/css/post.css');
	// Font awesome
	wp_enqueue_style('font-awesome-base', '//use.fontawesome.com/releases/v5.2.0/css/fontawesome.css');
	wp_enqueue_style('font-awesome-solid-icons', '//use.fontawesome.com/releases/v5.2.0/css/solid.css');
	// Google fonts
	wp_enqueue_style('googlefonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,700');
}
add_action('wp_enqueue_scripts', 'geralt_enqueue_styles');


// additional steps
function geralt_setup () {
	// fetch menu items dynamically from http://your-site.com/wp-admin/nav-menus.php
	register_nav_menus( array(
		'primary_menu' => __('Primary Geralt Menu', 'geralt')
	));

	// add document title tag
	add_theme_support( 'title-tag' );

	// add thumbnail ("Featured image") support for posts
	add_theme_support( 'post-thumbnails' );

	// Theme check recommendations
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'automatic-feed-links' );
}
add_action('after_setup_theme', 'geralt_setup');


// enable widgets
function geralt_widgets () {
	// add sidebar
	register_sidebar(array(
		'name' => __('Right Sidebar', 'geralt'),
		'id' => 'sidebar-1',
		'description' => __('Add widgets here to appear in the Geralt right sidebar', 'geralt'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	));
}
add_action('widgets_init', 'geralt_widgets');


// Custom menu for settings
function geralt_settings_page() { ?>
	<div class="wrap">
		<h1>Geralt theme settings</h1>
		<form method="post" action="options.php">
			 <?php
					 settings_fields( 'section' );
					 do_settings_sections( 'theme-options' );      
					 submit_button(); 
			 ?>          
		</form>
	</div>
<?php }
function geralt_settings_menu() {
	add_menu_page( 'Geralt Settings', 'Geralt Settings', 'manage_options', 'geralt-settings', 'geralt_settings_page', null, 5 );
}
add_action( 'admin_menu', 'geralt_settings_menu' );


// 3 column layout
// usage: [one-third]First column text[/one-third][one-third]Second column text[/one-third][one-third]Third column text[/one-third] 
function geralt_three_col_layout( $atts, $content ) {
	return '<div class="col-sm-4">' . $content . '</div>';
}
add_shortcode( 'one-third', 'geralt_three_col_layout' );


// Featured card layout
// usage: [card-layout-featured category="category title"]
require_once get_template_directory() . '/inc/card-layout-featured.php'; // Include featured card layout definition
function geralt_sc_card_featured( $atts = [], $content = null ) {
	extract( shortcode_atts( array (
		'category' => '',
	), $atts ) );

	$category_id = get_cat_ID($category);
	echo geralt_card_layout_featured($category_id);
}
add_shortcode( 'card-layout-featured', 'geralt_sc_card_featured' );


// General card layout
// usage: [card-layout category="category title"]
require_once get_template_directory() . '/inc/card-layout-general.php'; // Include general card layout definition
function geralt_sc_card_general( $atts = [], $content = null ) {
	extract( shortcode_atts( array (
		'category' => '',
	), $atts ) );

	$category_id = get_cat_ID($category);
	echo geralt_card_layout_general($category_id, 'cat');
}
add_shortcode( 'card-layout', 'geralt_sc_card_general' );


// Theme check recommendation
function geralt_add_editor_styles() {
	add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'geralt_add_editor_styles' );


// // disables auto-insertion of <p> tags on line breaks while in the editor's Text mode
// remove_filter( 'the_content', 'wpautop' );


?>