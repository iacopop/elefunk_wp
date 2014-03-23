<?php
function fbStatusOptionPage(){

	if (!function_exists("curl_init")) {
		echo("This plugin requires <a href=\"http://www.php.net/curl\">Curl library</a> in order to run properly. Install curl or disable this plugin");
	} else {

		global $fbStatusCookieFile, $fbStatusUpdaterVersion, $wp_version;

		if (isSet($_GET["clear-private-data"]) && $_GET["clear-private-data"] == "true") {
			delete_option('fb-status-update');

			$allposts = get_posts('numberposts=0&post_type=post&post_status=');
			foreach($allposts as $postinfo) {
				deletePostMeta($postinfo->ID);
				delete_post_meta($postinfo->ID, 'fb-status-updater-meta');
			}
			unset($allposts);

			$message = "Private data cleaned, now you can safely remove this plugin.";
		}

		$link_shortener = array(
			"bit.ly" => array (
				"http://bit.ly", // link
				true, // requires json
				array("bitly-api-login", "text", "Bit.ly API Login"), // first field
				array("bitly-api-key", "text", "Bit.ly API Key") //second field
			),
			"j.mp" => array(
				"http://j.mp/",
				true,
				array("jmp-api-login", "text", "J.mp API Login"),
				array("jmp-api-key", "text", "J.mp API Key")
			),
			"is.gd" => array("http://is.gd/", false, null, null),

			"su.pr" => array(
				"http://www.stumbleupon.com/developers/Su.pr_API_documentation/",
				false,
				array("supr-api-login", "text", "Su.pr API login"),
				array("supr-api-key", "text", "Su.pr API key")
			),
			"su.pr anonymous" => array("http://su.pr/", true, null, null),
			"tr.im" => array(
				"http://tr.im/",
				false,
				array("trim-username", "text", "Tr.im username"),
				array("trim-password", "Password", "Tr.im password")
			),
			"tr.im anonymous" => array("http://tr.im/", false, null, null)
		);

		$statusUpdate = get_option('fb-status-update');
		$fbEmail = null;
		$fbPassword = null;
		$fbDobDay = null;
		$fbDobMonth = null;
		$fbDobYear = null;
		$fbDebug = false;
		$fbPushAsProfileStatus = true;
		$fbPushAsProfileLink = false;
		$fbPage1Url = null;
		$fbPushAsPage1Status = false;
		$fbPushAsPage1Link = false;
		$fbShareAsLink = false;
		$fbShareIcon = null;
		$fbShareImage = null;
		$fbWallId = null;
		$fbWallId2 = null;
		$fbLogEmail = null;
		$fbPostIds = null;
		$twUser = null;
		$twPassword = null;
		$fbLongUrl = true;
		$lastCron = $statusUpdate["last-cron"];
		$cronTime = 30;
		$fbAdvancedStatus = false;
		$linkShortenerLogin = null;
		$linkShortenerPassword = null;
		$linkShortenerService = "is.gd";
		$defaultStatusTemplate = "%POST-TITLE% %POST-URL%";
		$myspaceEmail = null;
		$myspacePassword = null;
		$myspaceDefaultMood = null;
		$version = null;

		$message = false;
		$error = false;

		if ($statusUpdate !== false) {
			if (isSet($statusUpdate["version"])) {
				$version = $statusUpdate["version"];
			}
			if ($version == null || $version != $fbStatusUpdaterVersion) {
				// run activation
				$statusUpdate = fbStatusAct();
			}

			if (isSet($statusUpdate["fb-email"])) {
				$fbEmail = $statusUpdate["fb-email"];
			}
			if (isSet($statusUpdate["fb-password"])) {
				$fbPassword = $statusUpdate["fb-password"];
			}
			if (isSet($statusUpdate["fb-dob-day"])) {
				$fbDobDay = $statusUpdate["fb-dob-day"];
			}
			if (isSet($statusUpdate["fb-dob-month"])) {
				$fbDobMonth = $statusUpdate["fb-dob-month"];
			}
			if (isSet($statusUpdate["fb-dob-year"])) {
				$fbDobYear = $statusUpdate["fb-dob-year"];
			}
			if (isSet($statusUpdate["fb-debug"])) {
				$fbDebug = $statusUpdate["fb-debug"];
			}
			if (isSet($statusUpdate["fb-push-as-profile-status"])) {
				$fbPushAsProfileStatus = $statusUpdate["fb-push-as-profile-status"];
			}
			if (isSet($statusUpdate["fb-push-as-profile-link"])) {
				$fbPushAsProfileLink = $statusUpdate["fb-push-as-profile-link"];
			}
			if (isSet($statusUpdate["fb-page1-url"])) {
				$fbPage1Url = $statusUpdate["fb-page1-url"];
			}
			if (isSet($statusUpdate["fb-push-as-page1-status"])) {
				$fbPushAsPage1Status = $statusUpdate["fb-push-as-page1-status"];
			}
			if (isSet($statusUpdate["fb-push-as-page1-link"])) {
				$fbPushAsPage1Link = $statusUpdate["fb-push-as-page1-link"];
			}
			if (isSet($statusUpdate["fb-share-icon"])) {
				$fbShareIcon = $statusUpdate["fb-share-icon"];
			}
			if (isSet($statusUpdate["fb-share-image"])) {
				$fbShareImage = $statusUpdate["fb-share-image"];
			}
			if (isSet($statusUpdate["fb-log-email"])) {
				$fbLogEmail = $statusUpdate["fb-log-email"];
			}
			if (isSet($statusUpdate["fb-post-ids"])) {
				$fbPostIds = $statusUpdate["fb-post-ids"];
			}
			if (isSet($statusUpdate["tw-user"])) {
				$twUser = $statusUpdate["tw-user"];
			}
			if (isSet($statusUpdate["tw-password"])) {
				$twPassword = $statusUpdate["tw-password"];
			}
			if (isSet($statusUpdate["fb-long-url"])) {
				$fbLongUrl = $statusUpdate["fb-long-url"];
			}
			if (isSet($statusUpdate["cron-time"])) {
				$cronTime = $statusUpdate["cron-time"];
			}
			if (isSet($statusUpdate["fb-advanced-status"])) {
				$fbAdvancedStatus = $statusUpdate["fb-advanced-status"];
			}
			if (isSet($statusUpdate["link-shortener-login"])) {
				$linkShortenerLogin = $statusUpdate["link-shortener-login"];
			}
			if (isSet($statusUpdate["link-shortener-password"])) {
				$linkShortenerPassword = $statusUpdate["link-shortener-password"];
			}
			if (isSet($statusUpdate["link-shortener-service"])) {
				$linkShortenerService = $statusUpdate["link-shortener-service"];
			}
			if (isSet($statusUpdate["default-status-template"])) {
				$defaultStatusTemplate = $statusUpdate["default-status-template"];
			}
			if (isSet($statusUpdate["myspace-email"])) {
				$myspaceEmail = $statusUpdate["myspace-email"];
			}
			if (isSet($statusUpdate["myspace-password"])) {
				$myspacePassword = $statusUpdate["myspace-password"];
			}
			if (isSet($statusUpdate["myspace-default-mood"])) {
				$myspaceDefaultMood = $statusUpdate["myspace-default-mood"];
			}
		}

		if (isSet($_POST["action"]) && $_POST["action"] == "fb-status-update") {

			// Facebook
			if (isSet($_POST["fb-email"]) && trim($_POST["fb-email"]) != "") {

				$fbEmail = stripslashes($_POST["fb-email"]);

				if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $fbEmail)) {
					$error = "Email not valid.";
				}
			} else {
				$fbEmail = null;
			}

			if (isSet($_POST["fb-password"]) && trim($_POST["fb-password"]) != "") {
				$fbPassword = stripslashes($_POST["fb-password"]);
			} else {
				$fbPassword = null;
			}
			if (isSet($_POST["fb-dob-day"]) && trim($_POST["fb-dob-day"]) != "") {
				$fbDobDay = stripslashes($_POST["fb-dob-day"]);
			}
			if (isSet($_POST["fb-dob-month"]) && trim($_POST["fb-dob-month"]) != "") {
				$fbDobMonth = stripslashes($_POST["fb-dob-month"]);
			}
			if (isSet($_POST["fb-dob-year"]) && trim($_POST["fb-dob-year"]) != "") {
				$fbDobYear = stripslashes($_POST["fb-dob-year"]);
			}
			if ($fbDobDay != null || $fbDobMonth != null || $fbDobYear != null) {
				if ($fbDobDay == null || $fbDobMonth == null || $fbDobYear == null) {
					$error = "Please select the correct date of birth or leave fields blank";
				}
			}
			if (isSet($_POST["fb-debug"]) && $_POST["fb-debug"] == "true") {
				$fbDebug = true;
			} else {
				$fbDebug = false;
			}

			if (isSet($_POST["fb-push-as-profile-status"]) && $_POST["fb-push-as-profile-status"] == "true") {
				$fbPushAsProfileStatus = true;
			} else {
				$fbPushAsProfileStatus = false;
			}
			if (isSet($_POST["fb-push-as-profile-link"]) && $_POST["fb-push-as-profile-link"] == "true") {
				$fbPushAsProfileLink = true;
			} else {
				$fbPushAsProfileLink = false;
			}

			if (isSet($_POST["fb-page1-url"]) && trim($_POST["fb-page1-url"]) !== "") {
				$fbPage1Url = stripslashes($_POST["fb-page1-url"]);
				if (strpos(strToLower($fbPage1Url), "http://") === false) {
					$error = "The page url should contain an url";
				}
				if (strpos($fbPage1Url, "#") !== false) {
					$fbPage1Url = "http://www.facebook.com".trim(substr($fbPage1Url, strrpos($fbPage1Url, "#") + 1, strlen($fbPage1Url)));
				}
				if (strpos($fbPage1Url, "?") !== false) {
					$fbPage1Url = substr($fbPage1Url, 0, strpos($fbPage1Url, "?"));
				}
			}
			if (isSet($_POST["fb-push-as-page1-status"]) && $_POST["fb-push-as-page1-status"] == "true") {
				$fbPushAsPage1Status = true;
			} else {
				$fbPushAsPage1Status = false;
			}
			if (isSet($_POST["fb-push-as-page1-link"]) && $_POST["fb-push-as-page1-link"] == "true") {
				$fbPushAsPage1Link = true;
			} else {
				$fbPushAsPage1Link = false;
			}

			// facebook fields validation

			if (isSet($_POST["fb-share-icon"]) && trim($_POST["fb-share-icon"]) != "") {
				$fbShareIcon = stripslashes($_POST["fb-share-icon"]);
				if (strpos(strToLower($fbShareIcon), "http://") === false) {
					$error = "The Share icon field should contain the complete url to the icon";
				}
			}

			if (isSet($_POST["fb-share-image"]) && trim($_POST["fb-share-image"]) != "") {
				$fbShareImage = stripslashes($_POST["fb-share-image"]);
				if (strpos(strToLower($fbShareImage), "http://") === false) {
					$error = "The Share picture field should contains the complete url to the picture";
				}
			} else {
				$fbShareImage = null;
			}

			if (($fbEmail == null && $fbPassword != null) || ($fbEmail != null && $fbPassword == null)) {
				$error = "If you want to update your Facebook account, please fill both user and password. Otherwise leave the whole section blank.";
			}

			if (($fbEmail == null || $fbPassword == null) && ($fbPushAsProfileLink == true || $fbPushAsProfileStatus == true || $fbPushAsPage1Status == true || $fbPushAsPage1Link == true)) {
				$error = "To use any of the available facebook options, you should provide a Facebook account with email and password";
			}

			if (($fbPushAsPage1Status == true || $fbPushAsPage1Link == true) && $fbPage1Url == null) {
				$error = "To use any of the available facebook options on a Fan page, you should provide a fan page url";
			}

			if (isSet($_POST["fb-long-url"]) && $_POST["fb-long-url"] == "true") {
				$fbLongUrl = true;
			} else {
				$fbLongUrl = false;
			}

			if (isSet($_POST["fb-log-email"]) && trim($_POST["fb-log-email"]) != "") {

				$fbLogEmail = stripslashes($_POST["fb-log-email"]);

				if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $_POST["fb-log-email"])) {
					$error = "Log Email not valid.";
				}
			} else {
				$error = "Log email is required";
			}

			// Twitter
			if (isSet($_POST["tw-user"]) && trim($_POST["tw-user"]) != "") {
				$twUser = stripslashes($_POST["tw-user"]);
			} else {
				$twUser = null;
			}

			if (isSet($_POST["tw-password"]) && trim($_POST["tw-password"]) != "") {
				$twPassword = stripslashes($_POST["tw-password"]);
			} else {
				$twPassword = null;
			}

			if (($twUser == null && $twPassword != null) || ($twUser != null && $twPassword == null)) {
				$error = "If you want to update your twitter account, please fill both user and password. Otherwise leave both blank.";
			}

			// Myspace
			if (isSet($_POST["myspace-email"]) && trim($_POST["myspace-email"]) != "") {

				$myspaceEmail = stripslashes($_POST["myspace-email"]);

				if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $myspaceEmail)) {
					$error = "Myspace email not valid.";
				}
			} else {
				$myspaceEmail = null;
			}

			if (isSet($_POST["myspace-password"]) && trim($_POST["myspace-password"]) != "") {
				$myspacePassword = trim(stripslashes($_POST["myspace-password"]));
			} else {
				$myspacePassword = null;
			}

			if (isSet($_POST["myspace-default-mood"]) && trim($_POST["myspace-default-mood"]) != "") {
				$myspaceDefaultMood = trim(stripslashes($_POST["myspace-default-mood"]));
			} else {
				$myspaceDefaultMood = null;
			}

			if ($myspaceEmail != null || $myspacePassword != null || $myspaceDefaultMood != null) {
				if ($myspaceEmail == null || $myspacePassword == null || $myspaceDefaultMood == null) {
					$error = "If you intend to push your posts on Myspace, all the 3 fields are required";
				}
			}

			// link shortener
			if (isSet($_POST["link-shortener-service"]) && trim($_POST["link-shortener-service"]) != "") {
				$linkShortenerService = trim(stripslashes($_POST["link-shortener-service"]));
				if (!isSet($link_shortener[$linkShortenerService])) {
					$error = "Link shortener service not valid";
				}
			} else {
				$linkShortenerService = "is.gd";
			}
			if ($link_shortener[$linkShortenerService][2] != null) {
				if (isSet($_POST[makeJsId($linkShortenerService)."-link-shortener-login"]) && trim($_POST[makeJsId($linkShortenerService)."-link-shortener-login"]) != "") {
					$linkShortenerLogin = trim(stripslashes($_POST[makeJsId($linkShortenerService)."-link-shortener-login"]));
				} else {
					$error = $link_shortener[$linkShortenerService][2][2]." is mandatory";
				}
			}
			if ($link_shortener[$linkShortenerService][3] != null) {
				if (isSet($_POST[makeJsId($linkShortenerService)."-link-shortener-password"]) && trim($_POST[makeJsId($linkShortenerService)."-link-shortener-password"]) != "") {
					$linkShortenerPassword = trim(stripslashes($_POST[makeJsId($linkShortenerService)."-link-shortener-password"]));
				} else {
					$error = $link_shortener[$linkShortenerService][3][2]." is mandatory";
				}
			}

			// Misc options
			if (isSet($_POST["default-status-template"]) && trim($_POST["default-status-template"]) != "") {
				$defaultStatusTemplate = strip_tags(trim(stripslashes($_POST["default-status-template"])));

				if (strpos($defaultStatusTemplate, "%POST-TITLE%") === false || strpos($defaultStatusTemplate, "%POST-URL%") === false) {
					$error = "One of the mandatory status template tokens is missing. Please enter both tokens or set the default template: %POST-TITLE% %POST-URL%";
				}
			} else {
				$error = "The default status template is mandatory";
			}

			if (isSet($_POST["fb-cron-time"]) && trim($_POST["fb-cron-time"]) != "" && is_numeric($_POST["fb-cron-time"])) {
				$cronTime = stripslashes($_POST["fb-cron-time"]);
			} else {
				$error = "Cron Job interval should be a number and is mandatory.";
			}

			if (isSet($_POST["fb-advanced-status"]) && trim($_POST["fb-advanced-status"]) == "true") {
				$fbAdvancedStatus = true;
			} else {
				$fbAdvancedStatus = false;
			}

			if ($fbEmail == null && $fbPassword == null && $twUser == null && $twPassword == null && $myspaceEmail == null && $myspacePassword == null) {
				$error = "The plugin would be grateful if you filled at least one account data.";
			}

			if ($error === false) {
				// no validation errors here

				$statusUpdate = array();
				$statusUpdate["fb-email"] = $fbEmail;
				$statusUpdate["fb-password"] = $fbPassword;
				$statusUpdate["fb-dob-day"] = $fbDobDay;
				$statusUpdate["fb-dob-month"] = $fbDobMonth;
				$statusUpdate["fb-dob-year"] = $fbDobYear;
				$statusUpdate["fb-debug"] = $fbDebug;
				$statusUpdate["fb-push-as-profile-status"] = $fbPushAsProfileStatus;
				$statusUpdate["fb-push-as-profile-link"] = $fbPushAsProfileLink;
				$statusUpdate["fb-page1-url"] = $fbPage1Url;
				$statusUpdate["fb-push-as-page1-status"] = $fbPushAsPage1Status;
				$statusUpdate["fb-push-as-page1-link"] = $fbPushAsPage1Link;
				$statusUpdate["fb-share-icon"] = $fbShareIcon;
				$statusUpdate["fb-share-image"] = $fbShareImage;
				$statusUpdate["tw-user"] = $twUser;
				$statusUpdate["tw-password"] = $twPassword;
				$statusUpdate["fb-log-email"] = $fbLogEmail;
				$statusUpdate["fb-post-ids"] = $fbPostIds;
				$statusUpdate["fb-long-url"] = $fbLongUrl;
				$statusUpdate["last-cron"] = $lastCron;
				$statusUpdate["cron-time"] = $cronTime;
				$statusUpdate["fb-advanced-status"] = $fbAdvancedStatus;
				$statusUpdate["link-shortener-service"] = $linkShortenerService;
				$statusUpdate["link-shortener-login"] = $linkShortenerLogin;
				$statusUpdate["link-shortener-password"] = $linkShortenerPassword;
				$statusUpdate["default-status-template"] = $defaultStatusTemplate;
				$statusUpdate["version"] = $version;
				$statusUpdate["myspace-email"] = $myspaceEmail;
				$statusUpdate["myspace-password"] = $myspacePassword;
				$statusUpdate["myspace-default-mood"] = $myspaceDefaultMood;


				

				if ($statusUpdate == false) {
					// store for the very first time
					add_option('fb-status-update', $statusUpdate, ' ', 'no');
					$message = "Plugin settings have been saved.";
				} else {
					// update
					update_option('fb-status-update', $statusUpdate);
					$message = "Plugin settings have been updated.";
				}
			}
		}
		$fbStatusBaseUrl = trailingslashit(get_bloginfo('wpurl')).PLUGINDIR.'/'.dirname(plugin_basename(__FILE__));
?>
<script type="text/javascript" src="<?php echo($fbStatusBaseUrl); ?>/jqModal.js"></script>
<script type="text/javascript">
function checkFbLogin() {
	var fbEmail = document.getElementById("fb-email").value;
	var fbPassword = document.getElementById("fb-password").value;

	if (fbEmail.length == 0 || fbPassword.length == 0) {
		jQuery("#checkLogin").html("<p class=\"error\">Please fill Facebook email and password before checking login credentials</p>");
		return;
	}

	jQuery("#checkLogin").html("<p>Checking, please wait<br /><img src=\"<?php echo($fbStatusBaseUrl); ?>/ajax-loader.gif\" alt=\"Checking login\" /></p>");

	jQuery("#checkLogin").load("<?php echo($fbStatusBaseUrl); ?>/fb-status-updater.php?checkLogin=true&fbEmail="+fbEmail+"&fbPassword="+fbPassword+"&wp_version=<?php echo($wp_version); ?>", "", function (responseText, textStatus) {
		if (textStatus == "success" && responseText.length > 2) {

		} else {
			jQuery("#checkLogin").html("<p class=\"error\">There was a connection error, please retry. This doesn't mean your password is wrong :)</p>");
		}
	});
}

function shareOptions(checked) {
	if (checked) {
		jQuery("#shareOptions").show("slow");
	} else {

		jQuery("#shareOptions").hide("slow");
	}
}

function setBg(id) {
	<?php foreach ($link_shortener as $key => $value) { ?>
	jQuery("#table-<?php echo(makeJsId($key)); ?>").css({'background-color' : '#FFFFFF'});
	<?php } ?>
	jQuery("#table-"+id).css({'background-color' : '#EDEDED'});
}
</script>
<style type="text/css">
.jqmWindow {display: none;position:fixed;top:17%;left:50%;margin-left:-300px;width:600px;background-color:#EEE;color:#333;border:1px solid black;padding:12px;}
.jqmOverlay {background-color: #000;}
* html .jqmWindow {position: absolute;top: expression((document.documentElement.scrollTop || document.body.scrollTop) + Math.round(17 * (document.documentElement.offsetHeight || document.body.clientHeight) / 100) + 'px');}
<?php if (!$fbShareAsLink) { ?>#shareOptions{display:none;}<?php } ?>
</style>
<div class="wrap">
	<h2>Status Updater</h2>
	<form method="post" autocomplete="off">
		<div id="poststuff" class="metabox-holder">
			<div class="postbox">
				<h3 class="hndle"><span>Info</span></h3>
				<div class="inside">
					<div style="float:right;border:1px solid #DDDDDD;padding:10px;width:200px;margin:-7px -7px 5px 5px;">
						<p><strong>Hey you. Yeah you!</strong></p>
						<p>You downloaded this plugin for free and I'm happy &amp; proud you're using it, <a href="http://www.francesco-castaldo.com/plugins-and-widgets/fb-status-updater/" target="_blank">giving feedback and asking features</a>.</p>
						<p>If you're a company and you're using it for marketing, you're more than welcome. Just remember that it takes time developing this cool stuff and you might encourage me developing some more tools by sharing a very few bucks of the revenue made, through a donation ;)</p>
						<p style="text-align:center"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8255191" target="_blank"><img src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" alt="Donate!" /></a></p>
						<p><a href="http://www.francesco-castaldo.com/about/">My blog</a></p>
					</div>
					<p>This plugin has one main aim: share your blog post on social networks. It currently supports Facebook, Twitter and Myspace.</p>
					<p><strong>On Facebook</strong> the plugin pushes:</p>
					<ol>
						<li>the post title and url on the main profile status</li>
						<li>the post title, summary and picture as link, on the main profile</li>
						<li>the post title and url on a fan page</li>
						<li>the post title, summary and picture as link, on a fan page</li>
					</ol>
					<p><a href="<?php echo($fbStatusBaseUrl); ?>/screenshot-2.png" target="_blank">See here how the news feed might look when all Facebook sharing options are checked</a></p>
					<p><strong>On Twitter</strong>, the plugin share the post title and its link as status.</p>
					<p><strong>On Myspace</strong>, the plugin share the post title and its link as status + a default mood (that can be edited in each post, if you enable the "Advanced Status composition".</p>
					<p>If the post is published immediately (is not scheduled in the future), the plugin pushes the status during the publication process (depending on the social netoworks chosen, the push process might take some time).</p>
					<p>
						<strong>What if I usually schedule my posts to be published ad 8.00am, 12.00am, 0.00am?</strong> The plugin has implemented a fake <a href="http://en.wikipedia.org/wiki/Cronjob" rel="nofollow" target="_blank">cron job</a>, which is run by default every 30 minutes.
						The cron job is "fake" because it is not really run by the system, but from an unlucky visitor who browse your blog on a certain moment. That user triggers the job, attached to the
						Wordpress <strong>wp_footer()</strong> function. The <strong>wp_footer()</strong> function is mandatory in themes. If your theme do not use it, see <a href="http://codex.wordpress.org/Theme_Development" rel="nofollow" target="_blank">here</a>.
						If no one is browsing your blog when the cron job is due, nothing will happen until a visitor says hello :)<br />
						In the <strong>Miscellaneous</strong> section you can choose the cron job run interval, in minutes. If you want it to run once every hour fill it with 60; if you want it to run once a day, fill it with 60*24, 1440.
					</p>

					<p>Once you filled your Facebook email and password, before requesting help because nothing happens when you publish a new post, click on "check login credentials" and see if the plugin is able to login. If not, details are provided.</p>

					<p>Under certain conditions, your Facebook and Twitter login credential might not be safe on your blog database. Read more <a href="http://www.francesco-castaldo.com/plugins-and-widgets/fb-status-updater/" target="_blank">here</a>.</p>

					<p>When you activate the plugin, it stores a list of all published posts until that moment so that the cron job does not push old posts every half an hour. You should see that list at the end of this page.</p>

					<p><strong>Advanced status composition</strong>: by checking this in the "Miscellaneous" section, a new box will appear on your edit-post page. It will allow you to:</p>
					<ol>
						<li>Choose a different status for every social network, instead of using the default combination of post title and link</li>
						<li>Choose not to push the current post, or push it only on specific social networks, or share as link</li>
						<li>Choose a custom image for the facebook sharer component for the specific post</li>
						<li>Choose to push again the current post, if it had already been published in the past</li>
					</ol>
					<p>This is the tool, it's up to you how to use it. Flooding your contacts with blog posts might not be a good strategy ;)</p>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle"><span>Facebook Updater</span></h3>
				<div class="inside">
					<?php if (!is_writable($fbStatusCookieFile)) { ?>
						<p class="error">Php/Wordpress cannot write into this file: <strong><?php echo($fbStatusCookieFile) ?></strong>. Please ensure PHP has the correct permissions set to write and update that file. If you don't know what I'm talking about, please contact your server admin / webmaster. If you don't want to see this message every time you publish a new post while you try solving the problem, just <a href="/wp-admin/plugins.php">disable this plugin</a>. <a href="http://codex.wordpress.org/Changing_File_Permissions">More about file permissions on Wordpress</a></p>
					<?php } ?>
					<p>* = required field</p>

					<?php if ($message != false) { ?>
						<div id="message" class="updated fade"><p><?php echo($message); ?></p></div>
					<?php } ?>
					<?php if ($error != false) { ?>
						<div id="message" class="error"><p><?php echo($error); ?></p></div>
					<?php } ?>

					<table class="form-table" style="border-bottom:1px solid #999999">
						<tr valign="top">
							<td style="width:150px;"><label for="fb-email"><strong>Facebook email*</strong></label></td>
							<td><input style="width: 250px;" id="fb-email" name="fb-email" type="text" value="<?php echo($fbEmail); ?>" /></td>
							<td rowspan="2">
								<p><a href="javascript:checkFbLogin();">Check login credentials</a></p>
								<div id="checkLogin">If the plugin doesn't seem to work, fill email and password and check what happens when wordpress tries to login to your facebook account</div>
							</td>
						</tr>
						<tr valign="top">
							<td><label for="fb-password"><strong>Facebook password*</strong></label></td>
							<td><input style="width: 250px;" id="fb-password" name="fb-password" type="password" value="<?php echo(str_replace("\"", "&quot;", $fbPassword)); ?>" /></td>
						</tr>
						<tr valign="top">
							<td><label for="fb-email"><strong>Facebook date of birth</strong></label></td>
							<td>
								<select name="fb-dob-month" id="fb-dob-month" autocomplete="off">
									<option value="">Month:</option>
									<option value="1"<?php if ($fbDobMonth == "1") { echo(" selected=\"selected\""); } ?>>Jan</option>
									<option value="2"<?php if ($fbDobMonth == "2") { echo(" selected=\"selected\""); } ?>>Feb</option>
									<option value="3"<?php if ($fbDobMonth == "3") { echo(" selected=\"selected\""); } ?>>Mar</option>
									<option value="4"<?php if ($fbDobMonth == "4") { echo(" selected=\"selected\""); } ?>>Apr</option>
									<option value="5"<?php if ($fbDobMonth == "5") { echo(" selected=\"selected\""); } ?>>May</option>
									<option value="6"<?php if ($fbDobMonth == "6") { echo(" selected=\"selected\""); } ?>>Jun</option>
									<option value="7"<?php if ($fbDobMonth == "7") { echo(" selected=\"selected\""); } ?>>Jul</option>
									<option value="8"<?php if ($fbDobMonth == "8") { echo(" selected=\"selected\""); } ?>>Aug</option>
									<option value="9"<?php if ($fbDobMonth == "9") { echo(" selected=\"selected\""); } ?>>Sep</option>
									<option value="10"<?php if ($fbDobMonth == "10") { echo(" selected=\"selected\""); } ?>>Oct</option>
									<option value="11"<?php if ($fbDobMonth == "11") { echo(" selected=\"selected\""); } ?>>Nov</option>
									<option value="12"<?php if ($fbDobMonth == "12") { echo(" selected=\"selected\""); } ?>>Dec</option>
								</select>
								<select name="fb-dob-day" id="fb-dob-day" autocomplete="off">
									<option value="">Day:</option>
									<option value="1"<?php if ($fbDobDay == "1") { echo(" selected=\"selected\""); } ?>>1</option>
									<option value="2"<?php if ($fbDobDay == "2") { echo(" selected=\"selected\""); } ?>>2</option>
									<option value="3"<?php if ($fbDobDay == "3") { echo(" selected=\"selected\""); } ?>>3</option>
									<option value="4"<?php if ($fbDobDay == "4") { echo(" selected=\"selected\""); } ?>>4</option>
									<option value="5"<?php if ($fbDobDay == "5") { echo(" selected=\"selected\""); } ?>>5</option>
									<option value="6"<?php if ($fbDobDay == "6") { echo(" selected=\"selected\""); } ?>>6</option>
									<option value="7"<?php if ($fbDobDay == "7") { echo(" selected=\"selected\""); } ?>>7</option>
									<option value="8"<?php if ($fbDobDay == "8") { echo(" selected=\"selected\""); } ?>>8</option>
									<option value="9"<?php if ($fbDobDay == "9") { echo(" selected=\"selected\""); } ?>>9</option>
									<option value="10"<?php if ($fbDobDay == "10") { echo(" selected=\"selected\""); } ?>>10</option>
									<option value="11"<?php if ($fbDobDay == "11") { echo(" selected=\"selected\""); } ?>>11</option>
									<option value="12"<?php if ($fbDobDay == "12") { echo(" selected=\"selected\""); } ?>>12</option>
									<option value="13"<?php if ($fbDobDay == "13") { echo(" selected=\"selected\""); } ?>>13</option>
									<option value="14"<?php if ($fbDobDay == "14") { echo(" selected=\"selected\""); } ?>>14</option>
									<option value="15"<?php if ($fbDobDay == "15") { echo(" selected=\"selected\""); } ?>>15</option>
									<option value="16"<?php if ($fbDobDay == "16") { echo(" selected=\"selected\""); } ?>>16</option>
									<option value="17"<?php if ($fbDobDay == "17") { echo(" selected=\"selected\""); } ?>>17</option>
									<option value="18"<?php if ($fbDobDay == "18") { echo(" selected=\"selected\""); } ?>>18</option>
									<option value="19"<?php if ($fbDobDay == "19") { echo(" selected=\"selected\""); } ?>>19</option>
									<option value="20"<?php if ($fbDobDay == "20") { echo(" selected=\"selected\""); } ?>>20</option>
									<option value="21"<?php if ($fbDobDay == "21") { echo(" selected=\"selected\""); } ?>>21</option>
									<option value="22"<?php if ($fbDobDay == "22") { echo(" selected=\"selected\""); } ?>>22</option>
									<option value="23"<?php if ($fbDobDay == "23") { echo(" selected=\"selected\""); } ?>>23</option>
									<option value="24"<?php if ($fbDobDay == "24") { echo(" selected=\"selected\""); } ?>>24</option>
									<option value="25"<?php if ($fbDobDay == "25") { echo(" selected=\"selected\""); } ?>>25</option>
									<option value="26"<?php if ($fbDobDay == "26") { echo(" selected=\"selected\""); } ?>>26</option>
									<option value="27"<?php if ($fbDobDay == "27") { echo(" selected=\"selected\""); } ?>>27</option>
									<option value="28"<?php if ($fbDobDay == "28") { echo(" selected=\"selected\""); } ?>>28</option>
									<option value="29"<?php if ($fbDobDay == "29") { echo(" selected=\"selected\""); } ?>>29</option>
									<option value="30"<?php if ($fbDobDay == "30") { echo(" selected=\"selected\""); } ?>>30</option>
									<option value="31"<?php if ($fbDobDay == "31") { echo(" selected=\"selected\""); } ?>>31</option>
								</select>
								<select name="fb-dob-year" id="fb-dob-year" autocomplete="off">
									<option value="">Year:</option>
									<option value="2009"<?php if ($fbDobYear == "2009") { echo(" selected=\"selected\""); } ?>>2009</option>
									<option value="2008"<?php if ($fbDobYear == "2008") { echo(" selected=\"selected\""); } ?>>2008</option>
									<option value="2007"<?php if ($fbDobYear == "2007") { echo(" selected=\"selected\""); } ?>>2007</option>
									<option value="2006"<?php if ($fbDobYear == "2006") { echo(" selected=\"selected\""); } ?>>2006</option>
									<option value="2005"<?php if ($fbDobYear == "2005") { echo(" selected=\"selected\""); } ?>>2005</option>
									<option value="2004"<?php if ($fbDobYear == "2004") { echo(" selected=\"selected\""); } ?>>2004</option>
									<option value="2003"<?php if ($fbDobYear == "2003") { echo(" selected=\"selected\""); } ?>>2003</option>
									<option value="2002"<?php if ($fbDobYear == "2002") { echo(" selected=\"selected\""); } ?>>2002</option>
									<option value="2001"<?php if ($fbDobYear == "2001") { echo(" selected=\"selected\""); } ?>>2001</option>
									<option value="2000"<?php if ($fbDobYear == "2000") { echo(" selected=\"selected\""); } ?>>2000</option>
									<option value="1999"<?php if ($fbDobYear == "1999") { echo(" selected=\"selected\""); } ?>>1999</option>
									<option value="1998"<?php if ($fbDobYear == "1998") { echo(" selected=\"selected\""); } ?>>1998</option>
									<option value="1997"<?php if ($fbDobYear == "1997") { echo(" selected=\"selected\""); } ?>>1997</option>
									<option value="1996"<?php if ($fbDobYear == "1996") { echo(" selected=\"selected\""); } ?>>1996</option>
									<option value="1995"<?php if ($fbDobYear == "1995") { echo(" selected=\"selected\""); } ?>>1995</option>
									<option value="1994"<?php if ($fbDobYear == "1994") { echo(" selected=\"selected\""); } ?>>1994</option>
									<option value="1993"<?php if ($fbDobYear == "1993") { echo(" selected=\"selected\""); } ?>>1993</option>
									<option value="1992"<?php if ($fbDobYear == "1992") { echo(" selected=\"selected\""); } ?>>1992</option>
									<option value="1991"<?php if ($fbDobYear == "1991") { echo(" selected=\"selected\""); } ?>>1991</option>
									<option value="1990"<?php if ($fbDobYear == "1990") { echo(" selected=\"selected\""); } ?>>1990</option>
									<option value="1989"<?php if ($fbDobYear == "1989") { echo(" selected=\"selected\""); } ?>>1989</option>
									<option value="1988"<?php if ($fbDobYear == "1988") { echo(" selected=\"selected\""); } ?>>1988</option>
									<option value="1987"<?php if ($fbDobYear == "1987") { echo(" selected=\"selected\""); } ?>>1987</option>
									<option value="1986"<?php if ($fbDobYear == "1986") { echo(" selected=\"selected\""); } ?>>1986</option>
									<option value="1985"<?php if ($fbDobYear == "1985") { echo(" selected=\"selected\""); } ?>>1985</option>
									<option value="1984"<?php if ($fbDobYear == "1984") { echo(" selected=\"selected\""); } ?>>1984</option>
									<option value="1983"<?php if ($fbDobYear == "1983") { echo(" selected=\"selected\""); } ?>>1983</option>
									<option value="1982"<?php if ($fbDobYear == "1982") { echo(" selected=\"selected\""); } ?>>1982</option>
									<option value="1981"<?php if ($fbDobYear == "1981") { echo(" selected=\"selected\""); } ?>>1981</option>
									<option value="1980"<?php if ($fbDobYear == "1980") { echo(" selected=\"selected\""); } ?>>1980</option>
									<option value="1979"<?php if ($fbDobYear == "1979") { echo(" selected=\"selected\""); } ?>>1979</option>
									<option value="1978"<?php if ($fbDobYear == "1978") { echo(" selected=\"selected\""); } ?>>1978</option>
									<option value="1977"<?php if ($fbDobYear == "1977") { echo(" selected=\"selected\""); } ?>>1977</option>
									<option value="1976"<?php if ($fbDobYear == "1976") { echo(" selected=\"selected\""); } ?>>1976</option>
									<option value="1975"<?php if ($fbDobYear == "1975") { echo(" selected=\"selected\""); } ?>>1975</option>
									<option value="1974"<?php if ($fbDobYear == "1974") { echo(" selected=\"selected\""); } ?>>1974</option>
									<option value="1973"<?php if ($fbDobYear == "1973") { echo(" selected=\"selected\""); } ?>>1973</option>
									<option value="1972"<?php if ($fbDobYear == "1972") { echo(" selected=\"selected\""); } ?>>1972</option>
									<option value="1971"<?php if ($fbDobYear == "1971") { echo(" selected=\"selected\""); } ?>>1971</option>
									<option value="1970"<?php if ($fbDobYear == "1970") { echo(" selected=\"selected\""); } ?>>1970</option>
									<option value="1969"<?php if ($fbDobYear == "1969") { echo(" selected=\"selected\""); } ?>>1969</option>
									<option value="1968"<?php if ($fbDobYear == "1968") { echo(" selected=\"selected\""); } ?>>1968</option>
									<option value="1967"<?php if ($fbDobYear == "1967") { echo(" selected=\"selected\""); } ?>>1967</option>
									<option value="1966"<?php if ($fbDobYear == "1966") { echo(" selected=\"selected\""); } ?>>1966</option>
									<option value="1965"<?php if ($fbDobYear == "1965") { echo(" selected=\"selected\""); } ?>>1965</option>
									<option value="1964"<?php if ($fbDobYear == "1964") { echo(" selected=\"selected\""); } ?>>1964</option>
									<option value="1963"<?php if ($fbDobYear == "1963") { echo(" selected=\"selected\""); } ?>>1963</option>
									<option value="1962"<?php if ($fbDobYear == "1962") { echo(" selected=\"selected\""); } ?>>1962</option>
									<option value="1961"<?php if ($fbDobYear == "1961") { echo(" selected=\"selected\""); } ?>>1961</option>
									<option value="1960"<?php if ($fbDobYear == "1960") { echo(" selected=\"selected\""); } ?>>1960</option>
									<option value="1959"<?php if ($fbDobYear == "1959") { echo(" selected=\"selected\""); } ?>>1959</option>
									<option value="1958"<?php if ($fbDobYear == "1958") { echo(" selected=\"selected\""); } ?>>1958</option>
									<option value="1957"<?php if ($fbDobYear == "1957") { echo(" selected=\"selected\""); } ?>>1957</option>
									<option value="1956"<?php if ($fbDobYear == "1956") { echo(" selected=\"selected\""); } ?>>1956</option>
									<option value="1955"<?php if ($fbDobYear == "1955") { echo(" selected=\"selected\""); } ?>>1955</option>
									<option value="1954"<?php if ($fbDobYear == "1954") { echo(" selected=\"selected\""); } ?>>1954</option>
									<option value="1953"<?php if ($fbDobYear == "1953") { echo(" selected=\"selected\""); } ?>>1953</option>
									<option value="1952"<?php if ($fbDobYear == "1952") { echo(" selected=\"selected\""); } ?>>1952</option>
									<option value="1951"<?php if ($fbDobYear == "1951") { echo(" selected=\"selected\""); } ?>>1951</option>
									<option value="1950"<?php if ($fbDobYear == "1950") { echo(" selected=\"selected\""); } ?>>1950</option>
									<option value="1949"<?php if ($fbDobYear == "1949") { echo(" selected=\"selected\""); } ?>>1949</option>
									<option value="1948"<?php if ($fbDobYear == "1948") { echo(" selected=\"selected\""); } ?>>1948</option>
									<option value="1947"<?php if ($fbDobYear == "1947") { echo(" selected=\"selected\""); } ?>>1947</option>
									<option value="1946"<?php if ($fbDobYear == "1946") { echo(" selected=\"selected\""); } ?>>1946</option>
									<option value="1945"<?php if ($fbDobYear == "1945") { echo(" selected=\"selected\""); } ?>>1945</option>
									<option value="1944"<?php if ($fbDobYear == "1944") { echo(" selected=\"selected\""); } ?>>1944</option>
									<option value="1943"<?php if ($fbDobYear == "1943") { echo(" selected=\"selected\""); } ?>>1943</option>
									<option value="1942"<?php if ($fbDobYear == "1942") { echo(" selected=\"selected\""); } ?>>1942</option>
									<option value="1941"<?php if ($fbDobYear == "1941") { echo(" selected=\"selected\""); } ?>>1941</option>
									<option value="1940"<?php if ($fbDobYear == "1940") { echo(" selected=\"selected\""); } ?>>1940</option>
									<option value="1939"<?php if ($fbDobYear == "1939") { echo(" selected=\"selected\""); } ?>>1939</option>
									<option value="1938"<?php if ($fbDobYear == "1938") { echo(" selected=\"selected\""); } ?>>1938</option>
									<option value="1937"<?php if ($fbDobYear == "1937") { echo(" selected=\"selected\""); } ?>>1937</option>
									<option value="1936"<?php if ($fbDobYear == "1936") { echo(" selected=\"selected\""); } ?>>1936</option>
									<option value="1935"<?php if ($fbDobYear == "1935") { echo(" selected=\"selected\""); } ?>>1935</option>
									<option value="1934"<?php if ($fbDobYear == "1934") { echo(" selected=\"selected\""); } ?>>1934</option>
									<option value="1933"<?php if ($fbDobYear == "1933") { echo(" selected=\"selected\""); } ?>>1933</option>
									<option value="1932"<?php if ($fbDobYear == "1932") { echo(" selected=\"selected\""); } ?>>1932</option>
									<option value="1931"<?php if ($fbDobYear == "1931") { echo(" selected=\"selected\""); } ?>>1931</option>
									<option value="1930"<?php if ($fbDobYear == "1930") { echo(" selected=\"selected\""); } ?>>1930</option>
									<option value="1929"<?php if ($fbDobYear == "1929") { echo(" selected=\"selected\""); } ?>>1929</option>
									<option value="1928"<?php if ($fbDobYear == "1928") { echo(" selected=\"selected\""); } ?>>1928</option>
									<option value="1927"<?php if ($fbDobYear == "1927") { echo(" selected=\"selected\""); } ?>>1927</option>
									<option value="1926"<?php if ($fbDobYear == "1926") { echo(" selected=\"selected\""); } ?>>1926</option>
									<option value="1925"<?php if ($fbDobYear == "1925") { echo(" selected=\"selected\""); } ?>>1925</option>
									<option value="1924"<?php if ($fbDobYear == "1924") { echo(" selected=\"selected\""); } ?>>1924</option>
									<option value="1923"<?php if ($fbDobYear == "1923") { echo(" selected=\"selected\""); } ?>>1923</option>
									<option value="1922"<?php if ($fbDobYear == "1922") { echo(" selected=\"selected\""); } ?>>1922</option>
									<option value="1921"<?php if ($fbDobYear == "1921") { echo(" selected=\"selected\""); } ?>>1921</option>
									<option value="1920"<?php if ($fbDobYear == "1920") { echo(" selected=\"selected\""); } ?>>1920</option>
									<option value="1919"<?php if ($fbDobYear == "1919") { echo(" selected=\"selected\""); } ?>>1919</option>
									<option value="1918"<?php if ($fbDobYear == "1918") { echo(" selected=\"selected\""); } ?>>1918</option>
									<option value="1917"<?php if ($fbDobYear == "1917") { echo(" selected=\"selected\""); } ?>>1917</option>
									<option value="1916"<?php if ($fbDobYear == "1916") { echo(" selected=\"selected\""); } ?>>1916</option>
									<option value="1915"<?php if ($fbDobYear == "1915") { echo(" selected=\"selected\""); } ?>>1915</option>
									<option value="1914"<?php if ($fbDobYear == "1914") { echo(" selected=\"selected\""); } ?>>1914</option>
									<option value="1913"<?php if ($fbDobYear == "1913") { echo(" selected=\"selected\""); } ?>>1913</option>
									<option value="1912"<?php if ($fbDobYear == "1912") { echo(" selected=\"selected\""); } ?>>1912</option>
									<option value="1911"<?php if ($fbDobYear == "1911") { echo(" selected=\"selected\""); } ?>>1911</option>
									<option value="1910"<?php if ($fbDobYear == "1910") { echo(" selected=\"selected\""); } ?>>1910</option>
									<option value="1909"<?php if ($fbDobYear == "1909") { echo(" selected=\"selected\""); } ?>>1909</option>
									<option value="1908"<?php if ($fbDobYear == "1908") { echo(" selected=\"selected\""); } ?>>1908</option>
									<option value="1907"<?php if ($fbDobYear == "1907") { echo(" selected=\"selected\""); } ?>>1907</option>
									<option value="1906"<?php if ($fbDobYear == "1906") { echo(" selected=\"selected\""); } ?>>1906</option>
									<option value="1905"<?php if ($fbDobYear == "1905") { echo(" selected=\"selected\""); } ?>>1905</option>
									<option value="1904"<?php if ($fbDobYear == "1904") { echo(" selected=\"selected\""); } ?>>1904</option>
									<option value="1903"<?php if ($fbDobYear == "1903") { echo(" selected=\"selected\""); } ?>>1903</option>
									<option value="1902"<?php if ($fbDobYear == "1902") { echo(" selected=\"selected\""); } ?>>1902</option>
									<option value="1901"<?php if ($fbDobYear == "1901") { echo(" selected=\"selected\""); } ?>>1901</option>
									<option value="1900"<?php if ($fbDobYear == "1900") { echo(" selected=\"selected\""); } ?>>1900</option>
								</select>
							</td>
							<td>It sometimes happens that Facebook asks the plugin the user date of birth to confirm the account, while signing in. It is not mandatory but, if the update log email says that Facebook asked for your date of birth, you'd better filling it if you want your profile/page to be updated.</td>
						</tr>
						<tr valign="top">
							<td><label for="fb-push-as-profile-status"><strong>Push to profile status</strong></label></td>
							<td><input id="fb-push-as-profile-status" name="fb-push-as-profile-status" type="checkbox" value="true" <?php if ($fbPushAsProfileStatus) { ?>checked="checked"<?php } ?> /></td>
							<td>Check this if you want the status of the profile to be updated. If you do not want the profile status updated, please provide at least one page url or share as link</td>
						</tr>
						<tr valign="top">
							<td><label for="fb-push-as-profile-link"><strong>Push to profile as link</strong></label></td>
							<td><input id="fb-push-as-profile-link" name="fb-push-as-profile-link" type="checkbox" value="true" <?php if ($fbPushAsProfileLink) { ?>checked="checked"<?php } ?> /></td>
							<td>Check this if you want the post to be shared as link (with title, summary and a picture) on the main profile</td>
						</tr>
					</table>
					<table class="form-table" style="border-bottom:1px solid #999999">
						<tr valign="top">
							<td style="width:150px;"><label for="fb-page1-url"><strong>Facebook Page url</strong></label></td>
							<td><input style="width: 250px;" id="fb-page1-url" name="fb-page1-url" type="text" value="<?php echo($fbPage1Url); ?>" /></td>
							<td>Optional Facebook Page where to push your post. Please paste the <strong>full url</strong>. Example: http://www.facebook.com/pages/Francesco-Castaldo-muSEEc/19953059252</td>
						</tr>
						<tr valign="top">
							<td><label for="fb-push-as-page1-status"><strong>Push to page status</strong></label></td>
							<td><input id="fb-push-as-page1-status" name="fb-push-as-page1-status" type="checkbox" value="true" <?php if ($fbPushAsPage1Status) { ?>checked="checked"<?php } ?> /></td>
							<td>Check this if you want the status of the page to be updated.</td>
						</tr>
						<tr valign="top">
							<td><label for="fb-push-as-page1-link"><strong>Push to profile as link</strong></label></td>
							<td><input id="fb-push-as-page1-link" name="fb-push-as-page1-link" type="checkbox" value="true" <?php if ($fbPushAsPage1Link) { ?>checked="checked"<?php } ?> /></td>
							<td>Check this if you want the post to be shared as link (with title, summary and a picture) on the page</td>
						</tr>
					</table>
					<table class="form-table" style="border-bottom:1px solid #999999">
						<tr>
							<td style="width:150px;"><label for="fb-share-icon"><strong>Default link site icon url</strong></label></td>
							<td><input style="width: 250px;" id="fb-share-icon" name="fb-share-icon" type="text" value="<?php echo($fbShareIcon); ?>" /></td>
							<td>Example: http://<?php echo($_SERVER["SERVER_NAME"]."/favicon.ico");?> (don't exactly know where Facebook uses this)</td>
						</tr>
						<tr>
							<td style="width:150px;"><label for="fb-share-image"><strong>Default link shared image url</strong></label></td>
							<td><input style="width: 250px;" id="fb-share-image" name="fb-share-image" type="text" value="<?php echo($fbShareImage); ?>" /></td>
							<td>If you leave this field blank, the plugin will look for the first image with full url src (starting with "http://" inside the post. If you activate the advanced status composition, you can override this setting and specify the picture for each post you publish.<br />Example: http://<?php echo($_SERVER["SERVER_NAME"]."/logo.png");?></td>
						</tr>
					</table>
					<table class="form-table" >
						<tr valign="top">
							<td style="width:150px;"><label for="fb-debug"><strong>Debug facebook update</strong></label></td>
							<td><input id="fb-debug" name="fb-debug" type="checkbox" value="true" <?php if ($fbDebug) { ?>checked="checked"<?php } ?> /></td>
							<td>Some users report their Facebook profile is not updating. By checking this, log email will contain the complete Facebook response so that we (me and you) might understand what is happening. Common reasons found as far as now are: facebook asks for captcha after the login because the user didn't confirm the account with its mobile phone, wrong email or password. If your account is confirmed, your email and password are correct, the "check login credentials" return a positive response than turn this option on. Be aware that your log email can be huge.</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle"><span>Twitter Status Updater</span></h3>
				<div class="inside">
					<p>Want to update your Twitter profile? Here we are (leave blank if not interested)</p>
					<table class="form-table">
						<tr valign="top">
							<td style="width:150px;"><label for="tw-user"><strong>Twitter user</strong></label></td>
							<td><input style="width: 250px;" id="tw-user" name="tw-user" type="text" value="<?php echo($twUser); ?>" /></td>
							<td></td>
						</tr>
						<tr valign="top">
							<td><label for="tw-password"><strong>Twitter password</strong></label></td>
							<td><input style="width: 250px;" id="tw-password" name="tw-password" type="password" value="<?php echo($twPassword); ?>" /></td>
							<td></td>
						</tr>
					</table>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle"><span>Myspace Status Updater</span></h3>
				<div class="inside">
					<p>Want to update your Myspace status? Here we are (leave blank if not interested)</p>
					<table class="form-table">
						<tr valign="top">
							<td style="width:150px;"><label for="myspace-email"><strong>Myspace email</strong></label></td>
							<td><input style="width: 250px;" id="myspace-email" name="myspace-email" type="text" value="<?php echo($myspaceEmail); ?>" /></td>
							<td></td>
						</tr>
						<tr valign="top">
							<td><label for="myspace-password"><strong>Myspace password</strong></label></td>
							<td><input style="width: 250px;" id="myspace-password" name="myspace-password" type="password" value="<?php echo($myspacePassword); ?>" /></td>
							<td></td>
						</tr>
						<tr valign="top">
							<td><label for="myspace-default-mood"><strong>Myspace default mood</strong></label></td>
							<td><input style="width: 250px;" id="myspace-default-mood" name="myspace-default-mood" type="text" value="<?php echo($myspaceDefaultMood); ?>" /></td>
							<td>Set your default mood to be sent with your statuses (can be overridden if you use the Advanced Status Composition). Example: happy, sleepy, idle, sad etc.</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle"><span>Default status template</span></h3>
				<div class="inside">
					<p>The pushed "status" is made by two tokens: <strong>%POST-TITLE%</strong> and <strong>%POST-URL%</strong>. You can combine them in any way, add more words, chars, emoticons or whatever.</p>
					<p>Although someone is asking not to include the post url in the Fb/Tw/Ms push, by now both are mandatory.</p>
					<p>
						A few examples of how these tokens might be used:<br />
						<strong>%POST-TITLE%</strong> <strong>%POST-URL%</strong><br />
						<strong>%POST-TITLE%</strong> - <strong>%POST-URL%</strong><br />
						Hey dude, did you know <strong>%POST-TITLE%</strong> -> <strong>%POST-URL%</strong>!!<br />
						Update: <strong>%POST-TITLE%</strong> <strong>%POST-URL%</strong><br />
					</p>
					<p>No html please, Facebook, Twitter and Myspace don't like it in statuses, in case you're wondering.</p>
					<table class="form-table">
						<tr valign="top">
							<td style="width:150px;"><label for="default-status-template"><strong>Default status</strong></label></td>
							<td><input style="width: 450px;" id="default-status-template" name="default-status-template" type="text" value="<?php echo($defaultStatusTemplate); ?>" /></td>
						</tr>
					</table>
					<p>Hey, a tweet max length is 140 chars. Myspace status max length is 140 chars too. If you are pushing to Twitter and/or Myspace and the resulting status is longer than 140 chars, the <strong>%POST-TITLE%</strong> part will be truncated so that the link will be fully included.</p>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle"><span>Link shortener</span></h3>
				<div class="inside">
					<p>Twitter statues have only 140 chars available. Long links might be cut or leave less space for your title to be meaningful. Choose the link shortener service you prefer to leave more room for titles.</p>
					<p>Some services might require registration, some others don't. Some offer statistic data about clicks.</p>
					<?php if (!function_exists("simplexml_load_string") && !function_exists("json_decode"))  { ?>
						<p class="error">Sorry, on this server none of the 2 required libraries from link shortener service are installed: json or simple_xml. The default and basic gs.id service will be used</p>
					<?php } else { ?>
						<?php foreach ($link_shortener as $key => $value) { ?>
							<?php if ($value != null) { ?>
								<?php if (($value[1] && function_exists("json_decode")) || !$value[1]) { ?>
									<?php if ($value[2] != null) { ?>
										<table class="form-table" style="border-bottom:1px solid #999999;background-color:#FFFFFF;margin-top:0;padding-top:10px" id="table-<?php echo(makeJsId($key)); ?>">
											<tr valign="top">
												<td rowspan="2" valign="middle"><input type="radio" id="<?php echo(makeJsId($key)); ?>" name="link-shortener-service" value="<?php echo($key); ?>" onclick="setBg('<?php echo(makeJsId($key)); ?>')"<?php if ($linkShortenerService == $key) { echo(" checked=\"checked\""); } ?> /> <a href="<?php echo($value[0]); ?>" target="_blank" rel="nofollow"><?php echo($key); ?></a></td>
												<td style="width:150px;"><label for="<?php echo($value[2][0]) ?>"><strong><?php echo($value[2][2]) ?></strong></label></td>
												<td><input style="width: 350px;" id="<?php echo($value[2][0]) ?>" name="<?php echo(makeJsId($key)); ?>-link-shortener-login" type="<?php echo($value[2][1]) ?>" value="<?php if ($linkShortenerService == $key) { echo($linkShortenerLogin); } ?>" /></td>
											</tr>
											<tr valign="top">
												<td style="width:150px;"><label for="<?php echo($value[3][0]) ?>"><strong><?php echo($value[3][2]) ?></strong></label></td>
												<td><input style="width: 350px;" id="<?php echo($value[3][0]) ?>" name="<?php echo(makeJsId($key)); ?>-link-shortener-password" type="<?php echo($value[3][1]) ?>" value="<?php if ($linkShortenerService == $key) { echo($linkShortenerPassword); } ?>" /></td>
											</tr>
										</table>
									<?php } else { ?>
										<table class="form-table" style="border-bottom:1px solid #999999" id="table-<?php echo(makeJsId($key)); ?>">
											<tr valign="top">
												<td><input type="radio" id="<?php echo(makeJsId($key)); ?>" name="shortener-service" value="<?php echo($key); ?>" onclick="setBg('<?php echo(makeJsId($key)); ?>')"<?php if ($linkShortenerService == $key) { echo(" checked=\"checked\""); } ?> /> <a href="<?php echo($value[0]); ?>" target="_blank" rel="nofollow"><?php echo($key); ?></a></td>
											</tr>
										</table>
									<?php } ?>
								<?php } else { ?>
									<table class="form-table" style="border-bottom:1px solid #999999;background-color:#FFFFFF;">
										<tr valign="top">
											<td><a href="<?php echo($value[0]); ?>" target="_blank" rel="nofollow"><?php echo($key); ?></a> requires json library, which is available from php 5.2. Your php version is <?php echo(phpversion()); ?></td>
										</tr>
									</table>
								<?php } ?>
							<?php } ?>
						<?php } ?>
						<script type="text/javascript">
						jQuery("#table-<?php echo(makeJsId($linkShortenerService)); ?>").css({'background-color' : '#EDEDED'});
						</script>
					<?php } ?>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle"><span>Miscellaneous Options</span></h3>
				<div class="inside">
					<table class="form-table">
						<tr valign="top">
							<td><label for="fb-long-url"><strong>Use post slug</strong></label></td>
							<td><input id="fb-long-url" name="fb-long-url" type="checkbox" value="true" <?php if ($fbLongUrl) { ?>checked="checked"<?php } ?> /></td>
							<td>Check this if you want the url in the status to be the post slug (<strong>http://www.youtsite.com/date/category/post/</strong>), uncheck if you prefer the shorter version (<strong>http://www.youtsite.com/?p=123</strong>). Note: if your blog uses the post slug, you can use the shorter version anyway. If you use the link shortener service in the previous section, this will be the shortened link.</td>
						</tr>
						<?php if (function_exists("add_meta_box")) { ?>
							<tr valign="top">
								<td><label for="fb-advanced-status"><strong>Advanced status composition</strong></label></td>
								<td><input id="fb-advanced-status" name="fb-advanced-status" type="checkbox" value="true" <?php if ($fbAdvancedStatus) { ?>checked="checked"<?php } ?> /></td>
								<td>
									By checking this, a custom area will be added to the "Edit post" page that include these features:<br />
									- choose whether or not post the single article to Facebook/Twitter/Myspace<br />
									- specify a custom status, different from the article title, associated with the single post<br />
									- specify a different status for Facebook, Twitter and Myspace (i.e. you can add hashtags in your tweet)<br />
									- choose to share (or not to) the post as link on Facebook<br />
									- specify a custom picture to be shared along with the link on Facebook
								</td>
							</tr>
						<?php } else { ?>
							<tr valign="top">
								<td colspan="3">Advanced status composition is available only for Wordpress 2.5 or higher. Sorry, way too much effort needed to maintain so many branches of code :(</td>
							</tr>
						<?php } ?>
						<tr valign="top">
							<td style="width:150px;"><label for="fb-log-email"><strong>Log email *</strong></label></td>
							<td><input style="width: 250px;" id="fb-log-email" name="fb-log-email" type="text" value="<?php echo($fbLogEmail); ?>" /></td>
							<td>The status pushing during the publishing process happens silently. The log email address (now mandatory) says how the process went and, if something is not smooth, why.</td>
						</tr>
						<tr valign="top">
							<td><label for="fb-cron-time"><strong>Cron job interval</strong></label></td>
							<td><input style="width: 100px;" id="fb-cron-time" name="fb-cron-time" type="text" value="<?php echo($cronTime); ?>" /></td>
							<td>The these are the minutes the plugin waits before checking if a scheduled-in-the-future publication time is over and the post can be pushed to FB/Twitter/Myspace. Defaults: 30 minutes.</td>
						</tr>
					</table>
				</div>
			</div>

			<div class="postbox">
				<h3 class="hndle"><span>Disclamer</span></h3>
				<div class="inside">
					<p>This is a free tool and is provided WITHOUT ANY WARRANTY.</p>
					<p>If for, for any reason, the social network you are sharing links through this plugin bans the provided account, by using this plugin you accept that no responsability might be addressed to the plugin itself or its developer.</p>
				</div>
			</div>

			<input type="hidden" name="action" value="fb-status-update" />
			<p class="submit"><input type="submit" name="Submit" value="Save" /></p>

			<?php if ($fbPostIds != null) { ?>

				<div class="postbox">
					<h3 class="hndle"><span>Pushed posts log</span></h3>
					<div class="inside">
						<p>Here are post ids pushed to Facebook/Twitter/Myspace. Clicking on an id will open the original post in a new window. If the post is not found, it means you deleted it after it was pushed.</p>
						<p>
						<?php
							$fbPostIds = explode("#", $fbPostIds);
							foreach($fbPostIds as $fbPostId) {
								if (trim($fbPostId) != "") {
						?>
									<a href="/?p=<?php echo($fbPostId); ?>" target="_blank"><?php echo($fbPostId); ?></a>
						<?php
								}
							}
						?>
						</p>
						<?php if (isSet($statusUpdate["last-cron"])) { ?>
							<p>The plugin cron job last run on <?php  echo(date('Y-m-d H:i:s', $statusUpdate["last-cron"])); ?>; next run: <?php  echo(date('Y-m-d H:i:s', $statusUpdate["last-cron"]+(60*$cronTime))); ?></p>
						<?php } ?>
					</div>
				</div>
			<?php } ?>

			<div class="postbox">
				<h3 class="hndle"><span>Clear private data</h3>
				<div class="inside">
					<p><strong>This is very important, please read carefully</strong>. If you intend not to use this plugin anymore, before deleting/disabling it <a href="javascript:if (window.confirm('Sure?') == true) { window.location.href='<?php echo($_SERVER["PHP_SELF"]); ?>?<?php echo($_SERVER["QUERY_STRING"]); ?>&clear-private-data=true';}">click here</a>. This will delete all data the plugin stored on your database.</p>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
	}
}

function makeJsId($id) {
	$id = str_replace(" ", "-", $id);
	$id = str_replace(".", "-", $id);
	return $id;
}
?>