		<div id="featured">

			<?php 
						
				$featpages = get_option('woo_tabber_pages');
				$featarr=split(",",$featpages);
				$featarr = array_diff($featarr, array(""));
						
				$i = 1;
						
				foreach ( $featarr as $featured_tab ) {

			?>
						
			<?php query_posts('page_id=' . $featured_tab); while (have_posts()) : the_post(); ?>
			
			<div id="tab-<?php echo $i; $i++; ?>" class="information" <?php if ( $i > 2 ) { echo 'style="display:none;"'; } ?>>
			
				<div class="entry">
					<?php the_content(); ?>
				</div><!-- /.entry -->
				
				<?php if ( get_post_meta($post->ID, "button_text", $single = true) <> "" and get_post_meta($post->ID, "button_link", $single = true) <> "" ) { ?>
				
					<div class="feat-button">
						<span class="left"></span>
						<a class="more-info" href="<?php echo get_post_meta($post->ID, "button_link", $single = true); ?>" title="<?php echo get_post_meta($post->ID, "button_text", $single = true); ?>"><?php echo get_post_meta($post->ID, "button_text", $single = true); ?></a>
						<span class="right"></span>
					</div><!-- /feat-button -->
				
				<?php } ?>
			
			</div><!-- /information -->
		
			<?php endwhile; ?>
						
			<?php
				
				// End Features Loop
				}
			
			?>							
			
				<ul id="featured-tabs">
				
					<?php 
						
						$featpages = get_option('woo_tabber_pages');
						$featarr=split(",",$featpages);
						$featarr = array_diff($featarr, array(""));
						
						$i = 1;
						
						foreach ( $featarr as $featured_tab ) {

					?>
						
							<?php query_posts('page_id=' . $featured_tab); while (have_posts()) : the_post(); ?>
								<li><a href="#tab-<?php echo $i; ?>"><?php the_title(); ?> <span class="description"><?php if ( get_post_meta($post->ID, "page_desc", $single = true) <> "" ) { echo get_post_meta($post->ID, "page_desc", $single = true); } else { echo '&nbsp;'; } ?></span></a></li>
							<?php endwhile; ?>
					
					<?php
						$i++;
						}
					?>
										
				</ul>	<!-- /featured-tabs -->
			
		</div><!-- /featured -->
