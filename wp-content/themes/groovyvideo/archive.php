<?php get_header(); ?>
       
    <!-- Content Starts -->
    <div id="content" class="wrap">
        <div id="archive" class="col-left">     
            
            
			<?php if (is_category()) { ?><h3 class="title-archives-text fl">Archive for '<?php echo single_cat_title(); ?>'</h3>
            <?php } elseif (is_day()) { ?><h3 class="title-archives-text fl">Archive for <?php the_time('F jS, Y'); ?></h3>
            <?php } elseif (is_month()) { ?><h3 class="title-archives-text fl">Archive for <?php the_time('F, Y'); ?></h3>
            <?php } elseif (is_year()) { ?><h3 class="title-archives-text fl">Archive for the year <?php the_time('Y'); ?></h3>
            <?php } elseif (is_author()) { ?><h3 class="title-archives-text fl">Archive by Author</h3>
            <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><h3 class="title-archives-text fl">Archives</h3>
            <?php } elseif (is_tag()) { ?><h3 class="title-archives-text fl">Tag Archives: <?php echo single_tag_title('', true); ?></h3>	
			<?php } ?>

			<div id="categorybox" class="fr">
                <ul class="menu">
                    <li><a href="#" onclick="javascript:showlayer('sm_1')">select category</a>
                    <ul class="submenu" id="sm_1">
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                    </li>
                </ul>            
            </div>
            <div class="fix"></div>
            
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=$cat&tag=$tag&paged=$paged"); ?>
            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); ?>
				<?php if (in_array($post->ID,$GLOBALS['exclude'])) continue; ?>
            
            	<div class="box2 <?php if ($count == 3) { echo 'last'; } ?>">
	                <div class="box2-top"></div>
             	    <div class="post">
    
                        <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                        <span class="post-details"><?php the_time('d. M, Y'); ?></span>
						<?php woo_get_image('image','180','120'); ?> 
                        <div class="info">
							<?php  if(function_exists('the_ratings')) { echo '<div class="fl ratings">'; the_ratings(); echo '</div>'; } ?>
                            <div class="comment fr"><a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a></div>                   
                        </div>
                        <p><?php the_content_rss('', TRUE, '', 12); ?></p>

                    </div>
                    <div class="box2-bot"></div>
				</div>
                <?php if ($count == 3) { echo '<div class="fix"></div>'; $count = 0; } else $count++; ?>
			<?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>  
        
        		<div class="fix"></div>
                <div class="more_entries wrap">
                    <?php if (function_exists('wp_pagenavi')) { ?><?php wp_pagenavi(); ?><?php } ?>
                </div>
                
        </div><!-- .col-left ends -->

    </div><!-- Content Ends -->
		
<?php get_footer(); ?>