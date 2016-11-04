<?php

// http://foolswisdom.com/wp-activate-theme-actio/

global $pagenow;
if (is_admin() && 'themes.php' === $pagenow && isset( $_GET['activated'])) {

	// on theme activation make sure there's a Home page
	// create it if there isn't and set the Home page menu order to -1
	// set WordPress to have the front page display the Home page as a static page
	$default_pages = array('Home','Style Guide','Atoms','Molecules','Organisms');
	$existing_pages = get_pages();

	foreach ($existing_pages as $page) {
		$temp[] = $page->post_title;
	}

  $pages_to_create = array_diff($default_pages, $temp);

  foreach ($pages_to_create as $new_page_title) {

		// Add pages
		$add_default_pages = array();
		$add_default_pages['post_title'] = $new_page_title;
		$add_default_pages['post_status'] = 'publish';
		$add_default_pages['post_type'] = 'page';

		// insert the post into the database
		$result = wp_insert_post($add_default_pages);
	}

	//Set newly created Home page as Front Page
	$home = get_page_by_title('Home');
	update_option('show_on_front', 'page');
	update_option('page_on_front', $home->ID);

	$home_menu_order = array();
	$home_menu_order['ID'] = $home->ID;
	$home_menu_order['menu_order'] = -1;
	wp_update_post($home_menu_order);

	// Set Syle Guide as parent of Sub-pages
	$style_guides = array( 'Atoms', 'Molecules', 'Organisms' );
	$parent = get_page_by_title('Style Guide');
	$parent_id = $parent->ID;


	foreach ( $style_guides as $style_guide ) {

		$guide_page = get_page_by_title( $style_guide );

		$style_guide_parent = array();
		$style_guide_parent['ID'] = $guide_page->ID;
		$style_guide_parent['post_parent'] = $parent_id;
		wp_update_post($style_guide_parent);

	}

	// set the permalink structure
	if (get_option('permalink_structure') != '/%year%/%postname%/') {
		update_option('permalink_structure', '/%year%/%postname%/');
  }

	$wp_rewrite->init();
	$wp_rewrite->flush_rules();

	// automatically create menus and set their locations
	// add all pages to the Primary Navigation
	$chemset_nav_theme_mod = false;

	if (!has_nav_menu('primary_navigation')) {
		$primary_nav_id = wp_create_nav_menu('Primary Navigation', array('slug' => 'primary_navigation'));
		$chemset_nav_theme_mod['primary_navigation'] = $primary_nav_id;
	}

	if (!has_nav_menu('utility_navigation')) {
		$utility_nav_id = wp_create_nav_menu('Utility Navigation', array('slug' => 'utility_navigation'));
		$chemset_nav_theme_mod['utility_navigation'] = $utility_nav_id;
	}

	if ($chemset_nav_theme_mod) {
    set_theme_mod('nav_menu_locations', $chemset_nav_theme_mod );
  }

  $primary_nav = wp_get_nav_menu_object('Primary Navigation');

  $primary_nav_term_id = (int) $primary_nav->term_id;
  $menu_items= wp_get_nav_menu_items($primary_nav_term_id);
  if (!$menu_items || empty($menu_items)) {
     $pages = get_pages();
     foreach($pages as $page) {
        $item = array(
           'menu-item-object-id' => $page->ID,
           'menu-item-object' => 'page',
           'menu-item-type' => 'post_type',
           'menu-item-status' => 'publish'
        );
        wp_update_nav_menu_item($primary_nav_term_id, 0, $item);
     }
  }

}

?>