jQuery(document).ready(function(){

        jQuery('.portfolio-meta').hover(function(){
            jQuery(this).prev('.thumbnail').stop().animate({
                opacity: 0.3
            },500)
        },function(){
             jQuery(this).prev('.thumbnail').stop().animate({
                opacity: 1
            },500)
        })
        
        var img_rel = '';


            
            
        jQuery('.portfolio-thumb-preview img').click(function(){
            
            img_rel = jQuery(this).attr('rel');
            img_alt = jQuery(this).attr('alt');
            
           

            
             jQuery('.portfolio-preview img').add('.portfolio-preview span')
             .stop().animate({
                opacity: 0
             },200,"linear",function(){jQuery(this).fadeOut(50)})
             
             
             
             setTimeout(function(){
                    jQuery('.portfolio-preview span').html(img_alt);
                    jQuery('.portfolio-preview .thumbnail').attr('src',img_rel); 
                    
                    var new_image_h = jQuery('.portfolio-preview .thumbnail').height();
                    
                    jQuery('.portfolio-preview')
                             .stop().animate({
                                height: new_image_h
                             });
                       jQuery('.portfolio-preview img').add('.portfolio-preview span').show()
                         .stop().animate({
                            opacity: 1
                         },500);

             },1000);
             

        });

     
    
})

jQuery(window).load(function(){
    
    var init_height = jQuery('.portfolio-preview .thumbnail').height();
    jQuery('.portfolio-preview').height(init_height);
    
});