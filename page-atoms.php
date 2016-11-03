<?php get_template_part( 'styleguide/styleguide', 'header' );


// Fonts

	$fonts_code = chemset_template_part( 'styleguide/examples/atoms', 'fonts' );

	chemset_pattern ( "Fonts", $fonts_code );


// Colors

	$colors_code = chemset_template_part( 'styleguide/examples/atoms', 'colors' );

	chemset_pattern ( "Colors", $colors_code );


// Headers

	$headers_code = chemset_template_part( 'styleguide/examples/atoms', 'headers' );

	chemset_pattern ( "Headers", $headers_code );


// Grouping Content

	$grouping_code = chemset_template_part( 'styleguide/examples/atoms', 'grouping' );

	chemset_pattern ( "Grouping Content", $grouping_code );


// Text Level

	$text_code = chemset_template_part( 'styleguide/examples/atoms', 'text' );

	chemset_pattern ( "Text Level", $text_code, '','There are a number of inline <abbr title="HyperText Markup Language">HTML</abbr> elements you may use anywhere within other elements.' );


// Lists

	$lists_code = chemset_template_part( 'styleguide/examples/atoms', 'lists' );

	chemset_pattern ( "Lists", $lists_code );


// Media

	$media_code = chemset_template_part( 'styleguide/examples/atoms', 'media' );

	chemset_pattern ( "Media", $media_code );


// Tables

	$tables_code = chemset_template_part( 'styleguide/examples/atoms', 'tables' );

	chemset_pattern ( "Tables", $tables_code );


// Forms

	$forms_code = chemset_template_part( 'styleguide/examples/atoms', 'forms' );

	chemset_pattern ( "Forms", $forms_code );


get_template_part( 'styleguide/styleguide', 'footer' ); ?>