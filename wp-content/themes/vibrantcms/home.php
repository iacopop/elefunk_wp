<?php get_header(); ?>

		<?php
            
            $layout = get_option('woo_layout');

            include('layouts/'.$layout);
            
        ?>      

<?php get_footer(); ?>