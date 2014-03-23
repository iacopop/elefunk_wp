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
		
				<span class="categories"><?php the_category(","); ?></span>
				
				<h2 class="title"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><span class="date"><?php the_time('d M'); ?></span></h2>				
				
				<div class="entry">
				
					<?php the_content(); ?>						

				</div><!-- /entry -->

            <div id="comments">
            	<?php comments_template(); ?>
            </div>				
					
			</div><!-- /post -->
                  
			<?php endwhile; ?>
			
		<?php endif; ?>							

		</div><!-- /leftcontent -->
        
        <?php get_sidebar(); ?>        
        
	</div><!-- /container_16 -->

</div><!-- /content -->

<?php get_footer(); ?>