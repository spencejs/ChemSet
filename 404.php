<?php get_header(); ?>

<main role="main">

	<h1><?php _e('Sorry, there is nothing here.', 'chemset'); ?></h1>
	<p><?php _e( 'The page you requested could not be found. Perhaps searching will help.', 'chemset' ); ?></p>
	<?php get_search_form(); ?>

</main>

<?php get_template_part( 'organisms/sidebar' ); ?>
<?php get_footer(); ?>