<?php get_header(); ?>

	<div id="middle-out">
	<div id="middle" class="wrap">
		
		<div id="content" class="col-left">
		
			<div class="featured">
				<?php $featured = new WP_Query('category_name='.get_option('woo_featured_category').'&showposts=1&order=DESC'); ?>
				<?php while ($featured->have_posts()) : $featured->the_post(); ?>
				<?php $GLOBALS['exclude'] = $post->ID; ?>             														
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<p class="post-details">by <?php the_author_posts_link(); ?> on <?php the_time('d/m/y'); ?> at <?php the_time('g:i a'); ?></p>

				<?php woo_get_image('image',get_option('woo_image_width'),get_option('woo_image_height'),'alignleft'); ?>

               	<?php if ( get_option('woo_content_feat') == "true" ) { the_content(); } else { the_excerpt(); ?><?php } ?>
                <a href="<?php the_permalink() ?>" class="read-more">Full Story</a>
				<?php endwhile; ?>
				<div class="fix"></div>
            </div>
			
			<div id="main" class="wrap">
			
				<div id="latest" class="col-left" <?php if (get_option('woo_popular_posts') == "0"){ ?>style="width:auto;"<?php } ?>>
				
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("paged=$paged"); if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); $count++; ?>
								
					<?php if ( $GLOBALS['exclude'] <> $post->ID ) { ?> 

                  	<div class="post wrap">
                        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

						<?php woo_get_image('image',get_option('woo_thumb_width'),get_option('woo_thumb_height'),'alignleft'); ?>

                        <?php if ( get_option('woo_content_left') == "true" ) { the_content(); } else { the_excerpt(); ?><a href="<?php the_permalink() ?>" class="read-more">Full Story</a><?php } ?>
                        
					</div>				

					<?php } ?>                   
           	    <?php endwhile; ?>
                
                    <div class="more_entries">
                        <div class="alignleft"><h2><?php next_posts_link('&laquo; Older Entries') ?></h2></div>
                        <div class="alignright"><h2><?php previous_posts_link('Newer Entries &raquo;') ?></h2></div>
                    </div>
        
        		<?php endif; ?>
                					
				</div>
				
				<?php if (get_option('woo_popular_posts') != "0") { ?>                    
				<div id="popular-articles" class="col-right">
					<h2>Popular Articles</h2>
                    <?php include(TEMPLATEPATH . '/includes/popular.php' ); ?>                    
				</div>
                <?php } ?>     
			
			</div>
			
		</div>
		
		<?php get_sidebar(); ?>
		
	</div>
	</div>
	<?php get_footer(); ?>