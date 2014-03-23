 jQuery(document).ready(function(){
    
     jQuery(".post-left").each(function(i){
     var left_height = jQuery(this).height();
     var right_height = jQuery(this).next(".post-right").height();
     if( left_height > right_height ){ jQuery(this).next(".post-right").css('height',left_height )  }
     if( left_height < right_height ){ jQuery(this).css('height',right_height ) }
     });
     
     //Hide them pesky no-contents
     jQuery('.left:empty').hide();
     jQuery('.right:empty').hide();

    });