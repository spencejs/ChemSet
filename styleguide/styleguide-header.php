<!DOCTYPE html>
<html lang="en-us">

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<?php wp_head(); ?>

	<link href="<?php echo get_template_directory_uri(); ?>/styleguide/prism.css" rel="stylesheet" />

</head>

<body <?php body_class('style-guide'); ?>>

	<div class="style-guide-nav">

		<span class="style-guide-name"><?php bloginfo('name'); ?> Style Guide</span>

		<?php // List Child Pages of Style Guide
		if($post->post_parent)
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
		else
			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
			if ($children) { ?>
			<ul class="sectionlist">
				<?php echo $children; ?>
			</ul>
		<?php } ?>
	</div>

	<div class="style-guide-body">

		<header class="style-guide-header">

			<h1 class="style-guide-page-title"><?php the_title(); ?></h1>

			<p class="callout">
				<?php if ( is_page( 'atoms' ) ){
					echo 'Basic markup and typographic styles.';
				} elseif ( is_page( 'molecules' ) ){
					echo 'Reusable bits and bobs.';
				} elseif ( is_page( 'organisms' ) ){
					echo 'Larger reusable design patterns.';
				} ?>
			</p>
		</header>

		<main role="main" class="style-guide-main">