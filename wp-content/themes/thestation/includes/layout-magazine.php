	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
	<?php $count = 0; ?>

	<?php if ( $paged == 1 ) { include( TEMPLATEPATH . '/includes/featured-post-slider.php' ); } ?>
		
		<div class="clear"></div>
		
		<div id="main_content">
		
			<div id="recent_articles">
				
				<h2 class="heading">Recent Articles</h2>

				<?php $count = 0; $i = 0; ?>
				
				<?php while (have_posts()) : the_post(); $count++; $i++; ?>				
				
				<div class="article <?php if ( $count%2 == 0) { ?>right<?php } else { ?>left<?php } ?>">
				
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
					<p class="meta"><?php the_category(', '); ?> // <?php the_time('d.m.Y'); ?></p>
					
					<p class="comments"><a href="<?php comments_link(); ?>" title="Comments on <?php the_title(); ?>"><?php comments_number('0','1','%'); ?></a></p>
					
					<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),'thumb'); ?>
					
					<p><?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Continue &rarr;</a></p>
				
				</div><!-- /.article -->
				
				<?php if ( $i == 2 ) { $i = 0; ?><div class="clear"></div><?php } ?>
			
			<?php if ( $count == get_option( 'woo_mag_secondary' ) ) { break; } ?>	

			<?php endwhile; ?>				
				
			</div><!-- /#recent_articles -->
			
			<div class="clear"></div>
			
            <?php if(get_option('woo_ad_content_disable') == 'false') {?> 
			<div id="adbox">
				<?php include( TEMPLATEPATH . '/includes/ad-468x60.php' ); ?>
			</div><!-- /#adbox -->
             <?php } else { echo '<div style="border-bottom:1px solid #CBD1D2"></div>';  } ?>    
			
			<div id="bottom">
			
				<div id="more_articles">
					
					<h2 class="heading">More Articles</h2>
					
					<ul>
						<?php while (have_posts()) : the_post(); ?>			
						<li>
							<?php woo_get_image('image',get_option('woo_smallthumb_width'),get_option('woo_smallthumb_height'),'smallthumb'); ?>
							
							<div class="posttitle">
								<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
								<p class="meta"><?php the_category(', '); ?> // <?php the_time('d.m.Y'); ?></p>
							</div><!-- /.posttitle -->
							
							<p class="comments"><a href="<?php comments_link(); ?>" title="Comments on <?php the_title(); ?>"><?php comments_number('0','1','%'); ?></a></p>
						</li>
						<?php endwhile; ?>			
					</ul>
				
				</div><!-- /#more_articles -->
				
				
				<div id="widget_area" class="right">
					
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Magazine' ) ) : ?>
			
					<?php endif; ?>
					
				</div><!-- /#widget_area -->
			
			</div><!-- /#bottom -->
			
			<div class="clear" style="height: 20px;"></div>

			<div class="pagenavi">
				<?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
			</div>			
			
		</div><!-- /main_content -->
		
		<?php get_sidebar(); ?>
		
		<div class="clear"></div>