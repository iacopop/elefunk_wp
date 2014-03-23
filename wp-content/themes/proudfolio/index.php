<?php get_header() ?>

	<!-- FIRST LOOP (start) Only show posts from category ("portfolio") -->
					
	<?php query_posts('showposts=1&cat=' . $GLOBALS['portfolio_id']); ?>

	<?php if ( have_posts() ) : while(have_posts()) : the_post();  ?>
	
		<div class="portfolioItem">
						
						<h2>Latest project</h2>
                        
                        <?php $resize = get_option('woo_resize'); if ($resize) { // Check if we should use the image resizer ?>

						<span class="image"><a href="<?php the_permalink(); ?>" title="View Project Details for <?php the_title(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=200&amp;w=600&amp;zc=1&amp;q=90" alt="Preview - <?php the_title(); ?>" /></a></span>
                        
                        <?php } else { ?>
                        
						<span class="image"><a href="<?php the_permalink(); ?>" title="View Project Details for <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, "image", $single = true); ?>" alt="Preview - <?php the_title(); ?>" /></a></span>
                        
                        <?php } ?>
                        
						<p><?php the_title(); ?> / <?php if ( get_post_meta($post->ID, "url", $single = true)  <> "" ) { ?><a href="<?php echo get_post_meta($post->ID, "url", $single = true); ?>" title="Visit The Website">Visit Website</a> /<?php } ?> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">View Project Details</a></p>
		
		</div><!-- END .portfolioItem -->

	<?php endwhile; endif; ?>					
					
	<!-- FIRST LOOP (end) -->

	<div class="blogOnHomePage">
	
	<?php include('searchbox.php'); ?>
						
	<!-- SECOND LOOP (start) Only show posts from category ("blog") -->

	<?php query_posts('showposts=' . get_option('woo_blogs') .' &cat=' . $GLOBALS['blog_id']); ?>

	<div class="post">
	
		<?php if ( get_option('woo_blogs') == 1 ) { ?><h2>Latest Blog Entry</h2><?php } else { ?><h2>Latest Blog Entries</h2><?php } ?>

		<?php if ( have_posts() ) : while(have_posts()) : the_post();  ?>

			<h3 class="entry-title"><a href="<?php the_permalink() ?>" title="" rel="bookmark"><?php the_title() ?></a> <span><?php comments_popup_link('{ 0 }', '{ 1 }', '{ % }'); ?></span></h3>
			<p class="entry-meta">
				<abbr class="published"><?php the_time('l, j F Y') ?></abbr>
				<abbr class="category">| Filed under <?php the_category(', ') ?></abbr>				
			</p>
			<div class="entry-content">
				<?php the_excerpt(); ?>
				<p><a href="<?php the_permalink(); ?>" title="Continue Reading: <?php the_title(); ?>">Continue Reading &#187;</a></p>
			</div>
	
		<?php endwhile; endif; ?>
		
	</div><!-- END .post -->						

	<!-- SECOND LOOP (end) -->

	</div><!-- END .blogOnHomePage -->
					
	<!-- THIRD LOOP (start) Show latest portfolio entries, excluding the one already displayed as the Latest Project -->
	
	<div class="recentProjects">
	
		<ul>
	
		<?php query_posts('offset=1&showposts=4&cat=' . $GLOBALS['portfolio_id']); ?>

		<?php $counter = 0; ?>
		
		<?php if ( have_posts() ) : while(have_posts()) : the_post();  ?>
		
			<?php $counter++; ?>
		
			<li <?php if ( $counter == 4 ) { ?>class="last"<?php } ?>>
            
				<?php $resize = get_option('woo_resize'); if ($resize) { // Check if we should use the image resizer ?>

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "thumb", $single = true); ?>&amp;h=120&amp;w=120&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" /></a>
                                
                <?php } else { ?>
                
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, "thumb", $single = true); ?>" alt="<?php the_title(); ?>" /></a>
                                
                <?php } ?>            

			</li>

		<?php endwhile; endif; ?>
			
		</ul>
						
		<h2>Want to see more? <a href="<?php echo $GLOBALS['portfolio_link']; ?>" title="View Full Portfolio">Check out <em>all</em> of my projects on the portfolio page &#187;</a></h2>
		
		</div>

	<!-- THIRD LOOP (end) -->

<?php get_footer() ?>