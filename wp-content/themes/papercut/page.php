<?php
	$category_name = "Uncategorized";
	$category_id = 1;
?>
<?php get_header(); ?>
		<div id="content" class="clearfix">
			<div id="left-col">
				<div id="left-top">
					<div class="left-content">
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<h2><?php the_title(); ?></h2>
								<div class="divider"></div><br />
								<?php the_content(); ?>
						<?php endwhile; else: ?>
							<h2 class="pink"><span class="georgia">404</span> - Page Not Found</h2>						
						<?php endif; ?>
					</div>
					<?php include('ads/ad468x60.php'); ?>
					<div class="divider"></div>
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
				</div><div id="left-bottom"></div>
			</div>
			<div id="right-col">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>