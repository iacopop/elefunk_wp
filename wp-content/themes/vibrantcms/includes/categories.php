<?php
	
	function inc_cats() {

		$categories = get_categories('hide_empty=0');
		$categories = array();
		$inc = '';
		$counter = 0;
		
		foreach ($categories as $cat) {
			
			$counter++;
			$inc .= $cat->cat_ID;
			
			if ( $counter <> count($categoires) ) { $inc .= ','; }
		
		}
		
		echo $inc;
	
	}	

?>