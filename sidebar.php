<aside class="sidebar">
<?php /*
	<div class="ads clearfix">
		<p class="declare">
			<?php _e('Реклама'); ?>
		</p>
		<p class="adorder">
			<a href="/reklamirujjtes-s-nami/">
				<?php _e('Рекламодателям'); ?>
			</a>
		</p>
		<div class="ads_250"></div>
		<div class="ads_250"></div>

	</div>
*/ ?>
		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<?php endif; ?>
		</ul>
</aside>

