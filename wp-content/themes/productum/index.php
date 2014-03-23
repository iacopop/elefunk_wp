<?php get_header(); ?>
			
			<div id="main" class="grid_8">
			
				<?php $more1 = get_option('woo_more1_ID'); ?>

    			<?php query_posts('page_id=' . $more1); ?>
	
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
			
		<div class="entry">
        
        <h2><?php the_title(); ?></h2>
				
		<?php the_content(); ?>
        
        </div>
     
  <?php endwhile; endif; ?>
				
                <?php
    
        		if( get_option('woo_show_carousel')  == 'true' ){ include(TEMPLATEPATH . '/includes/category_carousel.php'); }
                
    			?>
			
			</div><!-- / #main -->

			<ul id="showcase">
				<li>
                	<a class="active" href="<?php if ( get_option('woo_featured_1') <> "" ) { echo get_option('woo_featured_1').''; } else { bloginfo('template_directory'); ?>/images/img-featured-01.png<?php } ?>" rel="<?php echo get_option('woo_featured_1_linkout'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_thumbnail_1') <> "" ) { echo get_option('woo_thumbnail_1').''; } else { bloginfo('template_directory'); ?>/images/img-product-01.jpg<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a>
               </li>
				<li>
                    <a href="<?php if ( get_option('woo_featured_2') <> "" ) { echo get_option('woo_featured_2').''; } else { bloginfo('template_directory'); ?>/images/img-featured-02.png<?php } ?>" rel="<?php echo get_option('woo_featured_2_linkout'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_thumbnail_2') <> "" ) { echo get_option('woo_thumbnail_2').''; } else { bloginfo('template_directory'); ?>/images/img-product-02.jpg<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a>
                </li>
				<li>
                	 <a href="<?php if ( get_option('woo_featured_3') <> "" ) { echo get_option('woo_featured_3').''; } else { bloginfo('template_directory'); ?>/images/img-featured-03.png<?php } ?>" rel="<?php echo get_option('woo_featured_3_linkout'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_thumbnail_3') <> "" ) { echo get_option('woo_thumbnail_3').''; } else { bloginfo('template_directory'); ?>/images/img-product-03.jpg<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a>
                </li>
				<li>
                	<a href="<?php if ( get_option('woo_featured_4') <> "" ) { echo get_option('woo_featured_4').''; } else { bloginfo('template_directory'); ?>/images/img-featured-04.png<?php } ?>" rel="<?php echo get_option('woo_featured_4_linkout'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_thumbnail_4') <> "" ) { echo get_option('woo_thumbnail_4').''; } else { bloginfo('template_directory'); ?>/images/img-product-04.jpg<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a>
               </li>
			</ul>
			
<?php get_sidebar("home"); ?>
<?php get_footer(); ?>