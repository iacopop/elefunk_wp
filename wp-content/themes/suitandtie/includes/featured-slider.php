		<div id="featured-slider">

					<?php 
						
						$featpages = get_option('woo_slider_pages');
						$featarr=split(",",$featpages);
						$featarr = array_diff($featarr, array(""));
						
						$i = 1;
						
						foreach ( $featarr as $featured_tab ) {
							
							query_posts('page_id=' . $featured_tab); while (have_posts()) : the_post();    

					?>		
               
                <div class="featured-slide" id="slide-<?php echo $i; $i++; ?>" <?php if($i >=3 ){echo 'style="display:none"';} ?>>
        
			        <div class="text">
			        
				        <h2><?php if ( get_post_meta($post->ID, "page_desc", $single = true) <> "" ) { echo get_post_meta($post->ID, "page_desc", $single = true); } else { the_title(); } ?></h2>
				        
				        <p><?php if ( get_post_meta($post->ID, "page_excerpt", $single = true) <> "" ) { echo get_post_meta($post->ID, "page_excerpt", $single = true); } else { the_excerpt(); } ?></p>

							<?php if ( get_post_meta($post->ID, "link_text", $single = true) <> "" and get_post_meta($post->ID, "link_link", $single = true) <> "" ) { ?>
							
							<p><a href="<?php echo get_post_meta($post->ID, "link_link", $single = true); ?>" title="<?php echo get_post_meta($post->ID, "link_text", $single = true); ?>"><?php echo get_post_meta($post->ID, "link_text", $single = true); ?></a></p>
				
							<?php } ?>							        
			        
			        </div><!-- /.text -->
			        
			        <?php if ( get_post_meta($post->ID, "image", $single = true) <> "" ) { ?>
			        
			        <div class="image">
				        
				       	<img src="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" alt="<?php the_title(); ?>" class="featured" />
				        
			        </div><!-- /.image -->
			        
			        <?php } ?>
                
                </div><!-- /.featured-slide -->
                
                <?php endwhile; } //endforeach ?>
			
			<div class="clear"></div>



		</div><!-- /#featured-slider -->
                    <div id="slider-nav">
            
            <div class="left">Slider navigation left arrow</div>
            <div class="right">Slider navigation right arrow</div>

            </div><!-- /#slider-nav -->
