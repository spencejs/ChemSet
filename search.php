<?php get_header(); ?>

<main role="main">
	<h1><?php _e( 'Search for: ', 'chemset' ); the_search_query(); ?></h1>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('organisms/loop', 'list'); ?>
		<?php endwhile; ?>

		<?php get_template_part('molecules/part', 'pagination'); ?>

	<?php else : ?>

		<?php get_template_part('molecules/part', 'not_found'); ?>

	<?php endif; ?>
</main>

<?php get_template_part( 'organisms/sidebar' ); ?>
<?php get_header(); ?>