jQuery(document).ready(function(){

    

        initSlider();



});



// Video Slider

function initSlider(){

    



     var slidesAmount = jQuery("#sidebar #video-browser li").length; // Calculate the Amount of slides

     var slidesHeight = jQuery("#sidebar #video-browser").height();

     //Getting the first 5 list items dynamicly

     var cropHeightTemp  = 0;

     var cropHeight  = 0;

     for (i = 1; i <= 5; i++)

        {

            cropHeightTemp = jQuery("#sidebar #video-browser li." + i ).height();

            cropHeight = cropHeight + cropHeightTemp + 2; // 2 is for borders

        }

     var nudgeValue = 0;

     var nudgeIncroment = (cropHeight - 25) * -1;

     var slidesAmountOffset = slidesAmount - 3; // Adjust for the negative ovelap 



     var nudgeMax = (slidesHeight + nudgeIncroment) * -1; // Calculate and store the max possible length of the carousel



    jQuery('#sidebar #video-browser-crop').css('height',cropHeight);

    jQuery('#sidebar #video-browser-crop').before('<div class="video-browser-up"></div>');

    jQuery('#sidebar #video-browser-crop').after('<div class="video-browser-down"></div>');

    

    jQuery(".video-browser-down").click(function(){

        if(nudgeValue <= nudgeMax)

        {   

            nudgeValue = 0;

            jQuery("#sidebar #video-browser").animate({

                marginTop: nudgeValue

            },1000);

        } 

        else 

        {   

            //alert('d - b')

            nudgeValue =  nudgeValue + nudgeIncroment;

            if (nudgeValue < nudgeMax){ nudgeValue = nudgeMax;}

            jQuery("#sidebar #video-browser").animate({

                marginTop: nudgeValue

            }, 400);      

        }

    }); 

    

    jQuery(".video-browser-up").click(function(){

        if(nudgeValue >= 0)

        {

            nudgeValue = nudgeMax;

            jQuery("#sidebar #video-browser").animate({

                marginTop: nudgeMax

            },1000);

        } 

        else 

        {               

            nudgeValue =  nudgeValue - nudgeIncroment;

            if (nudgeValue > 0) {nudgeValue = 0}

            jQuery("#sidebar #video-browser").animate({

                marginTop: nudgeValue

            }, 400);      

        }

    });

};

