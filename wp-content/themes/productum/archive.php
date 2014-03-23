<?php get_header(); ?>
			
			<div id="main" class="grid_8">

				<?php if (have_posts()) : ?>
				
				<?php while (have_posts()) : the_post(); ?>
                
				<div class="post">
					
					<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					
					 <p class="post_meta"><span>Posted in <?php the_category(', ') ?>. <?php the_time('F jS, Y') ?></p>
					
					<div class="entry">
						<?php if ( get_option('woo_the_content') == 'true' ) { the_content(); } else { the_excerpt(); ?>
                        <div class="btn-continue"><a href="<?php the_permalink() ?>">Continue Reading</a></div>
                        <?php } ?>
					</div>
				
				</div>
				
				<?php endwhile; ?>
								
				<?php else : ?>
				
				<h2>Not Found</h2>
				
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				
				<?php endif; ?>
 
                <div class="more_entries">
                    <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); else { ?>
                    <div class="fl"><?php previous_posts_link('&laquo; Newer Entries ') ?></div>
                    <div class="fr"><?php next_posts_link(' Older Entries &raquo;') ?></div>
                    <br class="fix" />
                    <?php } ?> 
                </div>		

			</div><!-- / #main -->

<?php get_sidebar(); ?>
<?php get_sidebar("2"); ?>
<?php get_footer(); ?>