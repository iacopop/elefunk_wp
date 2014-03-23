		<?php if ( have_posts() ) : while(have_posts()) : the_post();  ?>				

		<ul class="recentEntries">
			
			<li class="post" <?php if ( $counter == 4 ) { ?>class="last"<?php } ?>>
				<h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a> <span><?php comments_popup_link('{ 0 }', '{ 1 }', '{ % }'); ?></span></h3>
				<p class="entry-meta">
					<abbr class="published"><?php the_time('l, j F Y') ?></abbr>
					<abbr class="category">| Filed under <?php the_category(', ') ?></abbr>					
				</p>
				<div class="entry-content">
					<?php the_excerpt(); ?>
					<p><a href="<?php the_permalink(); ?>" title="Continue Reading: <?php the_title(); ?>">Continue Reading &#187;</a></p>
				</div>	
			</li><!-- .post -->	

		</ul><!-- .recentEntries -->
	
	<?php endwhile; endif; ?>	

	<div id="navigation">
	
		<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
	
	</div><!-- /END #navigation-->