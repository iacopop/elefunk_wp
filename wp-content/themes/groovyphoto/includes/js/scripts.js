jQuery(document).ready(function(){
    
    jQuery('.readmore:empty').remove();
    
    jQuery('#catmenu').click(function(evt){
        jQuery(this).next().toggle();
        evt.preventDefault(); 

    })

});