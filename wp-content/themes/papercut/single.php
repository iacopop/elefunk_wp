<?php get_header(); ?>
		
		<div id="content" class="clearfix">
			
			<div id="left-col">
				
				<div id="left-top">
					
					<div class="left-content">
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<h5 class="uppercase light">Posted on <?php the_time('F j, Y'); ?> - by <?php the_author_posts_link(); ?></h5>
								<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<div class="category clearfix"><?php the_category(' ') ?></div>

            					<?php if ( get_option('woo_image_disable') == 'false' ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
                
                						<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),'thumb alignleft'); ?>
                
            					<?php } ?>

								<?php the_content(); ?>
					</div><!--/left-content-->
					
					<div class="featured">
						
						<div class="left-content-blank">
							This entry was posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>	and is filed under <?php the_category(', ') ?>.	You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed.		
							
							<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) { ?>
									You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.
							<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { ?>
									Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.
					
							<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?>
									You can skip to the end and leave a response. Pinging is currently not allowed.
					
							<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?>
									Both comments and pings are currently closed.
			
							<?php } edit_post_link('Edit this entry.','',''); ?>
						</div><!--/left-content-blank-->
					
					</div><!--/featured-->
					
					<?php comments_template(); ?>
							
							<?php endwhile; ?>
						<?php else:  ?>
								
								<h2 class="pink"><span class="georgia">404</span> - Page Not Found</h2>
							</div>
					
					<div class="inner-columns clearfix">
						
						<div class="left-left">
							
								<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=-".$category_id."&paged=$paged"); if (have_posts()) : ?>
								<?php while (have_posts()) : the_post(); $count++; ?>
								
								<?php if ( $GLOBALS['exclude'] <> $post->ID ) { ?> 
								
								<div class="post">
									<?php if($count <= 3) : ?>
										<h5 class="uppercase light">Posted on <?php the_time('F j, Y'); ?> - by <?php the_author_posts_link(); ?></h5>
										<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										<div class="category"><?php the_category(' ') ?></div>
										<?php the_content(""); ?>
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
									<?php the_excerpt(); ?>
								</div>
								<?php endwhile; ?>
							<?php endif; ?>
							
							<?php } ?>
							
							<a href="<?php echo get_option('woo_archives_page') . '/'; ?>" class="archives dark uppercase small georgia">View The Archives</a><br />
						
						</div><!--/left-right-->
					
					</div><!--inner-columns-->
					
					<?php endif; ?>
				
				</div><!--left-top-->
				
				<div id="left-bottom"></div>
			
			</div><!--left-col-->
			
			<div id="right-col">
				<?php get_sidebar(); ?>
			</div><!--right-col-->
			
		</div><!--content-->
		
</div><!--content-back-->
	
<?php get_footer(); ?>