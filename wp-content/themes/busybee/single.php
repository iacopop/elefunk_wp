<?php get_header(); ?>

	<!-- Middle Starts -->
	<div id="middle-out-top">
	<div id="middle-out-bottom">
	<div id="middle-content" class="single">
	<div id="middle-content-bottom">
		<!-- Content Starts -->
		<div id="content" class="wrap">
			<div class="col-left">
				<div id="main-content">
				
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				
                    <!-- Single Post Starts -->
					<div class="page post wrap">


						<?php if (get_option('woo_image_single') == "false") woo_get_image('image',get_option('woo_single_width'),get_option('woo_single_height'),'thumbnail alignright'); ?>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<p class="post-details">Posted on <?php the_time('d. M, Y'); ?> by  <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></p>
						
						<?php if ( in_category($GLOBALS[vid_cat]) ) echo woo_get_embed('embed','550','360'); ?>                        
						<?php the_content(); ?>
						<?php the_tags('<p class="tags">Tags: ', ', ', '</p>'); ?>

					</div>
                    <!-- Single Post Ends -->
					
                    <!-- Content Ad Starts -->
                    <?php if (get_option('woo_ad_content_disable') == "false") include (TEMPLATEPATH . "/ads/content_ad.php"); ?>
                    <!-- Content Ad Ends -->
						
				</div>
				
				<div id="comments">
				
					<?php comments_template(); ?>
				
					<?php endwhile; else: ?>
					<p>Sorry, no posts matched your criteria.</p>
					<?php endif; ?>
					
				</div>
				
			</div>
			
			<div class="col-right">
				<?php get_sidebar(); ?>
			</div>
		</div>
		<!-- Content Ends -->
	</div>
	</div>
	</div>
	</div>
	<!-- Middle Ends -->
	<?php get_footer(); ?>