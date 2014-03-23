<?php get_header(); ?>
       
	<?php get_sidebar(); ?>
	
	<div id="content">
			
      <?php 
        $in_subcategory_blogs = false;
        $cat_id = get_cat_id(get_option('woo_portfolio_cat'));
        foreach( explode( "/", get_category_children( $cat_id ) ) as $child_category ) {
            if(in_category($child_category)) $in_subcategory_blogs = true;
        }
        
        if ((is_category(get_option('woo_portfolio_cat')) || in_category($cat_id) || $in_subcategory_blogs) && !empty($cat_id)){ 
       ?>
        
        <div class="module"><h2 class="module-title">Portfolio Archive</h2></div>
            
        <?php } else {?>
        
		<div class="module"><h2 class="module-title">Writing Archive</h2></div>
        
        <?php } ?>
		
		<?php if (have_posts()) : $count = 0; ?>
		<?php while (have_posts()) : the_post(); $count++; ?>
        
        <?php  if ((is_category(get_option('woo_portfolio_cat')) || in_category($cat_id) || $in_subcategory_blogs) && !empty($cat_id)){ ?>
        
              
            <a href="<?php the_permalink(); ?>" class="portfolio">
                <?php woo_get_image('image',520,170,'thumbnail',90,get_the_id(),'img') ?>
                <span class="portfolio-meta">
                    <span class="portfolio-title"><?php the_title()?></span>
                    <span class="portfolio-readmore">Read the case study &raquo;</span>
                </span>
            </a>
            <div class="spacer"></div>
            
        <?php } else {?>
		
		<div class="module blog">
		
			<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
			<p class="entry-meta">Posted <?php the_time('d. M, Y'); ?> in <?php the_category(', ') ?></p>
		
			<div class="entry">
			
				<?php if(get_option('woo_archive_content') == 'true') { the_content('');} else { the_excerpt();} ?>
				
				<p class="readmore">
					<a href="<?php the_permalink() ?>">Read more...</a>
				</p>
				
			</div><!-- /.entry -->
			
		</div><!-- end module -->
        
        <?php } ?>
                    
		<?php endwhile; else: ?>
			
			<div class="module blog">
		
				<h3 class="entry-title">No entries found</h3>
					
				<div class="entry">
					
					<p>Sorry, no posts matched your criteria.</p>
				
				</div><!-- /.entry -->
			
			</div><!-- end module -->
			
		<?php endif; ?>
			
		<p class="link-ancillary">
			<?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
				<?php previous_posts_link('&laquo; Newer Entries ') ?>
				<?php next_posts_link(' Older Entries &raquo;') ?>
			<?php } ?>
		</p>
		
	</div><!-- end content --> 
		
<?php get_footer(); ?>