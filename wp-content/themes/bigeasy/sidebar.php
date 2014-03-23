<!-- Sidebar Starts -->
					<div id="sidebar">

                        <p id="skiptocontent"><a href="#content">Skip to content</a></p>
                        
                        <h1 id="title"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('Title'); ?></a></h1>
                        <ul id="nav">
                            <li <?php if (is_home()){ echo 'class="current_page_item"'; } ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
                            <?php if(get_option('woo_port_in_nav') == 'true'){ 
                                                        $in_subcategory_blogs = false;
                                                        $cat_id = get_cat_id(get_option('woo_portfolio_cat'));
                                                        foreach( explode( "/", get_category_children( $cat_id ) ) as $child_category ) {
                                                            if(in_category($child_category)) $in_subcategory_blogs = true;
                                                        }
                                                        
                            ?>
                            <li <?php if ((is_category(get_option('woo_portfolio_cat')) || in_category($cat_id) || $in_subcategory_blogs == true) && !is_page() && !is_home()){ echo 'class="current_page_item"'; } ?>><a href="<?php echo get_category_link($cat_id); ?>"><?php echo get_cat_name($cat_id); ?></a></li>
                            
                            
                             <?php } ?>
                            <?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
                        </ul>
						
						<!-- Widgetized Sidebar -->	
						<?php dynamic_sidebar(1); ?>
                        

                        
                        <div id="sidebar-border"></div><!-- end sidebar-border -->
                    </div><!-- end sidebar -->
<!-- Sidebar Ends -->