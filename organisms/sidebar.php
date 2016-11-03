<aside role="complementary" class="sidebar">
	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>

		<?php if ( function_exists('dynamic_sidebar') ) dynamic_sidebar( 'primary-widget-area' ); ?>

	<?php else : ?>

		<section class="archives widget">
			<h2 class="widget-title"><?php _e( 'Archives', 'chemset' ); ?></h2>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</section>

		<section class="meta widget">
			<h2 class="widget-title"><?php _e( 'Meta', 'chemset' ); ?></h2>
			<ul>
				<li><?php wp_register(); ?></li>
				<li><?php wp_loginout(); ?></li>
				<li><?php wp_meta(); ?></li>
			</ul>
		</section>

	<?php endif; ?>
</aside>