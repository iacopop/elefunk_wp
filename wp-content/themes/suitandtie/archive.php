<?php get_header(); ?>
	  
    <div id="blog-heading">
		
			<div class="title">
				
				<?php if (is_category()) { ?><h2 class="arh">Archive for '<?php echo single_cat_title(); ?>'</h2>
				<?php } elseif (is_day()) { ?><h2 class="arh">Archive for <?php the_time('F jS, Y'); ?></h2>
				<?php } elseif (is_month()) { ?><h2 class="arh">Archive for <?php the_time('F, Y'); ?></h2>
				<?php } elseif (is_year()) { ?><h2 class="arh">Archive for the year <?php the_time('Y'); ?></h2>
				<?php } elseif (is_author()) { ?><h2 class="arh">Archive by Author</h2>
				<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><h2 class="arh">Archives</h2>
				<?php } elseif (is_tag()) { ?><h2 class="arh">Tag Archives: <?php echo single_tag_title('', true); }?></h2>	
			
			</div><!-- /.title -->
			
			<div class="clear"></div>
			
			<div id="breadcrumbs">
			
				<?php yoast_breadcrumb('<p>','</p>'); ?>
			
			</div><!-- /#slider-nav -->
		
		</div><!-- /#featured-slider -->
		
		<div id="content-border">
		<div id="content">
		<div id="content-tile">
		
			<div id="main" class="grid_10 alpha">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<div class="post archive entry">
						
						<div class="post-head">
						
							<div class="date">
								<span class="month"><?php the_time('M'); ?></span> <span class="day"><?php the_time('d'); ?></span>
							</div><!-- /.date -->
							
							<div class="title">
								
								<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
								
								<p class="meta">
									<span class="comments"><a href="<?php comments_link(); ?>" title="Comment on this post"><?php comments_number('0','1','%'); ?> Comments</a><span class="bg"></span></span>
									<span class="cat">Written by <em><?php the_author_posts_link(); ?></em> in <em><?php the_category(', ') ?></em></span>
								</p>
								
							</div><!-- /.title -->
							
						</div><!-- /.post-head -->
						
						<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),'thumb alignleft'); ?>
						
						<?php
					
						if ( get_option('woo_the_content') ) 
									the_content('[...]'); 
								else 
									the_excerpt(); 
					
						?>
						
					</div><!-- /.entry -->
			
				<?php endwhile; ?>
					
					<div class="pagenavi">
						<?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
					</div>
					
				<?php endif; ?>  
			
			</div><!-- /#main -->

			<?php get_sidebar(); ?>

<?php get_footer(); ?>