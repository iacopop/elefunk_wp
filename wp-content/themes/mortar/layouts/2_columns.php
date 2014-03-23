<div class="wrap blog" id="col_2">
                
    <?php 
        $height = get_option('woo_2col_height');
    //The Query
         if (have_posts()) :
        while (have_posts()) : the_post(); 
    ?>
    
    <?php if (is_paged()) : ?>
	<?php $postclass = ('post'); ?>
	<?php else : ?>
	<?php $postclass = ($post == $posts[0]) ? 'featured_post' : 'post'; ?>
	<?php endif; ?>

   <div class="box <?php echo $postclass ?>" >
     
            <?php if(get_option('woo_port_images') == 'true') 
                { 
                    mortar_get_image('image','438',null,'thumbnail',90,get_the_id(),'src',1,0,'','',false,true,false,true); } 
                else 
                {
                    woo_get_image('image','438',$height);
                } ?>
            <p class="date"><?php the_time('M jS, Y') ?></p>
            <h2><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <p><?php echo strip_tags(get_the_excerpt(), '<a><strong>'); ?></p>
            
    </div><!-- / #featured_post -->

    <?php endwhile; ?>

    <?php else: ?>	
         <p class="no_post_yet">No posts yet.</p>
    <?php endif; ?>

</div><!-- / #blog -->
