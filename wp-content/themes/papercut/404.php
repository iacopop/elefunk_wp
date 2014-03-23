<?php get_header(); ?>
		
		<div id="content" class="clearfix">
			
			<div id="left-col">
				
				<div id="left-top">
					
					<div class="left-content">
						<h2 class="pink">404 - Page Not Found</h2> <h4 class="light" style="margin-top:20px;margin-bottom:20px;">Perhaps the links below might help you find what you are after:</h4>
					</div><!--/left-content-->
					
					<div class="featured">
						<img src="<?php bloginfo('template_directory'); ?>/images/468x60.gif" alt="Ad" />
					</div><!--/featured-->
					
					<div class="divider"></div>
					
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
					
				</div><!--left-top-->
				
				<div id="left-bottom"></div>
				
	</div><!--left-col-->
			
	<div id="right-col">
		<?php get_sidebar(); ?>
	</div>
			
</div><!--content-->

</div><!--content-back-->

<?php get_footer(); ?>