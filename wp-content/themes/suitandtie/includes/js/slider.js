jQuery(document).ready(function(){



    var slide_count = jQuery('#featured-slider .featured-slide').length;
    
    if(slide_count > 1){
    
    var counter = 0;

    //Init 
    jQuery('#featured-slider .featured-slide').each(function(){
    
        counter++;
        
        jQuery(this).addClass('featured-slide-' + counter);
    
    if(counter >= 2){
            jQuery(this).fadeOut();
         }
    else {
        jQuery(this).addClass('current-slide');
    } 
            
    });
    
    
    //Events
        
    //Events - Click
    jQuery('#slider-nav .right').click(function(){
                  
      jQuery('#featured-slider').children('.current-slide').fadeOut();
      
     // Last slide check 
      if(jQuery('#featured-slider .featured-slide:last').hasClass('current-slide')){

          jQuery('#featured-slider .featured-slide:last').removeClass('current-slide');
          jQuery('#featured-slider .featured-slide:first').addClass('current-slide'); 
          jQuery('#featured-slider .featured-slide:first').fadeIn('fast'); 
            
        }
        
        else {
           
       jQuery('#featured-slider').children('.current-slide').removeClass('current-slide').next('.featured-slide').addClass('current-slide').fadeIn('fast')
       
        }
     
    });
    
    jQuery('#slider-nav .left').click(function(){
    
    jQuery('#featured-slider').children('.current-slide').fadeOut('fast');

     if(jQuery('#featured-slider .featured-slide:first').hasClass('current-slide')){
     
            jQuery('#featured-slider .featured-slide:first').removeClass('current-slide');
            jQuery('#featured-slider .featured-slide:last').addClass('current-slide'); 
            jQuery('#featured-slider').children('.current-slide').fadeIn('fast');
     }
     else {                                                                                                                                                                                                                                              
            jQuery('#featured-slider').children('.current-slide').removeClass('current-slide').prev('.featured-slide').addClass('current-slide').fadeIn('fast')
       }
         
    }); 
    
    }
    else {
    jQuery('#slider-nav .left').hide();
    jQuery('#slider-nav .right').hide();
    }  
    
    
})