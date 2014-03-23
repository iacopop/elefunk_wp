<?php get_header(); ?>
		<div id="content" class="clearfix">
			<div id="left-col">
				<div id="left-top">
						<?php if (have_posts()) : ?>
							<div class="left-content">
							<h2 class="pink">Search Results</h2>
							
							<?php include (TEMPLATEPATH . '/searchform.php'); ?>
					
							<div class="navigation clearfix">
								<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
								<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
							</div>
					
					
							<?php while (have_posts()) : the_post(); ?>
					
								<div class="post">
									<h5 class="pink-links uppercase"><?php the_category(' ') ?></h5>
									<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
									<?php the_excerpt(); ?>
								</div>
					
							<?php endwhile; ?>
					
							<div class="navigation clearfix">
								<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
								<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
							</div>
							</div>
					
						<?php else : ?>
							<div class="left-content">
								<h2 class="pink">No posts found. Try a different search?</h2>
								<?php include (TEMPLATEPATH . '/searchform.php'); ?>
							</div>
								<br /><div class="divider"></div><br />
							<div class="inner-columns clearfix">
								<div class="left-left">
									<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=-".$category_id."&paged=$paged&showposts=2"); if (have_posts()) : ?>
										<?php while (have_posts()) : the_post(); $count++; ?>
											<?php if($count <= 2) : ?>
												<div class="post-fancy">
												<h5 class="uppercase light">Posted on <?php the_time('F j, Y'); ?> - by <?php the_author_posts_link(); ?></h5>
												<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
												<div class="category"><?php the_category(' ') ?></div>
            								
            								<?php if ( get_post_meta($post->ID,'image', true) ) { ?> <!-- DISPLAYS THE IMAGE URL SPECIFIED IN THE CUSTOM FIELD -->
                
                								<a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=<?php if ( get_option('woo_thumb_height') <> "" ) { echo get_option('woo_thumb_height'); } else { ?>100<?php } ?>&amp;w=<?php if ( get_option('woo_thumb_width') <> "" ) { echo get_option('woo_thumb_width'); } else { ?>100<?php } ?>&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" class="thumb-preview" /></a>          	
                
            								<?php } ?>																				
            								
												<?php the_excerpt(""); ?>
												</div>
											<?php else: ?>
												<div class="post-top">
												<h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
												<h5 class="pink-links">by <?php the_author_posts_link(); ?> on <?php the_time('F j, Y'); ?></h5>
												</div>
											<?php endif; ?>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
								<div class="left-right">
									<?php query_posts("cat=".$category_id."&showposts=3"); if (have_posts()) : ?>
										<?php while (have_posts()) : the_post(); $count++; ?>
										<div class="post">
											<h5 class="pink-links uppercase"><?php the_category(' ') ?></h5>
											<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
											<?php the_excerpt(); ?>
										</div>
										<?php endwhile; ?>
									<?php endif; ?>
									<a href="<?php echo get_category_link($category_id);?>" class="archives dark uppercase small georgia">View The Archives</a><br />
								</div>
							</div>
					
						<?php endif; ?>

				</div><div id="left-bottom"></div>
			</div>
			<div id="right-col">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
