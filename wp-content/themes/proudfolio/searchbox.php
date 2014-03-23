		<div class="search">
							
			<h2><label for="s"><?php _e('Search the site', 'sandbox') ?></label></h2>
			
			<form id="searchform" method="get" action="<?php bloginfo('home') ?>">
				<input id="s" name="s" class="textInput" type="text" value="<?php the_search_query() ?>" size="10" tabindex="1" accesskey="S" />
				<input id="searchsubmit" name="searchsubmit" class="submitButton" type="submit" value="<?php _e('Find', 'sandbox') ?>" tabindex="2" />
			</form>
							
			<ul>
				<li><a href="<?php echo $GLOBALS['portfolio_link']; ?>" title="Portfolio Archives">Portfolio Archives</a></li>
				<li><a href="<?php echo $GLOBALS['blog_link']; ?>" title="Blog Archives">Blog Archives</a></li>
			</ul>
						
		</div><!-- END .search -->