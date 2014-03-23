					<ul class="sidebar">
	
						<?php include('searchbox.php'); ?>
						
						<li class="categories">
							<h2><?php _e('Blog Categories', 'sandbox'); ?></h2>
							<ul>
								<?php wp_list_categories('child_of=' . $GLOBALS['blog_id'] . '&title_li=&show_count=0&hierarchical=1') ?> 
							</ul>
						</li>
						
							<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>	

							<li class="archives">
								<h2><?php _e('Archives', 'sandbox') ?></h2>
								<ul>
									<?php wp_get_archives('type=monthly') ?>
								</ul>
							</li>
							
							<?php endif; ?>
																
					</ul><!-- .sidebar -->
					<br class="dirtyLittleTrick" />