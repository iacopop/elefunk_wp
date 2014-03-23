<div id="sidebar" class="grid_6">
	
	<!-- Widgetized Sidebar Top -->    						
	<?php dynamic_sidebar(1); ?>		
    
    <!-- TABS STARTS -->           
	<?php if (get_option('woo_tabs') == "false") { ?>
    <div class="box2">
           
        <ul class="idTabs">
			<li><a href="#pop">Popular</a></li>
            <li><a href="#comm">Comments</a></li>
            <li><a href="#tagcloud">Tags</a></li>
        </ul>
        
        <div class="spacer white">

            <ul class="list1" id="pop">            
                <?php include(TEMPLATEPATH . '/includes/popular.php' ); ?>                    
            </ul>

			<ul class="list1" id="comm">
                <?php include(TEMPLATEPATH . '/includes/comments.php' ); ?>                    
			</ul>	
            
            <div class="list1" id="tagcloud">
                <?php wp_tag_cloud('smallest=10&largest=18'); ?>
            </div>
			
        </div>               
        <!--/spacer -->
        
    </div>
    <!--/box2 -->
    <?php } ?>
    <!-- TABS END -->  
             
	<?php dynamic_sidebar(2); ?>		
    
    <div class="clear"></div>

	<div class="grid_3 alpha">
		<?php dynamic_sidebar(3); ?>		
	</div><!--/grid_3 alpha-->
		
	<div class="grid_3 omega">
		<?php dynamic_sidebar(4); ?>		
	</div><!--/grid_3 omega-->	
    
    <div class="clear"></div>
    		
</div><!--/sidebar-->

<div class="fix"></div>
