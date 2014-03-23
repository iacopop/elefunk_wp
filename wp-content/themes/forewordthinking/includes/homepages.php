<div class="page_block">

<?php $more1 = get_option('woo_more1_ID'); ?>

        	<?php query_posts('page_id=' . $more1); ?>
	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
			
				<h2><?php the_title(); ?></h2>
				
				<?php the_content(); ?>

				<p class="more"><a href="<?php echo get_option('woo_more1_url'); ?>" title="<?php echo get_option('woo_more1_link'); ?>"><?php echo get_option('woo_more1_link'); ?></a></p>
                
                <?php endwhile; endif; ?>
   
      </div>
      
      <div class="page_block">
        
        <?php $more1 = get_option('woo_more2_ID'); ?>

        	<?php query_posts('page_id=' . $more1); ?>
	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
			
				<h2><?php the_title(); ?></h2>
				
				<?php the_content(); ?>

				<p class="more"><a href="<?php echo get_option('woo_more2_url'); ?>" title="<?php echo get_option('woo_more2_link'); ?>"><?php echo get_option('woo_more2_link'); ?></a></p>
                
                <?php endwhile; endif; ?>
        
      </div>
  