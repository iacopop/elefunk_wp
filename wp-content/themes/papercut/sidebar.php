<ul id="sidebar">
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		
		<li class="ads">

			<?php

				$img_url = array();
				$dest_url = array();
				$numbers = range(1,4);
				$counter = 0;

				shuffle($numbers);

				foreach ($numbers as $number) {

					$counter++;

					$img_url[$counter] = get_option('woo_ad_image_'.$number);
					$dest_url[$counter] = get_option('woo_ad_url_'.$number);
				}

			?>

			<a href="<?php echo "$dest_url[1]"; ?>"><img src="<?php echo "$img_url[1]"; ?>" alt="Ad" /></a>
			<a href="<?php echo "$dest_url[2]"; ?>"><img src="<?php echo "$img_url[2]"; ?>" alt="Ad" /></a>
			<a href="<?php echo "$dest_url[3]"; ?>"><img src="<?php echo "$img_url[3]"; ?>" alt="Ad" /></a>
			<a href="<?php echo "$dest_url[4]"; ?>"><img src="<?php echo "$img_url[4]"; ?>" alt="Ad" /></a>						
		</li>
			
		<li><h2>Popular News</h2>
			<ul>
				<?php query_posts("cat=".$category_id."&showposts=5"); if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); $count++; ?>
							<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="arial bold dark block"><?php the_title(); ?> <span class="georgia medium weight-normal block">by <span class="pink"><?php the_author(); ?></span> on <?php the_time('F j, Y'); ?></span></a></li>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</li>
		
		<li class="widget"><h2>Archives</h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		</li>
	
	<?php endif; ?>	
	
</ul>