			<div class="portfolio_item grid_4 <?php if ( $counter == 1 ) { echo 'alpha'; } elseif ( $counter == 3 ) { echo 'omega'; $counter = 0; } ?>">
			
				<h2><?php the_title(); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">(View)</a></h2>
				
				<div class="portfolio_thumb">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php woo_get_image('thumb',get_option('woo_portfolio_resizer'),'200','140','thumbnail'); ?></a>
				</div><!-- /portfolio_thumb -->
			
			</div><!-- /portfolio_item -->
			
			<?php if ( $counter == 0 ) { ?><div class="fix"></div><?php } ?>