<?php get_header(); ?>

<div id="content" class="clearfix">
	
	<div id="left-col">
			
			<div id="left-top">
					
					<div class="left-content">
							
							<?php $featured = new WP_Query('category_name='.get_option('woo_featured_category').'&showposts=1&order=DESC'); ?>
							<?php while ($featured->have_posts()) : $featured->the_post(); ?>
								
								<div class="clearfix">
									
									<h5 class="uppercase light">Posted on <?php the_time('F j, Y'); ?> - by <?php the_author_posts_link(); ?></h5>
									<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									
									<div class="category clearfix"><?php the_category(' ') ?></div>

            					<?php woo_get_image('image',get_option('woo_image_width'),get_option('woo_image_height'),'thumb alignleft'); ?>

									<?php $GLOBALS['exclude'] = $post->ID; ?>             														
            
									<?php if ( get_option('woo_content_feat') == 'true' ) { the_content(); } else { the_excerpt(); } ?>
									
								</div>
							
							<?php endwhile; ?>
					
					</div><!--/left-content-->
					
					<?php include('ads/ad468x60.php'); ?>
					
					<div class="divider"></div>
					
					<div class="inner-columns clearfix">
						
						<div class="left-left">
							
								<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=-".$category_id."&paged=$paged"); if (have_posts()) : ?>
								<?php while (have_posts()) : the_post(); $count++; ?>
								
								<?php if ( $GLOBALS['exclude'] <> $post->ID ) { ?> 
								
								<div class="post">
									<?php if($count <= get_option('woo_home_secondary')) : ?>
										<h5 class="uppercase light">Posted on <?php the_time('F j, Y'); ?> - by <?php the_author_posts_link(); ?></h5>
										<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										<div class="category"><?php the_category(' ') ?></div>
            					<?php if ( get_post_meta($post->ID,'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
                
                						<a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_thumb_height') <> "" ) { echo get_option('woo_thumb_height'); } else { ?>100<?php } ?>&amp;w=<?php if ( get_option('woo_thumb_width') <> "" ) { echo get_option('woo_thumb_width'); } else { ?>100<?php } ?>&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" class="thumb-preview" /></a>          	
                
            					<?php } ?>										
										<?php if ( get_option('woo_content_left') == 'true' ) { the_content(); } else { the_excerpt(); } ?>
									<?php else: ?>
										<h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
										<h5 class="pink-links">by <?php the_author_posts_link(); ?> on <?php the_time('F j, Y'); ?></h5>
									<?php endif; ?>
								</div><!--/post-->
								
								<?php } ?>
								
								<?php endwhile; ?>
									
									<div class="navigation clearfix">
										<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
										<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
									</div>
							
							<?php endif; ?>
						
						</div><!--/left-left-->
						
						<div class="left-right">
							
							<?php $getcats = get_categories('hierarchical=0&hide_empty=0&include=' . get_inc_categories("woo_cat_mid_")); ?>
							
							<?php foreach ( $getcats as $cat ) { ?>
							
							<?php query_posts("cat=".$cat->cat_ID."&showposts=" . get_option('woo_cat_list') ); if (have_posts()) : ?>
								<?php while (have_posts()) : the_post(); $count++; ?>
								<div class="post">
									<h5 class="pink-links uppercase"><?php the_category(' ') ?></h5>
									<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
									<?php if ( get_option('woo_content_mid') == 'true' ) { the_content(); } else { the_excerpt(); } ?>
								</div>
								<?php endwhile; ?>
							<?php endif; ?>
							
							<?php } ?>
							
                            <?php
                            $archives = get_option('woo_archives'); // Name of the archives page
                            $GLOBALS['archives_id'] = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$archives'");
							?>
                            
							<a href="<?php echo bloginfo('wpurl').'/?page_id='.$GLOBALS['archives_id']; ?>" class="archives dark uppercase small georgia">View The Archives</a><br />
						
						</div><!--/left-right-->
					
					</div><!--inner-columns-->
					
				</div><!--left-top-->
				
				<div id="left-bottom"></div>
				
	</div><!--left-col-->
			
	<div id="right-col">
		<?php get_sidebar(); ?>
	</div>
			
</div><!--content-->

</div><!--content-back-->

<?php get_footer(); ?>
