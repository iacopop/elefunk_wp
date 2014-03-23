<?php get_header(); ?>

<div id="steps" class="fullspan">
	
	<div class="container_16">
	
		<div class="grid_16">
			<ul><?php wp_list_categories('hierarchical=0&title_li='); ?></ul>
		</div>
		
	</div><!-- /container_16 -->

</div><!-- /steps -->

<div id="content" class="fullspan">

	<div class="container_16 clearfix">
			
		<div id="leftcontent" class="grid_10">

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>					
					
			<div class="post">
				
				<h2 class="title" style="margin-top: 0px !important;"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>				
				
				<div class="entry">
				
					<?php the_content(); ?>						

				</div><!-- /entry -->
					
			</div><!-- /post -->
			
                  
			<?php endwhile; ?>
			
			<div id="postnav">
				<p class="floatleft prev"><?php next_posts_link('Previous Entries') ?></p>
				<p class="floatright next"><?php previous_posts_link('Newer Entries') ?></p>
			</div><!-- /postnav -->
			
		<?php endif; ?>							

		</div><!-- /leftcontent -->
        
        <?php get_sidebar(); ?>        
        
	</div><!-- /container_16 -->

</div><!-- /content -->

<?php get_footer(); ?>