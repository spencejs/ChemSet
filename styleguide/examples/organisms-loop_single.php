<?php wp_reset_query();

$list_query = new WP_Query( array (
	'post_type' => 'post',
	'posts_per_page'=>1,
) );

if ( $list_query->have_posts() ) :

	while ( $list_query->have_posts() ) : $list_query->the_post();

		get_template_part('organisms/loop', 'single' );

	endwhile;
endif;

wp_reset_query();