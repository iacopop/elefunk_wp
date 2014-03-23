<?php
/*
Template Name: Image Gallery
*/
?>
<?php get_header(); ?>
		<div id="content" class="clearfix">
			<div id="left-col">
				<div id="left-top">
					<div class="left-content">
						<h2 class="pink">Image Gallery</h2>
							<div class="divider"></div><br />
				
						<?php query_posts('showposts=16'); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>				
							
							<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),'thumb alignleft'); ?>
						
						<?php endwhile; endif; ?>	
						
						<div style="clear:both;"></div>

					</div>
				</div><div id="left-bottom"></div>
			</div>
			<div id="right-col">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
