<?php get_header(); ?>
       
    <!-- Content Starts -->
    <div id="content" class="home wrap">
		<div id="main" class="col-left">
            
            <h3 class="title-featured replace">Featured</h3>

			<?php if (get_option('woo_featured_cat')) :  $featcat = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='".get_option('woo_featured_cat')."'"); ?>
			<?php $featured = new WP_Query('cat='.$featcat.'&showposts='.get_option('woo_featured_posts').'&order=DESC'); ?>
	        <?php while ($featured->have_posts()) : $featured->the_post(); $do_not_duplicate = $post->ID; $count++; ?>
            <?php $GLOBALS['exclude'][$GLOBALS[ex_count]] = $post->ID; $GLOBALS[ex_count]++; ?>
            	<div class="box1-top"></div>
                <!-- Featured post -->
                <div class="featured" id="post-<?php the_ID(); ?>">

					<?php if ($count < 2) : ?>

                    <h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php  if(function_exists('the_ratings')) { echo '<div class="ratings">'; the_ratings(); echo '</div>'; } ?>
                    <div class="fix"></div>
                    <?php echo woo_get_embed('embed','400','230'); ?> 
                    <?php the_excerpt(); ?>
                    <div class="watch"><a href="<?php the_permalink() ?>" rel="bookmark">Watch Video</a></div>
                    <br class="fix" />

                    <?php else: ?>

                    <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					<?php  if(function_exists('the_ratings')) { echo '<div class="ratings" style="margin-top:3px">'; the_ratings(); echo '</div>'; } ?>
                    <br class="fix" />
                    
                    <?php endif; ?>
                    
                </div>
                <!-- /Featured post -->
            	<div class="box1-bot"></div>
			<?php endwhile; endif; ?>

			<?php if ( get_option('woo_ad_home') == 'true' ) include (TEMPLATEPATH . "/ads/ad_125.php"); ?>            

        </div><!-- .col-left ends -->
        <div id="archive" class="col-right">     
            
            <h3 class="title-recent replace fl">Recent</h3>

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
            
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("paged=$paged&showposts=".get_option('woo_recent_posts')."&cat=-".$featcat); ?>
            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); ?>
				<?php if (in_array($post->ID,$GLOBALS['exclude'])) continue; ?>
            
            	<div class="box2 <?php if ($count == 1) { echo 'last'; $count = 0; } else $count++; ?>">
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