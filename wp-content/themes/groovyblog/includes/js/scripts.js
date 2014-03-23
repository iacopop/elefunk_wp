jQuery(document).ready(function(){


    
    jQuery("#featured-tabber ul li > a").click(function(evt){

        var clicked_tab_id = jQuery(this).attr("rel");
        
        jQuery("#featured-tabber ul li").removeClass('current');
        jQuery(this).parent().addClass('current');
        
        
        
        jQuery("#info .tabber-post-content").fadeOut(200);
        
        var new_height = jQuery("#info .tabber-item-" + clicked_tab_id).height();
        
        jQuery("#info").animate({         
            height : new_height },
            600);
       
         
       setTimeout( function(){
            jQuery("#info .tabber-item-" + clicked_tab_id).fadeIn();} ,
             800);
             
     evt.preventDefault();

       
    })




    jQuery('.readmore:empty').remove();
    
    jQuery('#catmenu').click(function(evt){
        jQuery(this).next().toggle();
        evt.preventDefault(); 

    })
         
     
     // Home Photo Gallery
     
     var gallery_counter = 0;
     var rel_init = 6;
     var photo_jump = 5;
     var new_rel = 6;
     var old_rel = 6;
     
     var slide_count = jQuery('#about_gallery .gallery ul li').length;
     
     jQuery('#about_gallery .gallery ul > li').fadeOut(); // Fade all out
     
     
     
     jQuery('#about_gallery .gallery .nav-right').attr('rel',rel_init)
     
     jQuery('#about_gallery .gallery ul li').each(function(){   // Setup the classes
         gallery_counter++;   
         jQuery(this).addClass('image-'+gallery_counter);
   
     })
     
     jQuery('#about_gallery .gallery ul li.image-1').fadeIn(); // Fade all out  
     jQuery('#about_gallery .gallery ul li.image-2').fadeIn(); // Fade all out  
     jQuery('#about_gallery .gallery ul li.image-3').fadeIn(); // Fade all out  
     jQuery('#about_gallery .gallery ul li.image-4').fadeIn(); // Fade all out  
     jQuery('#about_gallery .gallery ul li.image-5').fadeIn(); // Fade all out  
     
    jQuery('#about_gallery .gallery .nav-right').click(function(){   // Click action
    
        if(new_rel > slide_count){ new_rel = 1}
    
        old_rel = new_rel;
        new_rel = new_rel + photo_jump;
        
        //alert(old_rel); 
        //alert(new_rel); 
        
        jQuery(this).attr('rel',new_rel);
        
        jQuery('#about_gallery .gallery ul > li').fadeOut("100");
        
        setTimeout(function(){

            for(var i = old_rel; i < new_rel; i++){
            jQuery('#about_gallery .gallery ul li.image-'+i).fadeIn();
            
            }
        },600);
           
        
        
    }) 
     
     
})