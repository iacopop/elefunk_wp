	<!-- header -->
	<div id="header" class="container_16">
		
		<!-- branding -->
		<div id="branding" class="grid_4">
			<div id="logo"><a href="<?php echo get_option('home'); ?>/"><img src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo'); } else { ?><?php bloginfo('stylesheet_directory'); ?>/<?php echo woo_style_path(); ?>/images/logo.gif <?php } ?>" alt="" /></a></div>
			<div id="description"><?php bloginfo('description'); ?></div>
		</div>
		<!-- /branding -->
		
		<!-- header-mid -->
		<div id="header-mid" class="grid_9 alpha omega">
			
			<!-- subscribe -->
			<div id="subscribe">			

				<ul>
					<li><span class="icon-feed"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">Full Posts</a></span> <span>|</span></li>
					<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a> <span>|</span></li>
					<li><a href="http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php $feedburner_id = get_option('woo_feedburner_id'); echo $feedburner_id; ?>" target="_blank">By Email</a></li>
				</ul>
				
				<!-- search -->
				<form method="get" id="search" action="<?php bloginfo('home'); ?>/">
					<div>
						<input type="text" value="Enter search keyword" onclick="this.value='';" name="s" id="s" />
						<input type="image" name="search-button" id="search-button" src="<?php bloginfo('stylesheet_directory'); ?>/<?php echo woo_style_path(); ?>/images/search-button.gif" alt="Search" />
					</div>
				</form>
				<!-- /search -->

			</div>
			<!-- /subscribe -->
			
			<!-- status -->
			<div id="status">
				<div id="status-twitter">&nbsp;</div>
				<p><strong>Currently:</strong></p>
                <p><ul id="twitter_update_list"><li></li></ul></p>
			</div>
			<!-- /status -->
			
			<!-- nav -->
			<ul id="nav">
            <li <?php if ( is_home() ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
            <?php wp_list_pages('sort_column=menu_order&title_li=&depth=1'); ?>
			</ul>
			<!-- /nav -->
			
		</div>
		<!-- /header-mid -->
		
		<!-- about -->
		<div id="about" class="grid_3 alpha omega">			
			<ul>
				<li class="widget">
					<h2>About the Author</h2>
					<p><?php echo stripslashes( get_option('woo_about') ); ?></p>
					<?php if ( get_option('woo_aboutlink') <> "" ) { ?><p class="more"><a href="<?php echo stripslashes( get_option('woo_aboutlink') ); ?>">Read More...</a></p><?php } ?>
				</li>
			</ul>			
		</div>
		<!-- /about -->
		
		<div class="clear">&nbsp;</div>
		
	</div>
	<!-- /header -->