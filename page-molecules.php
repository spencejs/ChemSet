<?php get_template_part( 'styleguide/styleguide', 'header' );


	// Main Logo

	$logo_code = chemset_template_part( 'molecules/part', 'header_logo' );

	chemset_pattern ( "Header Logo", $logo_code, "get_template_part( 'molecules/part', 'header_logo' );" );


	// Main Nav

	$main_nav = chemset_template_part( 'molecules/part', 'main_nav' );

	chemset_pattern ( "Main Nav", $main_nav,"get_template_part( 'molecules/part', 'main_nav' );" );


	// Not Found

	$not_found = chemset_template_part( 'molecules/part', 'not_found' );

	chemset_pattern ( "Not Found", $not_found,"get_template_part( 'molecules/part', 'not_found' );", "The 404 / not found message." );


get_template_part( 'styleguide/styleguide', 'footer' ); ?>