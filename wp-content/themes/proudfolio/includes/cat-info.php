<?php
			
			$homeurl = get_bloginfo('home');

			$portfoliocat = get_option('woo_portfoliocat'); // ID of the Portfolio Category
			$portfoliotest = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$portfoliocat'");

			$blogcat = get_option('woo_blogcat'); // ID of the Blog Category
			$blogtest = $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE name='$blogcat'");	
			
			$GLOBALS['allcats'] = get_categories('hierarchical=0&hide_empty=0');
			
			$displayportfolio = false;
			$displayblog = false;
			
			foreach ( $GLOBALS['allcats'] as $cat ) {
			
				// IF THIS IS A PORTFOLIO CATEGORY
				if ( $cat->cat_ID == $portfoliotest ) {
					
					$GLOBALS['portfolio_id'] = $cat->cat_ID;
					$GLOBALS['portfolio_perm'] =  $cat->category_nicename;
					$GLOBALS['portfolio_link'] =  $homeurl . '/' . $cat->category_nicename;
					$GLOBALS['portfolio_rss'] =  $homeurl . '/category/' . $cat->category_nicename . '/feed/';
					
				} // ENDIF		

				// IF THIS IS A BLOG CATEGORY
				if ( $cat->cat_ID == $blogtest ) {
					
					$GLOBALS['blog_id'] = $cat->cat_ID;
					$GLOBALS['blog_perm'] =  $cat->category_nicename;
					$GLOBALS['blog_link'] =  $homeurl . '/' . $cat->category_nicename;
					$GLOBALS['blog_rss'] =  $homeurl . '/category/' . $cat->category_nicename . '/feed/';
					
				} // ENDIF				
			
			} // END FOREACH

?>