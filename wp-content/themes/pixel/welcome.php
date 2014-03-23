<div id="welcome">


<object width="340" height="280"><param name="movie" value="http://www.youtube.com/v/OdUg9PL59CI?fs=1&amp;hl=it_IT&amp;color1=0x5d1719&amp;color2=0xcd311b"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/OdUg9PL59CI?fs=1&amp;hl=it_IT&amp;color1=0x5d1719&amp;color2=0xcd311b" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="340" height="280"></embed></object>

<?php

echo "<h2>Oh Yeah - SUPER FUNK!!</h2><p>Benvenuti nel sito degli Elefunk! Qua troverete tutte le informazioni che vi servono per SPACCARE di brutto con la vostra band preferita. Video, foto e date dei concerti. E se volete sentire la nostra musica nel vostro locale o alla vostra festa <a href='$mysitefeed'>Contattateci</a></p>";
$mysitename = get_bloginfo('name');
$mysitefeed = get_bloginfo('rss2_url');

 if (get_option('greeting') || get_option('welcomemessage')) {
  if (get_option('greeting')) {
    echo "<h2>" . get_option('greeting') . "</h2>";
    }
  if (get_option('welcomemessage')) {
    echo "<p>" . get_option('welcomemessage') . "</p>";
    }
  } else {

}
 
?>



<?php
$myfeedname = get_option('feedname');

 if (get_option('feedname')) {
  echo "

<p>You can also subscribe by email by filling the field below:</p>

<form action='http://feedburner.google.com/fb/a/mailverify' method='post' target='popupwindow' onsubmit=\"window.open('http://feedburner.google.com/fb/a/mailverify?uri=$myfeedname', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true\">
<p>
<input type='text' name='email' id='feedbox' />
<input type='hidden' value='$myfeedname' name='uri'/>
<input type='hidden' name='loc' value='en_US'/>
<input type='submit' value='Subscribe' class='submitbutton' />
</p>
</form>


";
 }

 else {
  echo "";
 }
?>


</div><!-- Closes welcome -->