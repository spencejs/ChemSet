<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php get_template_part('molecules/part', 'head_meta'); ?>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php get_template_part('organisms/site', 'header'); ?>
