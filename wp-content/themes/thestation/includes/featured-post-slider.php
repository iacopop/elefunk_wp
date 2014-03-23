<div id="featured" class="slider">

	<div id="slider">
    
    <img class="scrollButtons left arrow_left" src="<?php bloginfo('stylesheet_directory'); ?>/img/sliderarrow_left.png" alt="left"/>

  		<!-- element with overflow applied -->
  		<div class="scroll">

    		<!-- the element that will be scrolled during the effect -->
    		<div class="scrollContainer" style="width: 10000px;">

      			<!-- our individual panels -->
      			
      			<?php while (have_posts()) : the_post(); $count++;?>

							<div class="information information-<?php echo $count; ?> "  id="panel-<?php  $i++; echo $i; ?>">         
				
								<div class="image left">
				
									<?php woo_get_image('image',get_option('woo_feat_width'),get_option('woo_feat_height'),'featured'); ?>
				
								</div><!-- /image -->
				
								<div class="text">
			
									<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
									<span class="description"><?php the_category(', '); ?> // <?php the_time('d.m.Y'); ?></span>
					
									<div class="entry">
											
											<?php the_excerpt(); ?>

											<div class="feat-button">
											<span class="left"></span>
											<a class="more-info" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read Full Article</a>
											<span class="right"></span>
											</div><!-- /feat-button -->
										
									</div><!-- /.entry -->
					
								</div><!-- /text -->
			
							</div><!-- /information -->
	
					<?php if ( $count == get_option( 'woo_mag_featured' ) ) { break; } ?>
					
					<?php endwhile; ?>
      
    		</div><!-- /scrollContainer -->

  		</div><!-- /scroll -->
        
      <img class="scrollButtons right arrow_right" src="<?php bloginfo('stylesheet_directory'); ?>/img/sliderarrow_right.png" alt="right" />

	</div><!-- /slider -->

</div><!-- /featured -->	
