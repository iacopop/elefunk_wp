<?php

function mwb_style(){
    $style = $_REQUEST[style];
    if ($style != '') {
        $style_path = $style;
    } else {

        global $style_path;
        
        $stylesheet = get_option('woo_alt_stylesheet');
        
        if ( $stylesheet == 'default.css' ) { $style_path = 'default'; }
        elseif ( $stylesheet == 'gray.css' ) { $style_path = 'gray'; }
        elseif ( $stylesheet == 'green.css' ) { $style_path = 'green'; }
        elseif ( $stylesheet == 'pink.css' ) { $style_path = 'pink'; }
        elseif ( $stylesheet == 'rust.css' ) { $style_path = 'rust'; }
        else { $style_path = 'default'; }
    
    }
}

function get_inc_categories($label) {
    
    $include = '';
    $counter = 0;
    $cats = get_categories('hide_empty=0');
    
    foreach ($cats as $cat) {
        
        $counter++;
        
        if ( get_option( $label.$cat->cat_ID ) == 'false' ) {
            if ( $counter <> 1 ) { $include .= ','; }
            $include .= $cat->cat_ID;
            }
    
    }
    
    return $include;

}


function quickadd_head() { 
?>
<link rel="stylesheet" href="http://colourlovers.com.s3.amazonaws.com/COLOURloversColorPicker/COLOURloversColorPicker.css" type="text/css" media="all" />
<script type="text/JavaScript" src="http://colourlovers.com.s3.amazonaws.com/COLOURloversColorPicker/js/COLOURloversColorPicker.js"></script>

<?php }

function quickadd_foot() { ?>
<div id="CLCP" class="CLCP"></div>
<script type="text/JavaScript">
_whichField = "hexValue_0";
CLCPHandler = function(_hex) {
// This function gets called by the picker when the sliders are being dragged. The variable _hex contains the current hex value from the picker
// This code serves as an example only, here we use it to do three things:
// Here we simply drop the variable _hex into the input field, so we can see what the hex value coming from the picker is:
document.getElementById(_whichField).value = _hex;
}
// Settings:
_CLCPdisplay = "none"; // Values: "none", "block". Default "none"
_CLCPisDraggable = true; // Values: true, false. Default true
_CLCPposition = "absolute"; // Values: "absolute", "relative". Default "absolute"
_CLCPinitHex = "0039B3"; // Values: Any valid hex value. Default "ffffff"
CLCPinitPicker();
</script> 
<?php
}


add_action('admin_head', 'quickadd_head');    
add_action('admin_footer', 'quickadd_foot');

?>