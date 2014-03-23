<div class="col2">

	<?php include(TEMPLATEPATH . '/includes/stylesheet.php'); ?>
	
	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">

		<div id="search">

			<input type="text" value="Enter your search keywords here..." onclick="this.value='';" name="s" id="s" />
			<input name="" type="image" src="<?php bloginfo('stylesheet_directory'); ?>/styles/<?php echo "$style_path"; ?>/btn-search.gif" value="Go" class="btn"  />

		</div><!--/search -->
				
	</form>
    
    <div class="fix"></div>

	<?php include('ads/ads-management.php'); ?>

	<?php include('ads/ads-top.php'); ?>			

	<div class="sideTabs">
	
		<ul class="idTabs">
			<li><a href="#pop">POPULAR</a></li>
			<li><a href="#comm">COMMENTS</a></li>
			<li><a href="#feat">FEATURED</a></li>
			<li class="last"><a href="#tagcloud">TAG CLOUD</a></li>
		</ul>
	
	</div><!--/sideTabs-->
	
	<div class="box">
		<div class="spacer">

			<ul class="list1" id="pop">
                <?php include(TEMPLATEPATH . '/includes/popular.php' ); ?>                    
			</ul>
			
			<ul class="list1" id="comm">
                <?php include(TEMPLATEPATH . '/includes/comments.php' ); ?>                    
			</ul>	

			<ul class="list1" id="feat">
				<?php 
					$featuredcat = get_option('woo_featured_category'); // ID of the Featured Category				
					$the_query = new WP_Query('category_name=' . $featuredcat . '&showposts=10&orderby=post_date&order=desc');	
					while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
				?>
				
					<li><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
				
				<?php endwhile; ?>		
			</ul>
	
			<?php if (function_exists('wp_tag_cloud')) { ?>
			
				<span class="list1" id="tagcloud">
					<?php wp_tag_cloud('smallest=10&largest=18'); ?>
				</span>
			
			<?php } ?>					
			
		</div><!--/spacer -->
		<div class="box-bot"></div>
	</div><!--/box -->

	<?php
		
		$showvideo = get_option('woo_show_video');
	
		if($showvideo){ include(TEMPLATEPATH . '/includes/video.php'); }
				
	?>
			
	<div class="subcol">
		
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>		

		<h2>Categories</h2>
		<ul class="list3">
			<?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
		</ul>	

   	<?php endif; ?>

	</div><!--/subcol-->

	<div class="subcol">
		
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>		

		<h2>Archives</h2>
		<ul class="list3">
			<?php wp_get_archives('type=monthly&show_post_count=1') ?>		
		</ul>

   	<?php endif; ?>

	</div><!--/subcol-->

	<div class="subcol last">
		
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(3) ) : else : ?>		
    
		<h2>Related Sites</h2>
		<ul class="list3">
			<?php get_links('-1','<li>','</li>'); ?>	
		</ul>	
    
   	<?php endif; ?>

	</div><!--/subcol-->		
		
	<?php include('ads/ads-bottom.php'); ?>
		
</div><!--/col2-->
