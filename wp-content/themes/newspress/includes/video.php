<div class="box">
	
	<div class="box-top"></div>
		
		<div class="spacer">
					
			<div class="video">
			
				<?php include(TEMPLATEPATH . '/includes/version.php'); ?>
				<?php query_posts('showposts=6&cat=' . $ex_vid); ?>
			
				<?php if (have_posts()) : ?>
			
					<?php while (have_posts()) : the_post(); ?>	
				
						<div id="video-<?php the_ID(); ?>">
							<?php the_content('Read the rest of this entry &raquo;'); ?>
						</div>
					
					<?php endwhile; ?>
				
				<?php endif; ?>
			
			</div>
			
			<h2>Recent Videos</h2>
			
			<div id="videolist">
				
				<?php query_posts('showposts=6&cat=' . $ex_vid); ?>
			
				<?php if (have_posts()) : ?>
				
					<ul class="idTabs">
			
					<?php while (have_posts()) : the_post(); ?>	
				
						<li><a href="#video-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
					
					<?php endwhile; ?>
					
					</ul>	
				
				<?php endif; ?>
			
			</div><!--/videolist -->
				
			<div class="fix"></div>
		
		</div><!--/spacer -->
	
	<div class="box-bot"></div>

</div><!--/box -->