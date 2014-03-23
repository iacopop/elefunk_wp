<div id="featured" class="slider">

	<div id="slider">
    
    <img class="scrollButtons left arrow_left" src="<?php bloginfo('stylesheet_directory'); ?>/img/sliderarrow_left.png" alt="left"/>
    
  		<!-- element with overflow applied -->
  		<div class="scroll">

    		<!-- the element that will be scrolled during the effect -->
    		<div class="scrollContainer" style="width: 10000px;">

      			<!-- our individual panels -->

					<?php 
						
						$featpages = get_option('woo_tabber_pages');
						$featarr=split(",",$featpages);
						$featarr = array_diff($featarr, array(""));
						
						$i = 1;
						
						foreach ( $featarr as $featured_tab ) {

					?>
						
					<?php query_posts('page_id=' . $featured_tab); while (have_posts()) : the_post();
                    ?>      			

							<div class="information information-<?php echo $i; ?> "  id="panel-<?php echo $i; $i++; ?>">
				
								<div class="text">
								
									<div class="entry">
										
										<?php the_content(); ?>

										<?php if ( get_post_meta($post->ID, "button_text", $single = true) <> "" and get_post_meta($post->ID, "button_link", $single = true) <> "" ) { ?>
				
											<div class="feat-button">
											<span class="left"></span>
											<a class="more-info" href="<?php echo get_post_meta($post->ID, "button_link", $single = true); ?>" title="<?php echo get_post_meta($post->ID, "button_text", $single = true); ?>"><?php echo get_post_meta($post->ID, "button_text", $single = true); ?></a>
											<span class="right"></span>
											</div><!-- /feat-button -->
				
										<?php } ?>										
										
									</div><!-- /.entry -->
					
								</div><!-- /text -->
			
							</div><!-- /information -->

					<?php endwhile; ?>
						
					<?php
				
						// End Features Loop
						}
			
					?>										
      
    		</div><!-- /scrollContainer -->

  		</div><!-- /scroll -->
        
    <img class="scrollButtons right arrow_right" src="<?php bloginfo('stylesheet_directory'); ?>/img/sliderarrow_right.png" alt="right" />

	</div><!-- /slider -->

</div><!-- /featured -->	