<?php get_header(); ?>

	<?php if (have_posts()) : ?>

	<div id="left-col">
	   
            <?php while (have_posts()) : the_post(); ?>
    			
				<ul class="cat-tabs clearfix">
					<?php 
						foreach( get_the_category() as $cat ) {
							echo '<li class="active"><a href="'. get_category_link( $cat->term_id ) . '">' . $cat->cat_name .'</a></li>';
						} 
					?>
					<li><small><?php the_time('F jS, Y') ?></small></li>
				</ul>
				
				<div class="post-top"></div><!-- End post-top -->
				
                <div class="post" id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    
					<?php the_content( '' ); ?>
					
					<a href="<?php the_permalink(); ?>#more-<?php the_ID(); ?>" class="read-more" title="Read more of &quot;<?php the_title(); ?>&quot;">Read More</a>
					
                </div>
    
            <?php endwhile; ?>
    			
				<?php comments_template(); ?>    			
    
        <?php else : ?>
    
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>
            <?php include (TEMPLATEPATH . "/searchform.php"); ?>
    
        <?php endif; ?>

	</div><!-- End leftcol -->
    
    <div id="right-col">
    
    	<?php get_sidebar(); ?>
    
    </div><!-- End rightcol -->
	</div>
	
<?php get_footer(); ?>
