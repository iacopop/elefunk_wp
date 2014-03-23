<?php get_header(); ?>
       
	<?php get_sidebar(); ?>
	
	<div id="content">
		
        <?php 
        $in_subcategory_blogs = false;
        $cat_id = get_cat_id(get_option('woo_portfolio_cat'));
        foreach( explode( "/", get_category_children( $cat_id ) ) as $child_category ) {
            if(in_category($child_category)) $in_subcategory_blogs = true;
        }
        
        if ((is_category(get_option('woo_portfolio_cat')) || in_category($cat_id) || $in_subcategory_blogs) && !empty($cat_id)){  ?>
        
                <div class="module"><h2 class="module-title">Portfolio</h2></div>
            
        <?php } else {?>
        
                <div class="module"><h2 class="module-title">Writing</h2></div>
        
        <?php } ?>	

		
		<?php if (have_posts()) : $count = 0; ?>
		<?php while (have_posts()) : the_post(); $count++; ?>
        

        <?php
         if ((is_category(get_option('woo_portfolio_cat')) || in_category($cat_id) || $in_subcategory_blogs) && !empty($cat_id)){  
        if(get_post_meta(get_the_id(),'image',true)){
        
        ?>
        
        
        <div class="module module2">
            <?php woo_get_image('image',520,null) ?>
        </div>
        
        <?php } } ?>
            

		
		<div class="module blog">
		
			<h3 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
			<p class="entry-meta">Posted <?php the_time('d. M, Y'); ?> in <?php the_category(', ') ?></p>
		
			<div class="entry">
			
				<?php the_content(); ?>				
				
				<?php the_tags('<p class="tags">Tags: ', ', ', '</p>'); ?>
				
			</div><!-- /.entry -->
			
		</div><!-- end module -->
        
        <?php if ((is_category(get_option('woo_portfolio_cat')) || in_category($cat_id) || $in_subcategory_blogs) && !empty($cat_id)){  
        ?>
        
        <?php
                $repeat = 20;
                $id = get_the_id();
                
                $attachments = get_children( array(
                'post_parent' => $id,
                'numberposts' => $repeat,
                'post_type' => 'attachment',
                'post_mime_type' => 'image')
                );
                if ( !empty($attachments) ) {
          
                $counter = 0;
                $size = 'large';
                $output = '';
                foreach ( $attachments as $att_id => $attachment ) {
                       $counter++;
                       $src = wp_get_attachment_image_src($att_id, $size, true);
                       
                       if($counter%5 == 0) {$margin = ' style="margin-right:0;"';} else { $margin = '';}
                       
                       if($counter == 1 ){ 
                            $init =  '<img src="' . get_bloginfo(template_url).'/thumb.php?src='. $src[0] .'&h=&w=520&q=90&zc=1" alt="'. $attachment->post_title .'" class="thumbnail" /><span>'. $attachment->post_title .'</span>';
                       }
                       
                       $output .= '<img rel="'. get_bloginfo(template_url).'/thumb.php?src='. $src[0] .'&h=&w=520&q=90&zc=1" class="portfolio-thumb" src="'. get_bloginfo(template_url).'/thumb.php?src='. $src[0] .'&h=84&w=84&q=90&zc=1" alt="'. $attachment->post_title .'" '. $margin.' />' . "\n"; 
                       $output .= '<img src="'. get_bloginfo(template_url).'/thumb.php?src='. $src[0] .'&h=&w=520&q=90&zc=1" class="portfolio-thumb" style="display:none" />' . "\n"; 
                       
                    } ?>
                        <div class="portfolio-preview-title module">
                            <span class="module-title"><?php echo get_option('woo_port_prev_title'); ?></span>
                        </div>  
                        
                        <div class="portfolio-preview">
                            <?php echo $init; ?>
                        </div>
                        
                        <div class="portfolio-preview-instruct">
                            <?php echo get_option('woo_port_prev_ins'); ?>
                        </div>  
                        
                        <div class="portfolio-thumb-preview">
                            <?php echo $output; ?>
                            <div style="clear:both"></div>
                       </div> 
                       
                <?php
                } } ?>
        
		
		<?php comments_template('', true); ?>
                    
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