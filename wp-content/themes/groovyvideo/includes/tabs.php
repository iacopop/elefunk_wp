			
				<ul id="features-tabs" class="clearfix">
					
					<li><a href="#tab-1">Most Popular</a></li>
					<li><a href="#tab-1">Highest Rated</a></li>
					<li><a href="#tab-1">Random</a></li>
                                                            
				</ul><!-- End features-tabs -->
			
				<div id="features-top"></div><!-- End features-top -->
				
				<div id="features">
																
						<div id="tab-1" class="clearfix">
					
							<div class="left <?php if(get_post_meta($post->ID, "image", $single = true) != "") { ?>double <?php } ?>">
								<?php if ( get_post_meta($post->ID, "excerpt", $single = true) <> "" ) { echo '<p>' . stripslashes( get_post_meta($post->ID, "excerpt", $single = true) ) . '</p>'; } else { the_content(); } ?>
							</div>
																				
						</div>
										
				</div><!-- End features -->
