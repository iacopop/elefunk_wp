	<!-- header-alt -->
	<div id="header-alt" class="container_16">
		
		<!-- nav -->
		<ul id="nav" class="grid_8">
            <li <?php if ( is_home() ) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
            <?php wp_list_pages('sort_column=menu_order&title_li=&depth=1'); ?>
		</ul>
		<!-- /nav -->
		
		<!-- subscribe -->
		<div id="subscribe" class="grid_8 omega">
			
			<!-- search -->
			<form method="get" id="search" action="<?php bloginfo('home'); ?>/">
				<div>
					<input type="text" value="Enter search keyword" onclick="this.value='';" name="s" id="s" />
					<input type="image" name="search-button" id="search-button" src="<?php bloginfo('stylesheet_directory'); ?>/<?php echo woo_style_path(); ?>/images/search-button-alt.gif" alt="Search" />
				</div>
			</form>
			<!-- /search -->
			
			<ul>
				<li><span class="icon-feed"><a href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>">Full Posts</a></span> <span>|</span></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a> <span>|</span></li>
				<li><a href="http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php $feedburner_id = get_option('woo_feedburner_id'); echo $feedburner_id; ?>" target="_blank">By Email</a></li>
			</ul>
			
		</div>
		<!-- /subscribe -->
		
		<div class="clear">&nbsp;</div>
		
		<!-- header-alt-bottom -->
		<div id="header-alt-bottom">
			
			<!-- branding -->
			<div id="branding" class="grid_9">
				<div id="logo"><a href="<?php echo get_option('home'); ?>/"><img src="<?php if ( get_option('woo_logo') <> "" ) { echo get_option('woo_logo'); } else { ?><?php bloginfo('stylesheet_directory'); ?>/<?php echo woo_style_path(); ?>/images/logo.gif <?php } ?>" alt="" /></a></div>
				<div id="description"><?php bloginfo('description'); ?></div>
			</div>
			<!-- /branding -->

			<!-- photos -->
			<div id="photos" class="grid_7 omega">
				<h2>Recent Photos</h2>
					<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=5&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo get_option('woo_flickr_id'); ?>"></script>
			</div>
			<!-- /photos -->

			<!-- status -->
			<div id="status" class="grid_16 alpha omega">
				<div id="status-twitter">&nbsp;</div>
				<p><ul id="twitter_update_list"><li></li></ul></p>
			</div>
			<!-- /status -->

			<div class="clear">&nbsp;</div>
			
		</div>
		<!-- /header-alt-bottom -->
		
	</div>
	<!-- /header-alt -->