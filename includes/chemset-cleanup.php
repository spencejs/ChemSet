<?php
################################################################################
// Tweak and refine default Wordpress behavior
################################################################################

// redirect /?s to /search/
// http://txfx.net/wordpress-plugins/nice-search/
function chemset_nice_search_redirect() {
	if (is_search() && strpos($_SERVER['REQUEST_URI'], '/wp-admin/') === false && strpos($_SERVER['REQUEST_URI'], '/search/') === false) {
		wp_redirect(home_url('/search/' . str_replace(array(' ', '%20'), array('+', '+'), urlencode(get_query_var( 's' )))), 301);
	exit();
	}
}
add_action('template_redirect', 'chemset_nice_search_redirect');

function chemset_search_query($escaped = true) {
	$query = apply_filters('chemset_search_query', get_query_var('s'));
	if ($escaped) {
		$query = esc_attr( $query );
	}
	return urldecode($query);
}

add_filter('get_search_query', 'chemset_search_query');

// remove dir and set lang="en" as default (rather than en-US)
function chemset_language_attributes() {
	$attributes = array();
	$output = '';
	$lang = get_bloginfo('language');
	if ($lang && $lang !== 'en-US') {
		$attributes[] = "lang=\"$lang\"";
	} else {
		$attributes[] = 'lang="en"';
	}

	$output = implode(' ', $attributes);
	$output = apply_filters('chemset_language_attributes', $output);
	return $output;
}

add_filter('language_attributes', 'chemset_language_attributes');

// remove WordPress version from RSS feed
function chemset_no_generator() { return ''; }
add_filter('the_generator', 'chemset_no_generator');

//Add Post thumbnails to Feed
function feedFilter($query) {
	if ($query->is_feed) {
		add_filter('the_content', 'feedContentFilter');
		}
	return $query;
}
add_filter('pre_get_posts','feedFilter');

function feedContentFilter($content) {
	$thumbId = get_post_thumbnail_id();

	if($thumbId) {
		$img = wp_get_attachment_image_src($thumbId);
		$image = '<img align="left" src="'. $img[0] .'" alt="" width="'. $img[1] .'" height="'. $img[2] .'" />';
		echo $image;
	}

	return $content;
}

//Automatic Feed Links
add_theme_support( 'automatic-feed-links' );

//html5 Markup
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

// Disable Wp Emoji
function disable_wp_emojicons() {

	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

add_action( 'init', 'disable_wp_emojicons' );

//Remove URL Field from Comment Form - Fights Spam
add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
	if(isset($fields['url']))
		unset($fields['url']);
		return $fields;
}

// cleanup wp_head
function chemset_noindex() {
	if (get_option('blog_public') === '0')
	echo '<meta name="robots" content="noindex,nofollow">', "\n";
}

function chemset_rel_canonical() {
	if (!is_singular())
		return;
	global $wp_the_query;
	if (!$id = $wp_the_query->get_queried_object_id())
		return;
	$link = get_permalink($id);
	echo "\t<link rel=\"canonical\" href=\"$link\">\n";
}

// remove CSS from recent comments widget
function chemset_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
}

function chemset_head_cleanup() {
	// http://wpengineer.com/1438/wordpress-header/
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'noindex', 1);
	add_action('wp_head', 'chemset_noindex');
	remove_action('wp_head', 'rel_canonical');
	add_action('wp_head', 'chemset_rel_canonical');
	add_action('wp_head', 'chemset_remove_recent_comments_style', 1);

	// deregister l10n.js (new since WordPress 3.1)
	// why you might want to keep it: http://wordpress.stackexchange.com/questions/5451/what-does-l10n-js-do-in-wordpress-3-1-and-how-do-i-remove-it/5484#5484
	if (!is_admin()) {
		wp_deregister_script('l10n');
	}
}

add_action('init', 'chemset_head_cleanup');

// excerpt cleanup
// make changes here to suit your excerpt needs

	// Set number of words in the excerpt
	function chemset_excerpt_length($length) {
		return 40;
	}

	// Set text for Continue Reading link
	function chemset_continue_reading_link() {
		return ' <a href="' . get_permalink() . '" class="more-link">' . __( ' Read More', 'chemset' ) . '</a>';
	}

	// auto add ellipses
	function chemset_auto_excerpt_more($more) {
		return ' &hellip;' . chemset_continue_reading_link();
	}

add_filter('excerpt_length', 'chemset_excerpt_length');
add_filter('excerpt_more', 'chemset_auto_excerpt_more');

// remove container from menus
function chemset_nav_menu_args($args = '') {
	$args['container'] = false;
	return $args;
}

add_filter('wp_nav_menu_args', 'chemset_nav_menu_args');

// add to robots.txt
// http://codex.wordpress.org/Search_Engine_Optimization_for_WordPress#Robots.txt_Optimization
add_action('do_robots', 'chemset_robots');

function chemset_robots() {
		echo "Disallow: /cgi-bin\n";
	echo "Disallow: /wp-admin\n";
	echo "Disallow: /wp-includes\n";
	echo "Disallow: /wp-content/plugins\n";
	echo "Disallow: /plugins\n";
	echo "Disallow: /wp-content/cache\n";
	echo "Disallow: /wp-content/themes\n";
	echo "Disallow: /trackback\n";
	echo "Disallow: /feed\n";
	echo "Disallow: /comments\n";
	echo "Disallow: /category/*/*\n";
	echo "Disallow: */trackback\n";
	echo "Disallow: */feed\n";
	echo "Disallow: */comments\n";
	echo "Disallow: /*?*\n";
	echo "Disallow: /*?\n";
	echo "Allow: /wp-content/uploads\n";
	echo "Allow: /assets";
}

// Hide Email from Spam Bots using a short code. Usage: [email]john.doe@mysite.com[/email]
function HideMail($atts , $content = null ){
	if ( ! is_email ($content) )
		return;

	return '<a href="mailto:'.antispambot($content).'">'.antispambot($content).'</a>';
}
add_shortcode( 'email','HideMail');

//////////////////////////////////////////////////
//Add Classes to Next/Previous Posts Links
//////////////////////////////////////////////////
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
	return 'class="older-posts"';
}
function posts_link_attributes_2() {
	return 'class="newer-posts"';
}
?>