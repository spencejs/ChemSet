<!-- Conditional for Single Pages -->
<?php if (is_single()) {
	if (have_posts()) : while (have_posts()) : the_post(); ?>
		<html ⚡>
		<meta name="description" content="<?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?>"/>
		<link rel="canonical" href="<?php the_permalink(); ?>"

		<!-- Facebook Open Graph Meta for Single Posts -->
		<meta property="og:image" content="<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); echo $thumb['0']; ?> "/>
		<meta property="og:description" content="<?php $excerpt = strip_tags(get_the_excerpt()); echo $excerpt; ?>"/>
		<?php if ( has_post_thumbnail() ) {
			$thumb_id = get_post_thumbnail_id();
			$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); ?>
			<meta property="og:image" content="<?php echo $thumb_url[0]; ?>" />
		<?php } ?>
	<?php endwhile; endif; ?>
<?php } else { ?>
	<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php } ?>


<!-- Facebook OpenGraph Meta -->
<meta property="og:type" content="<?php if(is_single()){ echo 'article'; } else {echo 'blog';} ?>"/>
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="og:title" content="<?php wp_title(''); ?>"/>


<!-- Set icons if they exist -->
<?php if ( file_exists(TEMPLATEPATH .'/favicon.ico') ) : ?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<?php endif; ?>
<?php if ( file_exists(TEMPLATEPATH .'/apple-touch-icon.png') ) : ?>
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png" />
<?php endif; ?>
<meta name="msapplication-TileColor" content="#ee372e">
<?php if ( file_exists(TEMPLATEPATH .'/win8-tile-icon.png') ) : ?>
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/win8-tile-icon.png">
<?php endif; ?>