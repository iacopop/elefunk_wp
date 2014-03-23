<?php get_header(); ?>
       
    <!-- Content Starts -->
    <div id="content" class="home wrap">
	
		<div id="about_twitter">
        
		    <?php if(get_option('woo_about_enable') == 'true'){ ?>
		
        	<div id="about">
				
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
			
			</div><!-- /#about -->
            
            <?php } ?>
			
            <?php if(get_option('woo_twitter_enable') == 'true'){ ?>
			<div id="twitter">
            			
				<h3 class="title-twitter replace">Twitter</h3>
				
				<ul id="twitter_update_list"><li></li></ul>
				<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
				<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo get_option('woo_twitter_username'); ?>.json?callback=twitterCallback2&amp;count=1"></script>
				
			</div><!-- /#twitter -->
            
            <?php } ?>

		
		</div><!-- /#about_twitter -->
		
		<div id="categorybox" class="fr home">
		
			<ul class="menu">
				<li>
					<a href="#" id="catmenu">select category</a>
					<ul class="submenu" id="sm_1">
						<?php wp_list_categories('title_li='); ?>
					</ul>
				</li>
			</ul>            
			
		</div>
		
		<div class="clear"></div>
		
		<div id="posts">
        
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
		
			<div class="post">
			
				<div class="top"></div>
				
				<div class="middle">
			

					
					<div class="text">
                    
                     <div class="img">
                    
                        <?php 
                        //Woo Images
                        $index_width = get_option('woo_index_image_w');
                        $index_height = get_option('woo_index_image_h');
                        woo_get_image('image',$index_width,$index_height); 
                        
                        ?>
                    
                    </div><!-- /.img -->
						
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						
						<p class="meta">
							<span class="date"><?php the_time('F d, Y') ?></span>
                            <?php $comments = $post->comment_count;
                                if($comments == 0){$comments_result = 'No Comments';}
                                elseif($comments == 1){$comments_result = 'One Comment';}
                                else {$comments_result = $comments.' Comments';}
                             ?>
							<span class="comments"><a href="<?php the_permalink(); ?>#comments"><?php echo $comments_result; ?></a></span>
						</p>
						
						<div class="excerpt">
						
                            <?php 
                            if(get_option('woo_show_content_index') == 'true'){
                              the_content();
                            }
                            else {
                               the_excerpt();  
                            }
                            ?>
							<p class="readmore"><a href="<?php the_permalink() ?>" title="<?php the_title() ?>">Read more</a></p>
						
						</div><!-- /.excerpt -->
						
					</div><!-- /.text -->
					
				</div><!-- /.middle -->
				
				<div class="bottom"></div>
				
			</div><!-- /.post -->
            
            <?php endwhile; endif; ?>
            
            <?php woo_pages(); ?>
			
		
		</div><!-- /#posts -->		

    </div><!-- Content Ends -->
		
<?php get_footer(); ?>