<ul id="right-col">
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
	
	<li><h5>About Me</h5>
		<?php echo stripslashes(get_option('woo_bio')); ?>
	</li>
						
	<li id="ads"><h5>Advertisments</h5>
		<?php include(TEMPLATEPATH . '/ads/ads.php'); ?>
	</li>
							
	<li id="lifestream"><h5>Lifestream</h5>
		<ul>
			<?php lifestream_sidebar_widget(); ?>
		</ul>
	</li>
	
	<?php endif; ?>		
	
</ul>