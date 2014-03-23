<?php get_header(); ?>

		<div id="centercol">

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>

										

				<div class="post" id="post-<?php the_ID(); ?>">
				
					<h2 class="singleh2"><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <div class="date-comments">
                        <p class="fl"><?php the_time('D, M j, Y'); ?></p>    
                        <p class="fr"><?php the_category(', ') ?></p>		                                          
                    </div>        
		
					<div class="entry">
						<?php the_content('<span class="continue">Continue Reading</span>'); ?>						
					</div>

					<?php the_tags('<p>Tags: ', ', ', '</p>'); ?> 
				
				</div><!--/post-->			
				
				<div id="comments">
					<?php comments_template(); ?>
				</div>

		<?php endwhile; ?>
		
        <div class="navigation">
            <div class="alignleft"><?php previous_post_link(); ?></div>
            <div class="alignright"><?php next_post_link(); ?> </div>
        </div>		
	
	<?php endif; ?>							

		</div><!--/centercol-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>