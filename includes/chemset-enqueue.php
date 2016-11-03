<?php
################################################################################
// Enqueue Scripts
################################################################################

function init_enqueue() {
	wp_deregister_script( 'comment-reply' );

	// Register Scripts
	wp_register_script( 'comment-reply', site_url() . '/wp-includes/js/comment-reply.js');
	wp_register_script( 'jquery-plugins', get_template_directory_uri() . '/js/min/plugins.min.js');
	wp_register_script( 'jquery-scripts', get_template_directory_uri() . '/js/min/script.min.js');

	// Queue Scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-plugins', get_template_directory_uri() . '/js/min/plugins.min.js', 'jquery', '', true);
	wp_enqueue_script('jquery-scripts', get_template_directory_uri() . '/js/min/script.min.js', 'jquery', '', true);

	// Queue Comment Reply if Threaded Comments Are Enabled
	if ( get_option( 'thread_comments' ) && is_single()) wp_enqueue_script( 'comment-reply',  site_url() . '/wp-includes/js/comment-reply.js', 'jquery', '', true );

	//Queue Styles
	wp_enqueue_style( 'chemset-style', get_stylesheet_uri() );
}

function header_scripts() {

	// Echo the analytics code if provided in Theme Options
	$options = get_option('thsp_cbp_theme_options');
	$analytics = $options['chemset_analytics_code'];
	if ($analytics) :
		echo '<script>'.$analytics.'</script>';
	endif;
}

add_action('wp_enqueue_scripts', 'init_enqueue', 0);
add_action('wp_head', 'header_scripts', 10);