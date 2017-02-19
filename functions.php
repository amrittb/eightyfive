<?php

/* ------------------------------------------------------------------------- *
 *  OptionTree framework integration: Use in theme mode
/* ------------------------------------------------------------------------- */

add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
load_template( get_template_directory() . '/option-tree/ot-loader.php' );

function eightyfive_load() {
	require( trailingslashit( get_template_directory() ) . 'includes/theme-options.php' );
}

add_action('after_setup_theme', 'eightyfive_load');

function eightyfive_setup() {
	// Enable automatic feed links
	add_theme_support( 'automatic-feed-links' );

	// Enable featured image
	add_theme_support( 'post-thumbnails' );

	// Enable post format support
	add_theme_support( 'post-formats', array( 'audio', 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

	// Thumbnail sizes
	add_image_size( 'thumb-small', 160, 160, true );
	add_image_size( 'thumb-medium', 520, 245, true );
	add_image_size( 'thumb-large', 720, 340, true );

	// Custom menu areas
	register_nav_menus( array(
		'header' => 'Header',
	) );
}

add_action('after_setup_theme', 'eightyfive_setup');

// Add scripts and stylesheets
function eightfive_scripts() {	
	wp_register_style('bootstrap', get_template_directory_uri() . '/css/vendor/bootstrap/css/bootstrap.min.css', array(), '3.3.6' , null);
	wp_register_style('materialize-css', get_template_directory_uri() . '/css/materialize.min.css', array('bootstrap'), null, null);
	wp_enqueue_style('eightyfive-css', get_template_directory_uri() . '/css/eightyfive.css', array('materialize-css'), null, null );

	wp_register_script('video', get_template_directory_uri() . '/js/vendor/video.js', null, null );
	wp_register_script('jquery-3', get_template_directory_uri() . '/js/vendor/jquery.min.js', array(), null, null );
	wp_register_script('materialize-js', get_template_directory_uri() . '/js/materialize.min.js', array('jquery-3'), null, null );
	wp_enqueue_script('eightyfive-js', get_template_directory_uri() . '/js/eightyfive.js', array('materialize-js','video'), null, null );
}

add_action( 'wp_enqueue_scripts', 'eightfive_scripts' );

// Add Google Fonts
function eightyfive_google_fonts() {
	wp_register_style('material-icons', 'http://fonts.googleapis.com/icon?family=Material+Icons');
	wp_register_style('roboto', 'https://fonts.googleapis.com/css?family=Roboto');
	wp_enqueue_style('material-icons');
	wp_enqueue_style('roboto');
}

add_action('wp_print_styles', 'eightyfive_google_fonts');

// WordPress Titles
function eightyfive_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	return $title;
}

add_filter( 'wp_title', 'eightyfive_wp_title', 10, 2 );
