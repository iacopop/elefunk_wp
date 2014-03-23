<?php get_header(); ?>

<div id="content" class="fullspan">

	<div class="container_16 clearfix">
			
		<div id="leftcontent" class="grid_10">

		<?php if (have_posts()) : ?>

       	<h3><em>Tag Archive |</em> "<?php single_tag_title("", true); ?>"</h3>        
	
			<?php while (have_posts()) : the_post(); ?>										
					
			<div class="post">
		
				<span class="categories"><?php the_category(","); ?></span>
				
				<h2 class="title"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><span class="date"><a href="#" title="#"><?php the_time('d M'); ?></a></span></h2>				
				
				<div class="entry">
				
					<?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?>				
                    					
                    <div id="comments">
                        <?php comments_template(); ?>
                    </div>

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