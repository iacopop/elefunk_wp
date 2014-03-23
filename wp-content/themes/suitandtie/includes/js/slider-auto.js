jQuery(document).ready(function(){

    var timeout = 5000; // Change your slider timeout time 

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
    
    //Auto Event    
        jQuery('#featured-slider .current-slide')
               .fadeIn( function() 
               {
                  setTimeout( function()
                  {
                    jQuery('#featured-slider .current-slide').fadeOut("fast").removeClass('current-slide').next().addClass('current-slide');
                    doSliderAni();
                  }, timeout );
               });
               
               function doSliderAni(){
                      jQuery('#featured-slider .current-slide')
                           .fadeIn( function() 
                           {
                              setTimeout( function()
                              {
                                if( jQuery('#featured-slider .current-slide').next().attr('class') == 'clear' ){
 
                                     jQuery('#featured-slider .current-slide').fadeOut("fast").removeClass('current-slide');
                                     jQuery('.featured-slide-1').addClass('current-slide');
                                     //alert('B');  
                                     doSliderAni(); 
                                     
                                }
                                else {
                                    jQuery('#featured-slider .current-slide').fadeOut("fast").removeClass('current-slide').next().addClass('current-slide');
                                    //alert('A');  
                                    doSliderAni();
                                }
                                }, timeout );
                       });
               }

         
        
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