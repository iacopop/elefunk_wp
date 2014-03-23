<?php get_header(); ?>
		<div id="content" class="clearfix">
			<div id="left-col">
				<div id="left-top">
					<div class="left-content">
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>
								<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>
								<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /><?php echo basename($post->guid); ?></p>
								<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
								<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					</div>
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
						</div>
					</div>
					<?php comments_template(); ?>
							<?php endwhile; ?>
						<?php else:  ?>
								<h2 class="pink"><span class="georgia">404</span> - Page Not Found</h2>
							</div>
							<div class="inner-columns clearfix">
								<div class="left-left">
									<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=-".$category_id."&paged=$paged&showposts=2"); if (have_posts()) : ?>
										<?php while (have_posts()) : the_post(); $count++; ?>
											<?php if($count <= 2) : ?>
												<div class="post-fancy">
												<h5 class="uppercase light">Posted on <?php the_time('F j, Y'); ?> - by <?php the_author_posts_link(); ?></h5>
												<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
												<div class="category"><?php the_category(' ') ?></div>
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