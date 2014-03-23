<?php get_header(); ?>
       
    <!-- Content Starts -->
    <div id="content" class="wrap">
		<div class="col-left">
		
			<div id="archives_head">
			
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
						<li>
							<a href="#" id="catmenu">select category</a>
							<ul class="submenu" id="sm_1">
								<?php wp_list_categories('title_li='); ?>
							</ul>
						</li>
					</ul>            
				</div>
				
			</div><!-- /#archives_head -->
			
			<div class="clear"></div>
			
			<div id="main" class="single">
            
            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
                                                                        
                <!-- Post Starts -->
				<div class="box3-top"></div>
                <div class="post wrap">

                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <p class="post-details">Posted on <?php the_time('d. M, Y'); ?> by  <?php the_author_posts_link(); ?> in <?php the_category(', ') ?> | <?php comments_popup_link(); ?></p>
                    
                    <?php 
                    if(get_option('woo_show_content_archive') == 'true'){
                      the_content();
                    }
                    else {
                       the_excerpt();  
                    }
                    ?>

                </div>
				<div class="box3-bot"></div>         
                <!-- Post Ends -->
                                                    
                <?php if (get_option('woo_ad_content') == 'true' && !$ad_shown) { ?>            
                    <?php include (TEMPLATEPATH . "/ads/content_ad.php"); $ad_shown = true; ?>
                <?php }	?>

			<?php endwhile; else: ?>
                <p>Sorry, no posts matched your criteria.</p>
            <?php endif; ?>  
        
                <?php woo_pages(); ?>
                
            </div><!-- main ends -->
        </div><!-- .col-left ends -->

        <?php get_sidebar(); ?>

    </div><!-- Content Ends -->
		
<?php get_footer(); ?>