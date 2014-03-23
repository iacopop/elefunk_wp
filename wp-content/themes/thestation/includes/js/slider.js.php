<script type="text/javascript">
<!--


jQuery(document).ready(function () {

var jQuerypanels = jQuery('#slider .scrollContainer > div');
var jQuerypanelsFirst = jQuery('#slider .scrollContainer .information-1');
var jQuerypanelsFirstWidth =  jQuerypanelsFirst.width() + 40;
var jQuerycontainer = jQuery('#slider .scrollContainer');
var horizontal = true;
        
if (horizontal) {
  jQuerypanels.css({
    'float' : 'left',
    'position' : 'relative' // IE fix to ensure overflow is hidden
  });
  var the_f_width =  jQuerypanelsFirstWidth * jQuerypanels.length;
  jQuerycontainer.css('width', the_f_width);
}
    
var jQueryscroll = jQuery('#slider .scroll').css('overflow', 'hidden');
jQueryscroll
  .before('<img class="scrollButtons left arrow_left" src="<?php bloginfo('stylesheet_directory'); ?>/img/sliderarrow_left.png" />')
  .after('<img class="scrollButtons right arrow_right" src="<?php bloginfo('stylesheet_directory'); ?>/img/sliderarrow_right.png" />');
    

function selectNav() {
  jQuery(this)
    .parents('ul:first')
      .find('a')
        .removeClass('selected')
      .end()
    .end()
    .addClass('selected');
}

jQuery('#slider .navigation').find('a').click(selectNav);

function trigger(data) {
  var el = jQuery('#slider .navigation').find('a[hrefjQuery="' + data.id + '"]').get(0);
  selectNav.call(el);
}


if (window.location.hash) {
  trigger({ id : window.location.hash.substr(1) });
} else {
  jQuery('ul.navigation a:first').click();
}


var offset = parseInt((horizontal ? 
  jQuerycontainer.css('paddingTop') : 
  jQuerycontainer.css('paddingLeft')) 
  || 0) * -1;

var scrollOptions = {
  target: jQueryscroll, items: jQuerypanels, navigation: '.navigation a', prev: 'img.left', next: 'img.right', axis: 'xy', onAfter: trigger, offset: offset, duration: 500, easing: 'swing'
};

jQuery('#slider').serialScroll(scrollOptions);
jQuery.localScroll(scrollOptions);
scrollOptions.duration = 1;
jQuery.localScroll.hash(scrollOptions);

});
-->
</script>