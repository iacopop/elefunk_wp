			<div class="portfolio_item grid_6 <?php if ( $counter == 1 ) { echo 'alpha'; } else { echo 'omega'; $counter = 0; } ?>">
			
				<h2><?php the_title(); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">(View)</a></h2>
				
				<div class="portfolio_thumb">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php woo_get_image('thumb',get_option('woo_portfolio_resizer'),'320','200','thumbnail'); ?></a>
				</div><!-- /portfolio_thumb -->
			
			</div><!-- /portfolio_item -->