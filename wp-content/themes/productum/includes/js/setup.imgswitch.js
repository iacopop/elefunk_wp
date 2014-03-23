jQuery('#loader').hide();

// DOM ready
jQuery(function () {
	//alert('test');
	jQuery('#showcase li a').click( function(){
		jQuery('#loader').show();
		jQuery('#featured').load(function () {
			jQuery('#loader').hide();
			return;
		}).error(function () {
			alert("Failed to load image");
		}).attr('src', this.href);
		
		var linkout = jQuery(this).attr('rel');
		//alert(linkout);
		jQuery('#featured-link').attr('href',linkout);
		jQuery('#showcase li a').removeClass('active');
		jQuery(this).addClass('active');
		return false;
	});
});