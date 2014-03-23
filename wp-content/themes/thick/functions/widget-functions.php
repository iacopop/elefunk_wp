<?php

// Input Option: Listing Link Categories
function DisplayLinkCats($name,$select)
{
	$linkcats = array();
	$linkcats = get_categories('type=link');
	
	echo '<p><label for="' . $name .  '_category">Link Category:
					<select name="' . $name .  '_category" class="widefat" style="width: 94% !important;">';
	
	foreach ( $linkcats as $singlecat ) {
		
		if ( $select == $singlecat->cat_name ) { echo '<option value="' . $singlecat->cat_name . '" selected="selected">' . $singlecat->cat_name . '</option>'; }
			else { echo '<option value="' . $singlecat->cat_name . '">' . $singlecat->cat_name . '</option>'; }
		
	}
	
	echo '</select></label></p>';

}

// Display Bookmarks from specific link category
function DisplayBookmarks($category,$resizer,$size_x,$size_y)
{									
	$bookmarks = array();
	$bookmarks = get_bookmarks('category_name=' . $category . '&orderby=rand');
										
	foreach ( $bookmarks as $bookmark ) {
									
?>
	
	<?php if ( $resizer <> 'on' ) { ?>
		<li><a href="<?php echo clean_url($bookmark->link_url); ?>" title="<?php echo $bookmark->link_name; ?>" target="_blank"><img src="<?php echo $bookmark->link_image; ?>" alt="<?php echo $bookmark->link_name; ?>" /></a></li>
	<?php } else { ?>
		<li><a href="<?php echo clean_url($bookmark->link_url); ?>" title="<?php echo $bookmark->link_name; ?>" target="_blank"><img src="<?php echo bloginfo('template_url'); ?>/thumb.php?src=<?php echo $bookmark->link_image; ?>&amp;h=<?php echo $size_y; ?>&amp;w=<?php echo $size_x; ?>&amp;zc=1&amp;q=90" alt="<?php echo $bookmark->link_name; ?>" /></a></li>
	<?php } ?>
											
<?php }

}

// Display Option: Use Dynamic Image Resizer
function DisplayResizeOption($name,$checked)
{
	
	if ( $checked ) {
	
		echo '<p>
			<label for="' . $name .  '_resize">Use Dynamic Image Resizer?
			<input id="' . $name .  '_resize" name="' . $name .  '_resize" type="checkbox" checked></label></p>';	

	} else {

		echo '<p>
			<label for="' . $name .  '_resize">Use Dynamic Image Resizer?
			<input id="' . $name .  '_resize" name="' . $name .  '_resize" type="checkbox"></label></p>';	
	
	}
	
}
	
?>