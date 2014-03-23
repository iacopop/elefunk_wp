jQuery(document).ready(function() {

// Drop downs

jQuery('#pagenav > li ul').mouseover(function(){
	jQuery(this).parent().addClass('current_page_item');
});
jQuery('#pagenav > li ul').mouseout(function(){
	jQuery(this).parent().removeClass('current_page_item');
});


// Remove borders, etc

jQuery("#nav ul li:last").css("background","none");
jQuery("#featured-tabs li:first").css("border-top","0");
jQuery("#featured-tabs li:last").css("border-bottom","0");
jQuery("#news ul li:last").css("border-bottom","0");
jQuery("#comments_wrap ol li ul.children li").css("border-bottom","0");
jQuery(".widget ul li:last-child").each(function(){
	jQuery(this).css("border-bottom","0");
});

// Equal heigts for featured area

var featured_left;

featured_left = jQuery("#tab-1").height();

	if(jQuery("#tab-2").height() > featured_left){featured_left = jQuery("#tab-2").height();}
	if(jQuery("#tab-3").height() > featured_left){featured_left = jQuery("#tab-3").height();}
	if(jQuery("#tab-4").height() > featured_left){featured_left = jQuery("#tab-4").height();}
	if(jQuery("#tab-5").height() > featured_left){featured_left = jQuery("#tab-5").height();}
	if(jQuery("#tab-6").height() > featured_left){featured_left = jQuery("#tab-6").height();}

featured_left = featured_left;

var featured_right;
featured_right = jQuery("#featured-tabs").height();
featured_right = featured_right;

	if(featured_left > featured_right){
		jQuery('#featured-tabs').height(featured_left + 40);
		jQuery('.information').height(featured_left);
	}
	else if(featured_right > featured_left){
		jQuery('.information').height(featured_right - 40);						
	};

var tabs; tabs = jQuery("#featured-tabs").height();
	
});