jQuery(document).ready(function(){
		jQuery('#featured div').hide(); // Hide all divs
		jQuery('#featured div:first').show(); // Show the first div
		jQuery('#featured div:first div').show();
		jQuery('#featured-tabs li:first').addClass('active'); // Set the class of the first link to active
		jQuery('#featured-tabs li a').click(function(){ //When any link is clicked
		jQuery('#featured-tabs li').removeClass('active'); // Remove active class from all links
		jQuery(this).parent().addClass('active'); //Set clicked link class to active
		var currentTab = jQuery(this).attr('href'); // Set variable currentTab to value of href attribute of clicked link
		jQuery('#featured div').hide(); // Hide all divs
		jQuery('#featured div div').show();
		jQuery(currentTab).show(); // Show div with id equal to variable currentTab
		return false;
		});
		});