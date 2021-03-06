<?php get_header(); ?>

<main role="main">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

		</article>

	<?php endwhile; endif; ?>
</main>

<?php get_template_part( 'organisms/sidebar' ); ?>
<?php get_footer(); ?>