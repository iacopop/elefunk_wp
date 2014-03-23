	<ul id="sidebar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>

			<?php wp_list_pages('title_li=<h4>Pages</h4>' ); ?>

			<li><h4>Archives</h4>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

			<?php wp_list_categories('show_count=1&title_li=<h4>Categories</h4>'); ?>			

			<?php endif; ?>
		</ul>

