<div class="col1"> 

    <div class="video">
    
        <?php include(TEMPLATEPATH . '/includes/version.php'); ?>
        <?php query_posts('showposts=6&cat=' . $ex_vid); ?>
    
        <?php if (have_posts()) : ?>
    
            <?php while (have_posts()) : the_post(); ?>	
        
                <div id="video-<?php the_ID(); ?>">
                    <?php the_content('Read the rest of this entry &raquo;'); ?>
                </div>
            
            <?php endwhile; ?>
        
        <?php endif; ?>
    
    </div>
    
</div>
<div class="col2">
    <h3>Latest Videos</h3>

	<?php query_posts('showposts=6&cat=' . $ex_vid); ?>
    
    <?php if (have_posts()) : ?>

    <ul class="list2 idTabs">

		<?php while (have_posts()) : the_post(); ?>	
    
            <li><a href="#video-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
        
        <?php endwhile; ?>

    </ul>
    
	<?php endif; ?>
    
</div>


