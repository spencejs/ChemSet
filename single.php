<?php get_header(); ?>

<main role="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('organisms/loop', 'single'); ?>
	<?php endwhile; endif; ?>
</main>

<?php get_template_part( 'organisms/sidebar' ); ?>
<?php get_footer(); ?>