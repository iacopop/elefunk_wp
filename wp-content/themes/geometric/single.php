<?php get_header(); ?>

<?php if ( get_option('woo_right_sidebar') == 'false' ) { get_sidebar(); } ?>

<div id="content" class="grid_12 <?php if ( get_option('woo_right_sidebar') == 'false' ) { echo 'omega'; } else { echo 'alpha'; } ?>">
		
	<div id="blog_large">
		
		<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

		<?php if ( is_portfolio() ) { ?>

			<div class="title">
				<h3>From my portfolio</h3>
			</div><!-- /title -->		
				
			<div class="post">
			
				<div class="portfolio_item">
			
				<div class="portfolio_thumb">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php woo_get_image('image',get_option('woo_portfolio_resizer'),'','','thumbnail'); ?></a>
				</div><!-- /portfolio_thumb -->
				
				<div id="detail_links" class="widget">
					
					<ul>
					<?php if ( get_post_meta($post->ID, "url", $single = true) <> "" ) { ?>
               	<li><a href="<?php echo get_post_meta($post->ID, "url", $single = true); ?>" title="Visit The Website">Website</a></li> 
					<?php } ?>						
					<?php if ( get_post_meta($post->ID, "preview", $single = true) <> "" ) { ?>
						<li style="margin: 0 !important;"><a href="<?php echo get_post_meta($post->ID, "preview", $single = true); ?>" title="Preview - <?php the_title(); ?>" rel="lightbox">Large Image</a></li>
					<?php } ?>					
					</ul>
				
				</div><!-- /detail_links -->
				
				<h2><?php the_title(); ?></h2>
				<div class="meta">Posted on <?php the_time('d F Y'); ?> by <?php the_author(); ?> <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span></div><!-- /meta -->

				<div class="entry">
					<?php the_content(); ?>
				</div><!-- /entry -->					
			
				</div><!-- /portfolio_item -->
				
				<div class="fix"></div>								
			
			</div><!--post-->
		
		<?php } else { ?>		

			<div class="title">
				<?php $title = get_option('woo_home_title'); ?>
				<h3><?php echo $title; ?></h3>
				<span class="rss"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rss.gif" alt="Subscribe to the RSS Feed" /></a></span>
				<div class="fix"></div>
			</div><!-- /title -->		
		
			<div class="post">
				
				<div class="category"><?php the_category(', '); ?></div><!-- /category -->
				
				<h2><?php the_title(); ?></h2>
				<div class="meta">Posted on <?php the_time('d F Y'); ?> by <?php the_author(); ?> <span class="comments"><a href="<?php comments_link(); ?>" title="View comments for this post"><?php comments_number('(0)','(1)','(%)'); ?></a></span></div><!-- /meta -->
				
				<div class="entry">
					<?php the_content(); ?>
					<?php the_tags(' <p><strong>Tags: </strong>', ', ' , '</p>'); ?>
				</div><!-- /entry -->
			
			</div><!-- /post -->
		
		<?php } ?>

		<div id="comments">
			<?php comments_template(); ?>
		</div><!-- /comments-->
		
		<?php endwhile; endif; ?>
		
		<div class="fix"></div>
	
	</div><!-- /blog_large -->
	
</div><!-- /content -->	

<?php if ( get_option('woo_right_sidebar') == 'true' ) { get_sidebar(); } ?>

<?php get_footer(); ?>