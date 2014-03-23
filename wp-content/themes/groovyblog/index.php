<?php get_header(); ?>
       
    <!-- Content Starts -->
    <div id="content" class="home wrap">
	
		<div id="featured-tabber">
            <ul class="tabber">
		    <?php 

            // $exclude = get_exclude_categories("woo_cat_box_");
            $getcats = get_categories( 'hierarchical=1&hide_empty=1&include=' . get_inc_categories("woo_cat_nav_") );
            // $getcats = get_categories('hierarchical=0&hide_empty=0&exclude='. $exclude); 
            
            $track = array();
            $li_counter = 0;
            foreach ( $getcats as $cat ) { 
            $li_counter++;
                
                $cat_id = $cat->cat_ID;
                $track[] = $cat_id;
                 ?>
				<li <?php if($li_counter == 1) {echo "class='current'";} ?>><a href="#" title="#" rel="<?php echo $cat_id; ?>"><span><?php echo get_cat_name($cat_id) ?></span></a></li>
             <?php }  ?>
			 </ul>
			
			<div class="clear"></div>
			
			<div class="top"></div>
			
			<div id="info">
            <?php
            $count = 0;
             foreach($track as $cat_id){
                    $count++;
                    $tab_posts = get_posts('showposts=1&cat=' . $cat_id);
                    foreach($tab_posts as $post){
                    setup_postdata($post);
                     ?>
                    <div class="tabber-post-content tabber-item-<?php echo $cat_id; ?>" <?php if($count >= 2){echo ' style="display:none;"';} ?>>
			
				<div class="img">
				
					<?php woo_get_image('image',480, null) ?>
					
					<div class="cats_rss">
					
						<span class="category">browse <a href="<?php echo get_category_link($cat_id) ?>" title="<?php echo get_cat_name($cat_id) ?> Category"><?php echo get_cat_name($cat_id) ?></a></span><!-- /.category -->
						<span class="rss"><a href="<?php echo get_category_feed_link($cat_id) ?> " title="<?php echo get_cat_name($cat_id) ?> RSS"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.png" alt="<?php echo get_cat_name($cat_id) ?> RSS" /> feed</a></span><!-- /.rss -->
					
					</div><!-- /#cats_rss -->
				
				</div><!-- /.img -->
				
                <div class="tabber-post">

                    
					    
					    <h2><a href="<?php the_permalink() ?>" title="#"><?php the_title(); ?></a></h2>
					    <?php
                          $comments = $post->comment_count;
                                if($comments == 0){$comments_result = 'No Comments';}
                                elseif($comments == 1){$comments_result = 'One Comment';}
                                else {$comments_result = $comments.' Comments';}
                                
                             ?>
					    <p class="meta">
						    <span class="date"><?php the_time('F d, Y') ?></span>
						    <span class="comments"><a href="<?php the_permalink(); ?>#comments" title="Comments for <?php the_title(); ?>"><?php echo $comments_result; ?></a></span>
					    </p>
					    
					    <div class="text">
					    
						    <?php the_content('Read More...') ?>	
                            				    
					    </div><!-- /.text -->
					    
                    

				</div><!-- /.tabber-post -->
                <div class="clear"></div>
                </div><!-- /.tabber-post-content -->
                
			<?php }} ?>		
			</div><!--/#info -->
			
			<div class="clear"></div>
			<div class="bottom"></div>		
		
		</div><!-- /#featured-tabber -->
        
		<div id="featured">
		<div id="about_gallery">
		
			<div class="about">
	
                
                <h3 class="title-about replace">About</h3>
                
                <p>
                <?php if(get_option('woo_about_image') != ''){ ?>
                 <img src="<?php echo get_bloginfo('template_url') . '/thumb.php?src=' .  get_option('woo_about_image') .'&h='. get_option('woo_about_image_height')  .'&w='. get_option('woo_about_image_width')  .'&zc=1&q=90' ?>" alt="About Me" />       
                <?php } else { ?>
                <img src="<?php bloginfo('stylesheet_directory'); ?>/images/about.jpg" alt="About" />
                <?php } ?>
                <?php echo get_option('woo_about_text'); ?></p>
                
                <?php if(get_option('woo_about_more') != ''){ ?>
                <a class="readmore" href="<?php echo get_option('woo_about_more'); ?>" title="More About Me">Read more</a>
                <?php } ?>
			
			</div><!-- /.about -->
			
			<div class="gallery">
				
				<h3 class="title-gallery replace">Gallery</h3>
				<?php 
                if (get_option('woo_auto_img') == 'false'){
                    update_option('woo_auto_img','true'); // Enable auto img function first.
                    $reset = 1;
                }
                $page_id = get_page_id(get_option('woo_gallery_slug'));
                $gallery_limit = get_option('woo_gallery_limit');
                if(get_option('woo_gallery_dest') == 'true'){$src = 'src'; $single = false;} else {$src = 'img'; $single = true;}
                 ?>
				<ul>
                    <?php woo_get_image('image',80,80,'thumbnail',90,$page_id,$src,$gallery_limit,0,'<li>','</li>',$single); // Auto images from a post or page ID that repeats and has formatting ?>
				</ul>
                
                <?php
                if($reset == 1){   // Reset back to normal
                    update_option('woo_auto_img','false');
                } ?>
				
				<div class="nav-right">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/images/navright.png" alt="Navigate right" />
				</div><!-- /.nav-right -->			
			
			</div><!-- /.gallery -->
			<div class="clear"></div>
			
		</div><!-- /#about_gallery -->
        </div>
	
         
		<div class="clear"></div>
		
		<div id="recent">
		
			<h3 class="title-recent replace">Recent</h3>
			
            <?php 
            global $query_string;
            $post_num = get_option('woo_recent_posts');
            query_posts($query_string . "&showposts=" . $post_num);
            
            $counter = 0;
            if (have_posts()) : 
            while (have_posts()) : the_post(); $counter++?>
			<div class="item" <?php if($counter%4 == 0) {echo "style='margin:0'";} ?>>
			
				<h4><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h4>
				
				<?php woo_get_image('image',80,80) ?>
                <?php if (get_option('woo_recent_content') == 'true'){the_content();} else {the_excerpt();} ?>
			
			</div><!-- /.item -->
            <?php if($counter%4 == 0) {echo "<div class='clear'></div><div class='spacer'></div>";} ?>
			
            <?php endwhile; ?>
            <?php endif;?>
		    
        			
			<div class="clear"></div>
			<?php if(get_option('woo_archive_link') != ''){ ?>
			<p class="archives_link"><a href="<?php echo get_option('woo_archive_link'); ?>" title="View Archives">View Archives</a></p>
            <?php } ?>
			
		</div><!-- /#recent -->

    </div><!-- Content Ends -->
		
<?php get_footer(); ?>