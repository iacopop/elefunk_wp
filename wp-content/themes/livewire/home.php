<?php get_header(); ?>

		<div class="col1_home">
			
			<div class="col1_home_box">
				<?php include(TEMPLATEPATH . '/includes/featured.php'); ?>
         </div><!--/col1_home_nox-->
			
         <div class="col1_home_box">
				<?php
					$layout = get_option('woo_layout');
					include('layouts/'.$layout);			
				?>
          </div><!--/col1_home_box-->
            
          <?php
				// Display Video
				include(TEMPLATEPATH . '/includes/video.php'); 
			?>

		</div><!--/col1_home-->
        
        <div class="col_mid_home">
        
        	<div class="mid_box">

	<?php
		
		$count = 0;
		$duplicated = array();
		$excluding = get_option('woo_mid_exclude'); // Categories to exclude
		
		$cats = get_categories('exclude='. $ex_feat . ',' . $ex_vid. ',' . $excluding );
		foreach ($cats as $cat) {
		
		$the_query = new WP_Query('showposts=1&posts_per_page=-1&cat='.$cat->cat_ID);
		while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
	
	?>	

				<?php
					
						$show = true;
						foreach ( $duplicated as $test) { if ( $test == $post->ID) { $show = false; } }

						$count++;
						$duplicated[$count] = $post->ID;
						
						if ($show) {
					
				?>
				
				<div class="post-alt blog">	
					
               <p class="category"><span><?php echo $cat->cat_name; ?></span></p>
					<h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p class="posted_on">Posted on <?php the_time('d F Y'); ?> <?php edit_post_link(__('Edit'), ' &#183; ', ''); ?></p>
		
					<div class="entry">
						<?php the_excerpt(); ?>
					</div>
				
				</div><!--/post-->
		
				<?php } ?>

	<?php endwhile; ?>

	<?php } ?>

        </div>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>