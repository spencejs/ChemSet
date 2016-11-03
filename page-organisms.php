<?php get_template_part( 'styleguide/styleguide', 'header' );


// Header

	$header_code = chemset_template_part( 'organisms/site', 'header' );

	chemset_pattern ( "Site Header", $header_code, "get_template_part( 'organisms/site', 'header' );", "The primary header of the site." );


// Footer

	$footer_code = chemset_template_part( 'organisms/site', 'footer' );

	chemset_pattern ( "Site Footer", $footer_code, "get_template_part( 'organisms/site', 'footer' );", "The primary footer of the site." );


// Sidebar

	$sidebar_code = chemset_template_part( 'organisms/sidebar' );

	chemset_pattern ( "Sidebar", $sidebar_code, "get_template_part( 'organisms/site', 'sidebar' );", "A widgetized sidebar content area." );


// loop-list

	$loop_list_code = chemset_template_part( 'styleguide/examples/organisms', 'loop_list' );

	chemset_pattern ( "Post List", $loop_list_code, "get_template_part( 'organisms/footer' );", "A listing view of blog posts." );


// loop-Single

	$loop_single_code = chemset_template_part( 'styleguide/examples/organisms', 'loop_single' );

	chemset_pattern ( "Single Post", $loop_single_code, "get_template_part( 'organisms/footer' );", "A single detail-page for a blog post." );


get_template_part( 'styleguide/styleguide', 'footer' ); ?>