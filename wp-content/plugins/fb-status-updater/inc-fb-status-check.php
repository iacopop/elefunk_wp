<?php
$fbEmail = null;
$fbPassword = null;
$wp_version = null;
if (isSet($_GET["wp_version"]) && strlen(trim($_GET["wp_version"])) > 0 ) {
	$wp_version = $_GET["wp_version"];
}
if (isSet($_GET["fbEmail"]) && strlen(trim($_GET["fbEmail"])) > 0 ) {
	$fbEmail = $_GET["fbEmail"];
	if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $fbEmail)) {
		echo("<p class=\"error\">Email not valid</p>");
		exit();
	}
}
if (isSet($_GET["fbPassword"]) && strlen(trim($_GET["fbPassword"])) > 0 ) {
	$fbPassword = $_GET["fbPassword"];
}

if (($fbEmail !== null) && ($fbPassword !== null)) {
	if (!is_writable($fbStatusCookieFile)) {
		echo("<p class=\"error\">There was an error while logging into Facebook: the file <strong>".$fbStatusCookieFile."</strong> is not writable by PHP. Please ensure PHP has the correct permissions set to write and update that file. If you don't know what I'm speaking about, please contact your server admin / webmaster. <a href=\"http://codex.wordpress.org/Changing_File_Permissions\" target=\"_blank\">More about file permissions on Wordpress</a></p>");
		exit();
	} else {
		$loginUrl = "https://login.facebook.com/login.php?m&locale=en_US&next=http://m.facebook.com/home.php%3Flocale=en_US";
		$postData = "locale=en_US&email=".$fbEmail."&pass=".$fbPassword."&persistent=1&login=".urlencode("Log In");

		// clean the session data before starting
		// the file should already be clean but... you never know if someone else touches it with some malicious plugin
		deleteFbSessionData();

		$loginResponse = getPage($loginUrl, $postData);

		// if the redirect can't be followed due to php restriction, add a second call to the FB home
		if(ini_get('safe_mode') || ini_get("open_basedir")) {
			$homeUrl = "http://m.facebook.com/home.php?locale=en_US";
			$loginResponse = getPage($homeUrl);
		}

		if (strpos($loginResponse, "type=\"password\"") !== false) {

			preg_match('/<body>(.*?)<\/body>/i', $loginResponse, $modal);

			echo("<p class=\"error\">Login failed. <a href=\"#\" class=\"jqModal\">See what Facebook says</a></p>");
			echo("<script type=\"text/javascript\">jQuery().ready(function() { jQuery('#dialog').jqm(); });</script>");
			echo("<div class=\"jqmWindow\" id=\"dialog\">".$modal[1]."<br /><br /><textarea cols=\"70\" rows=\"2\">".$modal[1]."<hr />wp version: [".$wp_version."]<br />php version: [".phpversion()."]</textarea><br /><a href=\"#\" class=\"jqmClose\">Close</a></div>");	
		} else {
			echo("<p class=\"updated fade\">Woot! Logged into facebook :)</p>");
		}
		deleteFbSessionData();
	}
}
?>