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
		
		<?php $counter = 0; ?>

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>	
			
			<?php $aside = get_post_meta($post->ID, "aside", $single = true); ?>
				
			<?php if ( $aside == '1' ) { ?>

			<div class="asides">
			
				<div class="asidespost">
					
					<?php the_content(); ?>
					
					<p><strong><?php comments_popup_link('Add Your Comment! 0 Comments Already...', 'Add Your Comment! 1 Comment Already...', 'Add Your Comment! % Comments Already...'); ?></strong></p>
						
				</div><!-- /asidespost -->	
			
			</div><!-- /asides -->				
			
			<?php } else { ?>											
					
			<div class="post">
		
				<span class="categories"><?php the_category(","); ?></span>
				
				<h2 class="title"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a><span class="date"><?php the_time('d M'); ?></span></h2>				
				
				<div class="entry">
				
					<?php the_content(); ?>						

				</div><!-- /entry -->
					
			</div><!-- /post -->
			
			<?php
			
				$counter++;
				
				if ( $counter == 1 ) { include('ads/ads-468x60.php'); }
			
			?>
			
			<?php } ?>		
                  
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