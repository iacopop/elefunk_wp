<?php get_header(); ?>
      
	<div id="columns">
		
		<?php if (have_posts()) : ?>

        <div id="centercol">
			
            <div class="wrap latest">
        		<?php if (is_category()) { ?>
                <h2>ARCHIVES</h2>
           	
				<?php } elseif (is_day()) { ?>
				<h2>ARCHIVE <?php the_time('F jS, Y'); ?></h2>

				<?php } elseif (is_month()) { ?>
				<h2>ARCHIVE <?php the_time('F, Y'); ?></h2>

				<?php } elseif (is_year()) { ?>
				<h2>ARCHIVE <?php the_time('Y'); ?></h2>
				
				<?php } ?>
			</div>
            
                
			<?php while (have_posts()) : the_post(); ?>		

			<div class="box post">
				<div class="comment"><?php comments_popup_link(0, '1', '%', '', ''); ?></div>
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<div class="date"><?php the_time('F j, Y'); ?></div>
				<div class="hl"></div>
                
				<?php the_excerpt(); ?>
                
			</div>
			<!--/box-->
                       
            
            <?php endwhile; ?>
	                        
            <div class="navigation">
                <div class="fl"><?php next_posts_link('&laquo; Previous Entries') ?></div>
                <div class="fr"><?php previous_posts_link('Next Entries &raquo;') ?></div>
            </div>		
            
		</div>
		<!--/centercol -->

		<?php endif; ?>							

<?php get_sidebar(); ?>

		<div class="fix"></div>
	</div>
	<!--/columns -->

<?php get_footer(); ?>