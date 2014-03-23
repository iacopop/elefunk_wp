<div id="rightcol">

	<?php 
		  include(TEMPLATEPATH . '/includes/stylesheet.php'); 
   		  include(TEMPLATEPATH . '/includes/version.php');	
	?>

	<?php include('ads/ads-management.php'); ?>

	<?php include('ads/ads-top.php'); ?>			
	
    <div class="box2">
    
        <div class="top"></div>
        
        <ul class="nav1 idTabs">
			<li><a href="#pop"><span>Popular</span></a></li>
            <li><a href="#comm"><span>Comments</span></a></li>
            <li><a href="#feat"><span>Featured</span></a></li>
            <li><a href="#tagcloud"><span>Tags</span></a></li>
        </ul>
        
        <div class="spacer white">

            <ul class="list1" id="pop">
                <?php include(TEMPLATEPATH . '/includes/popular.php' ); ?>                    
            </ul>

			<ul class="list1" id="comm">
                <?php include(TEMPLATEPATH . '/includes/comments.php' ); ?>                    
			</ul>	

			<ul class="list1" id="feat">
				<?php 
					$the_query = new WP_Query('cat=' . $ex_feat  . '&showposts=10&orderby=post_date&order=desc');	
					while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
				?>
				
					<li><a title="Permanent Link to <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
				
				<?php endwhile; ?>		
			</ul>
            

			<?php if (function_exists('wp_tag_cloud')) { ?>
			
				<span class="list1" id="tagcloud">
					<?php wp_tag_cloud('smallest=10&largest=18'); ?>
				</span>
			
			<?php } ?>					


        </div>               
        <!--/spacer -->
        
        <div class="bot"></div>
        
    </div>
    <!--/box2 -->

	<?php
                    
    	$showasides = get_option('woo_show_asides');
                
        if ($showasides) { 
                            
    ?>

    <div class="box2">
        
        <div class="top"></div>
        
        <div class="spacer">

            <h5><span class="fl">Asides</span> <a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ico-misc.gif" alt="" class="fr" /></a></h5>
            
            <ul class="list2">
        
        	<?php 
        		$asides = get_option('woo_asides_entries');
        		include(TEMPLATEPATH . '/includes/version.php');
        		
        		$the_query = new WP_Query('cat=' . $ex_aside . '&showposts=' . $asides . '&orderby=post_date&order=desc');
        		while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
        	?>
                
                <li><?php the_content(); ?></li>
            
            <?php endwhile; ?>
            
            </ul>
       
        </div><!--/spacer -->
        
        <div class="bot"></div>
    
    </div><!--/box2 -->
    
    <?php } ?>

	<?php include('ads/ads-bottom.php'); ?>

	<?php if (get_option('woo_flickr_id') != "") { ?>
    
    <div class="box2">
        <div class="top"></div>
        <div class="spacer flickr">
            
            <h5>Latest <span style="color:#0063DC">Flick</span><span style="color:#FF0084">r</span> photos</h5>
            <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=<?php echo get_option('woo_flickr_entries'); ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo get_option('woo_flickr_id'); ?>"></script>		
		
		</div><!--/spacer -->
        <div class="fix"></div>        
        <div class="bot"></div>
    </div>
    <!--/box2 -->
    
    <?php } ?>
    
    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : endif ?>
    		
</div><!--/rightcol-->

<div class="fix"></div>
