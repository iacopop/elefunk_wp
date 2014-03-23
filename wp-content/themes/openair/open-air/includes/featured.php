<?php if(is_home()) : ?>

<div id="featured">
	<div class="container">
		<div class="featured-norm clearfix">
			 <?php $feature = new WP_Query('category_name='.get_option('woo_featured_category').'&showposts=1'); while ($feature->have_posts()) : $feature->the_post(); $do_not_duplicate = $post->ID; $preview = get_post_meta($post->ID, 'preview', true); ?>

				<div class="featured-content">
					<h2 class="featured"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(''); ?>
				</div>
				<div class="featured-preview">

					<?php if ( get_post_meta($post->ID,'image', true) ) { ?> 
					<a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo get_post_meta($post->ID, "image", $single = true); ?>&amp;h=220&w=550&amp;zc=1&amp;q=90" alt="<?php the_title(); ?>" /></a>					
					<?php } ?>

				</div>
	
    			<?php $GLOBALS['exclude'] = $post->ID; ?>             														
                
			<?php endwhile; ?>
		</div>
	</div>
</div>
<!-- / featured -->

<?php endif; ?>    
