<?php
/**
 * @package WordPress
 * @subpackage myWebBlog_Theme
 */
?>
					<ul id="sidebar">
					
						<?php 	/* Widgetized sidebar, if you have the plugin installed. */
							if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
						
						<li id="popular"><h4>Popular Posts</h4>
							<ul>
								<?php 
									global $wpdb, $post; 
									$getposts = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY comment_count DESC LIMIT 0,6" );
									
										foreach($getposts as $thepost) :
											$category = get_the_category( $thepost->ID );	
									?>
										<li>
											<p style="border-left:2px solid #<?php echo get_settings( 'woo_cat_color_' . $category[0]->cat_ID ); ?>;"><?php echo $thepost->post_title; ?></p>
											<a href="<?php echo get_permalink( $thepost->ID ); ?>"><?php echo $thepost->comment_count; ?> Replies</a>
										</li>
								<?php endforeach; ?>		
								
							</ul>
						</li><!-- End Popular Posts -->
						
						<li><h4>Archives</h4>
							<ul>
								<?php wp_get_archives('type=monthly'); ?>
							</ul>
						</li><!-- End archives -->
						
						<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
		
							<li><h4>Meta</h4>
							<ul>
								<?php wp_register(); ?>
								<li><?php wp_loginout(); ?></li>
								<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
								<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
								<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
								<?php wp_meta(); ?>
							</ul>
							</li>
						<?php } ?>
						
						<?php endif; ?>
						
					</ul><!-- End sidebar -->