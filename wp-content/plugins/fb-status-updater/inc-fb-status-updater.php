<?php
function fbStatusUpdater($post_ID, $cron = false) {

	if (!function_exists("curl_init")) {
		return;
	}

	global $fbStatusCookieFile, $fbDebugLog, $fbStatusUpdaterVersion;

	if (!is_writable($fbStatusCookieFile)) {
		if (!$cron) {
			echo("Your post has been published but there was an error while updating the status. The file ".$fbStatusCookieFile." is not writable from PHP. Please ensure PHP has the correct permissions set to write and update that file. If you don't know what I'm speaking about, please contact your server admin / webmaster. If you don't want to see this message every time you publish a new post while you try solving the problem, just <a href=\"/wp-admin/plugins.php\">disable this plugin</a>. <a href=\"http://codex.wordpress.org/Changing_File_Permissions\">More about file permissions on Wordpress</a>");
			exit();
		} else {
			/* useless... monkey users should just read instructions or read errors on the settings page
			if ($fbLogEmail != null) {
				sendLogEmail($fbLogEmail, "The Status Updater Cron tried to post an article but the file ".$fbStatusCookieFile." is not writable from PHP.\n\n Please ensure PHP has the correct permissions set to write and update that file. If you don't know what I'm speaking about, please contact your server admin / webmaster. If you don't want to see this message every time you publish a new post while you try solving the problem, just disable this plugin.");
			}
			return;
			*/
		}
	}

	$startTime = getMicrotime();

	$statusUpdate = get_option('fb-status-update');

	if ($statusUpdate === false) {
		// no settings stored
		return;
	} else {

		if (!isSet($statusUpdate["version"]) || (isSet($statusUpdate["version"]) && $statusUpdate["version"] != $fbStatusUpdaterVersion) ) {
			// the plugin has not been activated yet
			$statusUpdate = fbStatusAct();
		}

		if (isSet($statusUpdate["fb-post-ids"]) && $statusUpdate["fb-post-ids"] != "" && $statusUpdate["fb-post-ids"] != "#") {
			// check if the current post id has already been sent to facebook
			if (strpos($statusUpdate["fb-post-ids"], "#".$post_ID."#") !== false) {
				// the post was already sent to facebook, do not lose time here
				return;
			}
		} else {
			// should already be set when installing the plugin from version 1.2
			// #1#2#3#100#1850#
			$statusUpdate["fb-post-ids"] = "#";
		}

		// store immediately as already sent, otherwise the cron job could work the post too (because the script takes so long to execute, facebook is slow :) or the database connection could time out by the end of the scritp
		$statusUpdate["fb-post-ids"] .= $post_ID."#";
		$statusUpdate["last-cron"] = time();
		update_option('fb-status-update', $statusUpdate);

		$fbUser = null;
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
		$fbLogEmail = null;
		$fbShareIcon = null;
		$fbShareImage = null;
		$twUser = null;
		$twPassword = null;
		$fbLongUrl = true;
		$fbLogMessage = "";
		$fbAdvancedStatus = false;
		$jmpApiLogin = null;
		$jmpApiKey = null;
		$myspaceEmail = null;
		$myspacePassword = null;
		$myspaceMood = null;
		$defaultStatusTemplate = "%POST-TITLE% %POST-URL%";

		// checks
		$facebookIsUp = true;
		$facebookLoggedIn = true;
		$facebookCaptcha = false;

		if (isSet($statusUpdate["fb-email"]) && isSet($statusUpdate["fb-password"])) {
			$fbUser = $statusUpdate["fb-email"];
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
		if (isSet($statusUpdate["fb-debug"])) {
			$fbDebug = $statusUpdate["fb-debug"];
		}
		if (isSet($statusUpdate["fb-log-email"])) {
			$fbLogEmail = $statusUpdate["fb-log-email"];
		}
		if (isSet($statusUpdate["fb-post-to-profile"])) {
			$fbPostToProfile = $statusUpdate["fb-post-to-profile"];
		}
		if (isSet($statusUpdate["fb-long-url"])) {
			$fbLongUrl = $statusUpdate["fb-long-url"];
		}
		if (isSet($statusUpdate["fb-advanced-status"])) {
			$fbAdvancedStatus = $statusUpdate["fb-advanced-status"];
		}
		if (isSet($statusUpdate["tw-user"]) && isSet($statusUpdate["tw-password"])) {
			$twUser = $statusUpdate["tw-user"];
			$twPassword = $statusUpdate["tw-password"];
		}
		if (isSet($statusUpdate["jmp-api-login"])) {
			$jmpApiLogin = $statusUpdate["jmp-api-login"];
		}
		if (isSet($statusUpdate["jmp-api-key"])) {
			$jmpApiKey = $statusUpdate["jmp-api-key"];
		}
		if (isSet($statusUpdate["myspace-email"])) {
			$myspaceEmail = $statusUpdate["myspace-email"];
		}
		if (isSet($statusUpdate["myspace-password"])) {
			$myspacePassword = $statusUpdate["myspace-password"];
		}
		if (isSet($statusUpdate["myspace-default-mood"])) {
			$myspaceMood = $statusUpdate["myspace-default-mood"];
		}
		if (isSet($statusUpdate["default-status-template"])) {
			$defaultStatusTemplate = $statusUpdate["default-status-template"];
		}
		if ($twUser == null && $twPassword == null && $fbUser == null && $fbPassword == null && $myspaceEmail == null && $myspacePassword == null) {
			// nothing stored, just leave
			return;
		}
	}

	// get post data
	$post = get_post($post_ID);
	if ($fbLongUrl) {
		$postUrl = get_permalink($post_ID);
	} else {
		$postUrl = get_bloginfo("wpurl")."/?p=".$post_ID;
	}
	$postTitle = $post->post_title;
	$postSummary = $post->post_excerpt;
	if (trim($postSummary."") == "") {
		$postSummary = substr(strip_tags($post->post_content), 0, 255);
	}
	$postContent = $post->post_content;
	$postStatus = $post->post_status;
	unset($post);

	// if the post is scheduled, do nothing
	if ($postStatus == "future" || $postStatus == "draft" || $postStatus == "private") {
		return;
	}

	$statusFacebook = $postTitle;
	$statusTwitter = $postTitle;
	$statusMyspace = $postTitle;

	// get the custom settings for the current post
	if ($fbAdvancedStatus) {

		//echo("Advanced status composition<br />"); //debug

		$statusUpdateMeta = get_post_meta($post_ID, 'fb-status-updater-meta', true);

		// if the user chose not to send the current post, just add its id to the sent list and end
		if ($statusUpdateMeta["push"] == false) {
			// post id alread added to the "done" list at the beginning, just need to stop the function
			//echo("Not sending ".$post_ID." <br />"); exit();//debug
			return;
		}

		// overwrites default options with meta associated with the post
		if ($fbUser !== null && $fbPassword != null) {

			if (isSet($statusUpdateMeta["custom-facebook-status"]) && $statusUpdateMeta["custom-facebook-status"] != null) {
				$statusFacebook = $statusUpdateMeta["custom-facebook-status"];
				//echo("Custom Facebook status: ".$statusFacebook."<br />"); //debug
			}

			if (isSet($statusUpdateMeta["fb-push-as-profile-status"]) && $statusUpdateMeta["fb-push-as-profile-status"] != null) {
				$fbPushAsProfileStatus = $statusUpdateMeta["fb-push-as-profile-status"];
			}

			if (isSet($statusUpdateMeta["fb-push-as-page1-status"]) && $statusUpdateMeta["fb-push-as-page1-status"] != null) {
				$fbPushAsPage1Status = $statusUpdateMeta["fb-push-as-page1-status"];
			}

			if (isSet($statusUpdateMeta["fb-push-as-profile-link"]) && $statusUpdateMeta["fb-push-as-profile-link"] != null) {
				$fbPushAsProfileLink = $statusUpdateMeta["fb-push-as-profile-link"];
			}

			if (isSet($statusUpdateMeta["fb-push-as-page1-link"]) && $statusUpdateMeta["fb-push-as-page1-link"] != null) {
				$fbPushAsPage1Link = $statusUpdateMeta["fb-push-as-page1-link"];
			}

			if (isSet($statusUpdateMeta["fb-share-image"]) && $statusUpdateMeta["fb-share-image"] != null) {
				$fbShareImage = $statusUpdateMeta["fb-share-image"];
			}
		}

		if ($twUser !== null && $twPassword !== null) {
			if (isSet($statusUpdateMeta["custom-twitter-status"]) && $statusUpdateMeta["custom-twitter-status"] != null) {
				$statusTwitter = $statusUpdateMeta["custom-twitter-status"];
				//echo("Custom Twitter status: ".$statusTwitter."<br />"); //debug
			}

			if (isSet($statusUpdateMeta["tw-push"]) && $statusUpdateMeta["tw-push"] == false) {
				$statusTwitter = null;
				//echo("The user decided not to send this post to Twitter<br />"); //debug
			}
		}

		if ($myspaceEmail !== null && $myspacePassword !== null) {

			if (isSet($statusUpdateMeta["custom-myspace-status"]) && $statusUpdateMeta["custom-myspace-status"] != null) {
				$statusMyspace = $statusUpdateMeta["custom-myspace-status"];
				//echo("Custom Myspace status: ".$statusMyspace."<br />"); //debug
			}

			if (isSet($statusUpdateMeta["custom-myspace-mood"]) && $statusUpdateMeta["custom-myspace-mood"] != null) {
				$myspaceMood = $statusUpdateMeta["custom-myspace-mood"];
				//echo("Custom Myspace mood: ".$myspaceMood."<br />"); //debug
			}

			if (isSet($statusUpdateMeta["ms-push"]) && $statusUpdateMeta["ms-push"] == false) {
				$statusMyspace = null;
				//echo("The user decided not to send this post to Myspace<br />"); //debug
			}
		}
	}

	// if the image to share is still null, let's try to get it from the post content
	if ($fbShareImage == null) {
		preg_match('/<img.+src="http:\/\/(.*?)"/i', $postContent, $postImage);
		if (isSet($postImage[1])) {
			$fbShareImage = "http://".$postImage[1];
		}
	}

	if ($cron) {
		$fbLogMessage .= "the Status Updater plugin cron job attempted to push a scheduled post.\n\n";
	} else {
		$fbLogMessage .= "a new post has been published on your blog and the Status Updater plugin v".$fbStatusUpdaterVersion." attempted to push it on social networks.\n\n";
	}

	// if FB email and password are not null, then login to facebook and send
	if ($fbUser != null && $fbPassword != null) {

		// Facebook don't like shortened links, it asks for captcha. No good...
		$statusFacebook = str_replace("%POST-TITLE%", $statusFacebook, $defaultStatusTemplate);
		$statusFacebook = str_replace("%POST-URL%", $postUrl, $statusFacebook);
		//echo("Final facebook status: [".$statusFacebook."]<br />"); //debug

		deleteFbSessionData();

		$homeUrl = "https://login.facebook.com/login.php";
		$homeResponse = getPage($homeUrl, null, null, null, false);
		fbDebug("Landing page [".$homeUrl."] ", $homeResponse, $fbDebug);
		$error = checkFbResponseError($homeResponse);
		if ($error == "not-available") {
			$facebookIsUp = false;
			$fbLogMessage .= "Facebook is not responding at this time. Please share your post later.\n\n";
		}

		if ($facebookIsUp) {

			preg_match('/name="lsd" value="(.*?)"/i', $homeResponse, $lsd);

			$loginUrl = "https://login.facebook.com/login.php?login_attempt=1";
			$postData = "version=1.0&lsd=".$lsd[1]."&return_session=0&session_key_only=0&locale=en_US&email=".$fbUser."&pass=".$fbPassword."&persistent=1&login=Login";

			// clean the session data before starting
			// the file should already be clean but... you never know if someone else touches it with some malicious plugin

			$loginResponse = getPage($loginUrl, $postData, null, null, false);
			$error = checkFbResponseError($loginResponse);
			fbDebug("Login [".$loginUrl."] ", $loginResponse, $fbDebug);

			// if the redirect can't be followed due to php restrictions, add a second call to the FB home
			if(ini_get('safe_mode') || ini_get("open_basedir") != false) {
				$homeUrl = "http://www.facebook.com/home.php";
				$loginResponse = getPage($homeUrl);
				$error = checkFbResponseError($loginResponse);
				fbDebug("User home [".$homeUrl."] ", $loginResponse, $fbDebug);
			}

			if ($error == "not-available") {
				$facebookIsUp = false;
				$fbLogMessage .= "Facebook is not responding at this time. Please share your post later.\n\n";
			}

			// check if facebook is asking for date of birth before going on
			if (strpos($loginResponse, "birthday_captcha_response") !== false) {
				// facebook is asking for date of birth
				if ($fbDobDay != null && $fbDobMonth != null && $fbDobYear != null) {
					$fbLogMessage .= "Facebook asked for the profile date of birth. Cross fingers and hope he's happy after this.\n\n";

					preg_match('/name="charset_test" value="(.*?)"/i', $loginResponse, $charset_test);
					preg_match('/name="version" value="(.*?)"/i', $loginResponse, $version);
					preg_match('/name="return_session" value="(.*?)"/i', $loginResponse, $return_session);
					preg_match('/name="t_auth_token" value="(.*?)"/i', $loginResponse, $t_auth_token);
					preg_match('/name="session_key_only" value="(.*?)"/i', $loginResponse, $session_key_only);
					preg_match('/name="lsd" value="(.*?)"/i', $loginResponse, $lsd);
					preg_match('/name="answered_captcha" value="(.*?)"/i', $loginResponse, $answered_captcha);
					preg_match('/name="captcha_persist_data" value="(.*?)"/i', $loginResponse, $captcha_persist_data);
					preg_match('/name="email" value="(.*?)"/i', $loginResponse, $email);

					$postData = "charset_test=".$charset_test[1];
					$postData .= "&version=".$version[1];
					$postData .= "&return_session=".$return_session[1];
					$postData .= "&t_auth_token=".$t_auth_token[1];
					$postData .= "&session_key_only=".$session_key_only[1];
					$postData .= "&lsd=".$lsd[1];
					$postData .= "&answered_captcha=".$answered_captcha[1];
					$postData .= "&birthday_captcha_year=".$fbDobYear;
					$postData .= "&birthday_captcha_day=".$fbDobDay;
					$postData .= "&birthday_captcha_month=".$fbDobMonth;
					$postData .= "&captcha_persist_data=".$captcha_persist_data[1];
					$postData .= "&email=".$email[1];
					$postData .= "&pass=".$fbPassword;
					$postData .= "&login=Login";

					$captchaDobActionUrl = "https://login.facebook.com/login.php?login_attempt=1";
					$loginResponse = getPage($captchaDobActionUrl, $postData, null, null, false);
					$error = checkFbResponseError($loginResponse);
					fbDebug("Date of birth captcha response [".$captchaDobActionUrl."] ", $loginResponse, $fbDebug);
					if ($error == "not-available") {
						$facebookIsUp = false;
						$fbLogMessage .= "Facebook is not responding at this time. Please share your post later.\n\n";
					}
				} else {
					$facebookLoggedIn = false;
					$fbLogMessage .= "Facebook is asking for the date of birth to confirm the accont. Please go to the plugin options page and set it with the same value of the Facebook profile\n\n";
				}
			}

			if ($error == "captcha") {
				$facebookCaptcha = true;
				$fbLogMessage .= "Facebook is asking for captcha. Possible reasons:\n1) too many wrong login attempts from your blog ip\n2) your account was not confirmed with the mobile phone number\n\nSuggested solution: turn the FB part of this plugin off, manually login to Facebook with the same account and do not push updates for at least 24h\n\n";
			}
			if ($error == "password") {
				$facebookLoggedIn = false;
				$fbLogMessage .= "The login to facebook failed. Possible reasons:\n1) wrong username or password\n2) you logged into Facebook with the same account while the plugin was working\n\n";
			}

			if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {

				// if the user want to post on the main profile status
				if ($fbPushAsProfileStatus) {

					preg_match('/post_form_id:"(.*?)"/i', $loginResponse, $postFormId);
					preg_match('/name="user" value="(.*?)"/i', $loginResponse, $profileId);
					preg_match('/UIComposer.focusInstance\(&quot;(.*?)&quot;/i', $loginResponse, $composerId);
					if (!isSet($composerId[1])) {
						// try in a different way
						preg_match('/UIComposer_STATE_PIC_OUTSIDE"  id="(.*?)"/i', $loginResponse, $composerId);
					}
					preg_match('/name="fb_dtsg" value="(.*?)"/i', $loginResponse, $fb_dtsg);

					//echo("User status parameters:<br />profileId: ".$profileId[1]."<br />composerId: ".$composerId[1]."<br />postFormId: ".$postFormId[1]."<br />fb_dtsg: ".$fb_dtsg[1]."<hr />"); // debug

					if (isSet($profileId[1]) && isSet($composerId[1]) && isSet($postFormId[1]) && isSet($fb_dtsg)) {

						$postData = "action=HOME_UPDATE";
						$postData .= "&home_tab_id=1";
						$postData .= "&profile_id=".$profileId[1];
						$postData .= "&status=".$statusFacebook;
						$postData .= "&target_id=0";
						$postData .= "&app_id=";
						$postData .= "&composer_id=".$composerId[1];
						$postData .= "&display_context=home";
						$postData .= "&post_form_id=".$postFormId[1];
						$postData .= "&fb_dtsg=".$fb_dtsg[1];
						$postData .= "&_log_display_context=home";
						$postData .= "&ajax_log=1";
						$postData .= "&post_form_id_source=AsyncRequest";
						$postData .= "&__a=1";

						$statusUpdateUrl = "http://www.facebook.com/ajax/updatestatus.php";
						$statusUpdateResponse = getPage($statusUpdateUrl, $postData, null, null, false);
						fbDebug("Status update [".$statusUpdateUrl."] ", $statusUpdateResponse, $fbDebug);
						$error = checkFbResponseError($statusUpdateResponse);
						if ($error == "not-available") {
							$facebookIsUp = false;
							$fbLogMessage .= "Facebook is not responding at this time, the plugin was unable to update the profile status.\n\n";
						}
						if ($error == "captcha") {
							$facebookCaptcha = true;
							$fbLogMessage .= "Facebook is asking for captcha. Possible reasons:\n1) too many wrong login attempts from your blog ip\n2) your account was not confirmed with the mobile phone number\n\nSuggested solution: turn the FB part of this plugin off, manually login to Facebook with the same account and do not push updates for at least 24h\n\n";
						}
						if ($error == "password") {
							$facebookLoggedIn = false;
							$fbLogMessage .= "The plugin was suddently logged out of facebook failed. Possible reasons:\n1) the facebook server that was hosting the plugin session has been turned down\n2) you logged into Facebook with the same account while the plugin was working\n\n";
						}
						if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {
							if (strpos($statusUpdateResponse, '{"error":0,') === false) {
								preg_match('/errorDescription":"(.*?)"/i', $statusUpdateResponse, $errorMessage);
								$fbLogMessage .= "The plugin was *NOT* able to push the status to the main profile. Facebook says [".$errorMessage[1]."]. More details by activating the \"Debug facebook update\" option.\n\n";
								$errorMessage = null;
							} else {
								$fbLogMessage .= "The status has been pushed to the main profile.\n\n";
							}
						}
					} else {
						// error while searching parameters to update Facebook
						$fbLogMessage .= "There was an error while assemblig parameters to update the Facebook status.\nprofileId: [".$profileId[1]."] composerId[".$composerId[1]."] postFormId[".$postFormId[1]."] fb_dtsg [".$fb_dtsg."]\n If this error persists, disable the plugin and wait for an update\n\n";
					}
				}

				// check again because the plugin might have been kicked out during the previous update
				if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {

					if ($fbPushAsProfileLink) {
						$sharerUrl = "http://www.facebook.com/sharer.php?u=".urlencode($postUrl);
						$sharerResponse = getPage($sharerUrl, null, null, null, false);
						fbDebug("Sharer response [".$sharerUrl."] ", $sharerResponse, $fbDebug);
						$error = checkFbResponseError($sharerResponse);
						if ($error == "not-available") {
							$facebookIsUp = false;
							$fbLogMessage .= "Facebook is not responding at this time, the plugin was unable to share the link on the main profile.\n\n";
						}
						if ($error == "captcha") {
							$facebookCaptcha = true;
							$fbLogMessage .= "Facebook is asking for captcha. Possible reasons:\n1) too many wrong login attempts from your blog ip\n2) your account was not confirmed with the mobile phone number\n\nSuggested solution: turn the FB part of this plugin off, manually login to Facebook with the same account and do not push updates for at least 24h\n\n";
						}
						if ($error == "password") {
							$facebookLoggedIn = false;
							$fbLogMessage .= "The plugin was suddently logged out of facebook failed. Possible reasons:\n1) the facebook server that was hosting the plugin session has been turned down\n2) you logged into Facebook with the same account while the plugin was working\n\n";
						}

						if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {

							preg_match('/name="post_form_id" value="(.*?)"/i', $sharerResponse, $postFormId);
							preg_match('/name="appid" value="(.*?)"/i', $sharerResponse, $appId);
							preg_match('/name="app_id" value="(.*?)"/i', $sharerResponse, $app_id);
							preg_match('/fb_dtsg:"(.*?)"/i', $sharerResponse, $fb_dtsg);


							// echo("User link parameters:<br />postFormId: ".$postFormId[1]."<br />appId: ".$appId[1]."<br />fb_dtsg: ".$fb_dtsg[1]."<br />app_id: ".$app_id[1]."<hr />"); // debug

							if (isSet($postFormId[1]) && isSet($app_id[1]) && isSet($appId[1]) && isSet($fb_dtsg[1])) {
								$postData = "is_popup=1";
								$postData .= "&subject=".$statusFacebook;
								$postData .= "&target_id=0";
								$postData .= "&action=post";
								$postData .= "&message=".$statusFacebook;
								$postData .= "&source_dialog=1";
								$postData .= "&src=bm";
								$postData .= "&app_id=".$app_id[1];
								$postData .= "&fb_dtsg=".$fb_dtsg[1];
								$postData .= "&post_form_id_source=AsyncRequest";
								$postData .= "&__a=1";
								$postData .= "&UIThumbPager_Input=0";
								$postData .= "&post_form_id=".$postFormId[1];
								$postData .= "&attachment[params][url]=".$postUrl;
								$postData .= "&attachment[params][medium]=106";
								$postData .= "&attachment[params][error]=1";
								$postData .= "&attachment[params][title]=".$postTitle;
								$postData .= "&attachment[params][summary]=".$postSummary;
								if ($fbShareIcon !== null) {
									$postData .= "&attachment[params][favicon]=".$fbShareIcon;
								}
								$postData .= "&attachment[params][extra]=";
								$postData .= "&attachment[params][video]=";
								$postData .= "&attachment[params][music]=";
								if ($fbShareImage !== null) {
									$postData .= "&attachment[params][images][0]=".$fbShareImage;
								} else {
									$postData .= "&attachment[params][images][0]=";
								}
								$postData .= "&attachment[type]=100";

								$sharerProfileUrl = "http://www.facebook.com/ajax/share.php";
								$sharerProfileResponse = getPage($sharerProfileUrl, $postData."&id=".$appId[1], null, null, false);
								fbDebug("Shared on profile [".$sharerProfileUrl."] ", $sharerProfileResponse, $fbDebug);
								$error = checkFbResponseError($sharerProfileResponse);
								if ($error == "not-available") {
									$facebookIsUp = false;
									$fbLogMessage .= "Facebook is not responding at this time, the plugin was unable to share the link on the main profile.\n\n";
								}
								if ($error == "captcha") {
									$facebookCaptcha = true;
									$fbLogMessage .= "Facebook is asking for captcha. Possible reasons:\n1) too many wrong login attempts from your blog ip\n2) your account was not confirmed with the mobile phone number\n\nSuggested solution: turn the FB part of this plugin off, manually login to Facebook with the same account and do not push updates for at least 24h\n\n";
								}
								if ($error == "password") {
									$facebookLoggedIn = false;
									$fbLogMessage .= "The plugin was suddently logged out of facebook failed. Possible reasons:\n1) the facebook server that was hosting the plugin session has been turned down\n2) you logged into Facebook with the same account while the plugin was working\n\n";
								}

								if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {
									if (strpos($sharerProfileResponse, '{"error":0,') === false) {
										preg_match('/errorDescription":"(.*?)"/i', $statusUpdateResponse, $errorMessage);
										$fbLogMessage .= "The plugin was *NOT* able to push the link to the main profile. Facebook says [".$errorMessage[1]."]. More details by activating the \"Debug facebook update\" option.\n\n";
										$errorMessage = null;
									} else {
										$fbLogMessage .= "The link has been shared on the profile.\n\n";
									}
								}
							} else {
								// error while searching parameters to update Facebook
								$fbLogMessage .= "There was an error while assemblig parameters to share the link on the Facebook profile.\npostFormId: [".$postFormId[1]."] app_id: [".$app_id[1]."] appId: [".$appId[1]."] fb_dtsg: [".$fb_dtsg[1]."] \nIf this error persists, disable the plugin and wait for an update\n\n";
							}
						}
					}
				}

				// check again because the plugin might have been kicked out during the previous update
				if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {

					if ($fbPage1Url != null && $fbPushAsPage1Status) {

						$pageResponse = getPage($fbPage1Url, null, null, null, false);
						fbDebug("Page1 response status [".$fbPage1Url."] ", $pageResponse, $fbDebug);
						$error = checkFbResponseError($pageResponse);
						if ($error == "not-available") {
							$facebookIsUp = false;
							$fbLogMessage .= "Facebook is not responding at this time, the plugin was unable to update the page 1 status.\n\n";
						}
						if ($error == "captcha") {
							$facebookCaptcha = true;
							$fbLogMessage .= "Facebook is asking for captcha. Possible reasons:\n1) too many wrong login attempts from your blog ip\n2) your account was not confirmed with the mobile phone number\n\nSuggested solution: turn the FB part of this plugin off, manually login to Facebook with the same account and do not push updates for at least 24h\n\n";
						}
						if ($error == "password") {
							$facebookLoggedIn = false;
							$fbLogMessage .= "The plugin was suddently logged out of facebook failed. Possible reasons:\n1) the facebook server that was hosting the plugin session has been turned down\n2) you logged into Facebook with the same account while the plugin was working\n\n";
						}

						if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {

							//preg_match('/"userId":(.*?),/i', $pageResponse, $profileId);
							preg_match('/user:(.*?),/i', $pageResponse, $profileId);
							if (!isSet($profileId[1]) || (isSet($profileId[1]) && $profileId[1] == "null")) {
								//preg_match('/window.PROFILE_FBID = "(.*?)"/i', $pageResponse, $profileId);
								preg_match('/&amp;u=(.*?)&quot;/i', $pageResponse, $profileId);
							}
							
							//preg_match('/targetID: "(.*?)",/i', $pageResponse, $targetId);
							preg_match('/\/feeds\/page.php\?format=atom10&amp;id=(.*?)"/i', $pageResponse, $targetId);
							if (!isSet($targetId[1])) {
								//preg_match('/ProfileStream.clearStatus(&quot;(.*?)&quot;/i', $pageResponse, $targetId);
								preg_match('/profile_id=(.*?)&amp;/i', $pageResponse, $targetId);
							}
							preg_match('/UIComposer.focusInstance\(&quot;(.*?)&quot;/i', $pageResponse, $composerId);
							preg_match('/post_form_id:"(.*?)",/i', $pageResponse, $postFormId);
							preg_match('/fb_dtsg:"(.*?)"/i', $pageResponse, $fb_dtsg);

							// echo("Page status parameters:<br />profileId: [".$profileId[1]."]<br />targetId: [".$targetId[1]."]<br />composerId: [".$composerId[1]."]<br />postFormId: [".$postFormId[1]."]<br />fb_dtsg: [".$fb_dtsg[1]."]<hr />"); // debug // debug

							if (isSet($profileId[1]) && isSet($targetId[1]) && isSet($composerId[1]) && isSet($postFormId[1]) && isSet($fb_dtsg[1])) {

								$postData = "action=PROFILE_UPDATE";
								$postData .= "&profile_id=".$profileId[1];
								$postData .= "&status=".$statusFacebook;
								$postData .= "&target_id=".$targetId[1];
								$postData .= "&app_id=";
								$postData .= "&composer_id=".$composerId[1];
								$postData .= "&display_context=profile";
								$postData .= "&mentions_suggest=1";
								$postData .= "&post_form_id=".$postFormId[1];
								$postData .= "&fb_dtsg=".$fb_dtsg[1];
								$postData .= "&_log_display_context=profile";
								$postData .= "&ajax_log=1";
								$postData .= "&post_form_id_source=AsyncRequest";
								$postData .= "&__a=1";

								$pageStatusUpdateUrl = "http://www.facebook.com/ajax/updatestatus.php";
								$pageStatusUpdateResponse = getPage($pageStatusUpdateUrl, $postData, null, null, false);
								fbDebug("Status update on page [".$pageStatusUpdateUrl."] ", $postData."\n\n".$pageStatusUpdateResponse, $fbDebug);
								$error = checkFbResponseError($pageStatusUpdateResponse);
								if ($error == "not-available") {
									$facebookIsUp = false;
									$fbLogMessage .= "Facebook is not responding at this time, the plugin was unable to update the page status.\n\n";
								}
								if ($error == "captcha") {
									$facebookCaptcha = true;
									$fbLogMessage .= "Facebook is asking for captcha. Possible reasons:\n1) too many wrong login attempts from your blog ip\n2) your account was not confirmed with the mobile phone number\n\nSuggested solution: turn the FB part of this plugin off, manually login to Facebook with the same account and do not push updates for at least 24h\n\n";
								}
								if ($error == "password") {
									$facebookLoggedIn = false;
									$fbLogMessage .= "The plugin was suddently logged out of facebook failed. Possible reasons:\n1) the facebook server that was hosting the plugin session has been turned down\n2) you logged into Facebook with the same account while the plugin was working\n\n";
								}
								if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {
									if (strpos($pageStatusUpdateResponse, '{"error":0,') === false) {
										preg_match('/errorDescription":"(.*?)"/i', $pageStatusUpdateResponse, $errorMessage);
										$fbLogMessage .= "The plugin was *NOT* able to push the status to the Page 1. Facebook says [".$errorMessage[1]."]. More details by activating the \"Debug facebook update\" option.\n\n";
										$errorMessage = null;
									} else {
										$fbLogMessage .= "The status has been pushed on the Page 1.\n\n";
									}
								}
							} else {
								// error while searching parameters to update Facebook
								$fbLogMessage .= "There was an error while assemblig parameters to push the status on the facebook page.\nprofileId: [".$profileId[1]."] targetId: [".$targetId[1]."] composerId: [".$composerId[1]."] postFormId: [".$postFormId[1]."] fb_dtsg: [".$fb_dtsg[1]."]\n\nIf this error persists, disable the plugin and wait for an update\n\n";
							}
						}
					}
				}

				// check again because the plugin might have been kicked out during the previous update
				if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {

					if ($fbPage1Url != null && $fbPushAsPage1Link) {

						$fbPage1Url .= "?pub=2309869772";
						$pageResponse = getPage($fbPage1Url, null, null, null, false);
						fbDebug("Page1 response link [".$fbPage1Url."] ", $pageResponse, $fbDebug);
						$error = checkFbResponseError($pageResponse);
						if ($error == "not-available") {
							$facebookIsUp = false;
							$fbLogMessage .= "Facebook is not responding at this time, the plugin was unable to share the link on the page 1.\n\n";
						}
						if ($error == "captcha") {
							$facebookCaptcha = true;
							$fbLogMessage .= "Facebook is asking for captcha. Possible reasons:\n1) too many wrong login attempts from your blog ip\n2) your account was not confirmed with the mobile phone number\n\nSuggested solution: turn the FB part of this plugin off, manually login to Facebook with the same account and do not push updates for at least 24h\n\n";
						}
						if ($error == "password") {
							$facebookLoggedIn = false;
							$fbLogMessage .= "The plugin was suddently logged out of facebook failed. Possible reasons:\n1) the facebook server that was hosting the plugin session has been turned down\n2) you logged into Facebook with the same account while the plugin was working\n\n";
						}

						if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {

							//preg_match('/"user":(.*?),/i', $pageResponse, $userId);
							preg_match('/user:(.*?),/i', $pageResponse, $userId);
							if (!isSet($userId[1])) {
								//preg_match('/user:(.*?),/i', $pageResponse, $userId);
								preg_match('/&amp;u=(.*?)&quot;/i', $pageResponse, $userId);
							}
							//preg_match('/targetID: "(.*?)",/i', $pageResponse, $pageId);
							preg_match('/\/feeds\/page.php\?format=atom10&amp;id=(.*?)"/i', $pageResponse, $pageId);
							if (!isSet($pageId[1])) {
								preg_match('/profile_id=(.*?)&amp;/i', $pageResponse, $pageId);
							}
							preg_match('/UIComposer.focusInstance\(&quot;(.*?)&quot;/i', $pageResponse, $composerId);
							preg_match('/post_form_id:"(.*?)"/i', $pageResponse, $postFormId);
							preg_match('/fb_dtsg:"(.*?)"/i', $pageResponse, $fb_dtsg);

							// echo("Page link parameters:<br />userId: ".$userId[1]."<br />pageId: ".$pageId[1]."<br />composerId: ".$composerId[1]."<br />postFormId: ".$postFormId[1]."<br />fb_dtsg: ".$fb_dtsg[1]."<hr />"); // debug

							if (isSet($userId[1]) && isSet($pageId[1]) && isSet($composerId[1]) && isSet($postFormId[1]) && isSet($fb_dtsg[1])) {

								$postData = "attachment[params][url]=".$postUrl;
								$postData .= "&attachment[params][images][0]=".$fbShareImage;
								$postData .= "&attachment[params][extra]=";
								$postData .= "&attachment[params][video]=";
								$postData .= "&attachment[params][music]=";
								$postData .= "&attachment[params][title]=".$postTitle;
								$postData .= "&attachment[params][summary]=".$postSummary;
								$postData .= "&attachment[params][error]=1";
								$postData .= "&attachment[params][medium]=106";
								$postData .= "&attachment[type]=100";
								$postData .= "&app_id=2309869772";
								$postData .= "&UIThumbPager_Input=0";
								$postData .= "&id=".$userId[1];
								$postData .= "&target_id=".$pageId[1];
								$postData .= "&action=post";
								$postData .= "&button=publish_button";
								//$postData .= "&comment_text="."this is a comment to the link";
								$postData .= "&comment_text=";
								$postData .= "&composer_id=".$composerId[1];
								$postData .= "&display_context=profile";
								$postData .= "&mentions_suggest=1";
								$postData .= "&post_form_id=".$postFormId[1];
								$postData .= "&fb_dtsg=".$fb_dtsg[1];
								$postData .= "&_log_display_context=profile";
								$postData .= "&ajax_log=1";
								$postData .= "&post_form_id_source=AsyncRequest";
								$postData .= "&__a=1";

								$shareLinkOnPageUrl = "http://www.facebook.com/ajax/profile/composer.php";
								$shareLinkOnPageResponse = getPage($shareLinkOnPageUrl, $postData, null, null, false);
								fbDebug("Shared on page [".$shareLinkOnPageUrl."] ", $shareLinkOnPageResponse, $fbDebug);
								$error = checkFbResponseError($shareLinkOnPageResponse);
								if ($error == "not-available") {
									$facebookIsUp = false;
									$fbLogMessage .= "Facebook is not responding at this time, the plugin was unable to share the link on the page 1.\n\n";
								}
								if ($error == "captcha") {
									$facebookCaptcha = true;
									$fbLogMessage .= "Facebook is asking for captcha. Possible reasons:\n1) too many wrong login attempts from your blog ip\n2) your account was not confirmed with the mobile phone number\n\nSuggested solution: turn the FB part of this plugin off, manually login to Facebook with the same account and do not push updates for at least 24h\n\n";
								}
								if ($error == "password") {
									$facebookLoggedIn = false;
									$fbLogMessage .= "The plugin was suddently logged out of facebook failed. Possible reasons:\n1) the facebook server that was hosting the plugin session has been turned down\n2) you logged into Facebook with the same account while the plugin was working\n\n";
								}

								if ($facebookIsUp && !$facebookCaptcha && $facebookLoggedIn) {
									if (strpos($shareLinkOnPageResponse, '{"error":0,') === false) {
										preg_match('/errorDescription":"(.*?)"/i', $shareLinkOnPageResponse, $errorMessage);
										$fbLogMessage .= "The plugin was *NOT* able to push the link to the Page 1. Facebook says [".$errorMessage[1]."]. More details by activating the \"Debug facebook update\" option.\n\n";
										$errorMessage = null;
									} else {
										$fbLogMessage .= "The link has been pushed on the Page 1.\n\n";
									}
								}
							} else {
								// error while searching parameters to update Facebook
								$fbLogMessage .= "There was an error while assemblig parameters to share the link on the facebook page.\nuserId: [".$userId[1]."] pageId: [".$pageId[1]."] composerId: [".$composerId[1]."] postFormId: [".$postFormId[1]."] fb_dtsg: [".$fb_dtsg[1]."]\n\nIf this error persists, disable the plugin and wait for an update\n\n";
							}
						}
					}
				}
			}
		}
		// logout from facebook so that a malicious plugin sniffing and sending FB session data won't be able to use it because it's already expired
		getPage("http://www.facebook.com/logout.php");
		deleteFbSessionData();
	}

	//Twitter?
	if ($twUser != null && $twPassword != null && $statusTwitter !== null) {

		$twitterUrl = null;

		// url shortener, requires json
		$twitterUrl = shortenLink($postUrl, $statusUpdate);

		if ($twitterUrl == null) {
			$twitterUrl = $postUrl;
		}

		//echo("Twitter short url: ".$twitterUrl."<br />"); //debug

		$tmpTwitterStatus =  str_replace("%POST-URL%", $twitterUrl, $defaultStatusTemplate);
		$availableTwitterStatusLength = 140 - strlen($tmpTwitterStatus) + strlen("%POST-TITLE%");

		if (strlen($statusTwitter) > $availableTwitterStatusLength) {
			$statusTwitter = substr($statusTwitter, 0, ($availableTwitterStatusLength - 3))."...";
		}

		$statusTwitter = str_replace("%POST-TITLE%", $statusTwitter, $tmpTwitterStatus);

		//echo("Final twitter status: [".$statusTwitter."]<br />"); //debug

		$twUrl = 'http://twitter.com/statuses/update.xml';

		$postData = "status=".urlencode($statusTwitter);

		$twResponse = getPage($twUrl, $postData, $twUser, $twPassword);

		if ($twResponse === null) {
			$fbLogMessage .= "The Twitter update didn't go that well :(.\n\n";
		} else {
			$fbLogMessage .= "The status \"".$statusTwitter."\" has been published to Twitter.\n\n";
		}
	}

	// Myspace?
	if ($myspaceEmail !== null && $myspacePassword !== null && $myspaceMood !== null && $statusMyspace !== null) {

		$tmpMyspaceStatus =  str_replace("%POST-URL%", $postUrl, $defaultStatusTemplate);
		$availableMyspaceStatusLength = 140 - 21 + strlen("%POST-TITLE%"); // Myspace shortens link by itself. An avarage link is 20 chars

		if (strlen($statusMyspace) > $availableMyspaceStatusLength) {
			$statusMyspace = substr($statusMyspace, 0, ($availableMyspaceStatusLength - 3))."...";
		}

		$statusMyspace = str_replace("%POST-TITLE%", $statusMyspace, $tmpMyspaceStatus);

		//echo("Final Myspace status: [".$statusMyspace."] (url is shortened by myspace)<br />"); //debug

		// login page
		$loginForm = getPage("http://m.myspace.com/login.wap", null, null, null, false);

		preg_match('/method="post" action="(.*?)" id=/i', $loginForm, $loginAction);
		preg_match('/<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="(.*?)" \/>/i', $loginForm, $loginViewState);

		if (isSet($loginAction[1]) && isSet($loginViewState[1])) {
			$postData = "__VIEWSTATE=".$loginViewState[1]."&emailTextBox=".$myspaceEmail."&passwordTextBox=".$myspacePassword."&rememberMe=on&loginCommand=&cvt=&cg=&gjr=true";

			// send myspace email and password
			$loginResponse = getPage("http://m.myspace.com".$loginAction[1], $postData);
			//echo("<hr />".$loginResponse."<hr />"); //debug
			
			$homeResponse = getPage("http://m.myspace.com/home.wap");

			// look for the update link
			preg_match('/<a href="(.*?)">Update<\/a>/i', $loginResponse, $updateForm);

			if (isSet($updateForm[1])) {

				//get the update form
				$updateFormResponse = getPage("http://m.myspace.com".$updateForm[1]);
				//echo("<hr />".$updateFormResponse."<hr />"); //debug

				preg_match('/method="post" action="(.*?)" id=/i', $updateFormResponse, $updateAction);

				preg_match('/<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="(.*?)" \/>/i', $updateFormResponse, $updateViewState);

				if (isSet($updateAction[1]) && isSet($updateViewState[1])) {

					$status = "test ! hey*";
					$mood = "idle";

					$postData = "__VIEWSTATE=".$updateViewState[1]."&us=".$statusMyspace."&mn=".$myspaceMood."&save=Save";
					//echo("Myspace post data: [".$postData."]<br />"); //debug

					// here too no confirmation message :(
					$updateResponse = getPage("http://m.myspace.com".$updateAction[1], $postData);
					//echo("<hr />".$updateResponse."<hr />"); //debug

					if ($updateResponse === false || trim($updateResponse."") == "") {
						$fbLogMessage .= "The Myspace update didn't go that well :(.\n\n";
					} else {
						$fbLogMessage .= "The status \"".$statusMyspace."\" has been published on the Myspace profile.\n\n";
					}
				}
			}
		}

		// sign out in any case from myspace
		preg_match('/href="(.*?)">SignOut<\/a>/i', $loginForm, $signOut);

		if (isSet($signOut[1])) {
			$signOutResponse = getPage("http://m.myspace.com".$signOut[1]);

			//echo($signOutResponse."<hr />");
		}
	}

	// everything has been done, clean the fbSessionData.txt file so that if someone tries to download it, it's empty
	deleteFbSessionData();

	$time = getMicrotime() - $startTime;

	$fbLogMessage .= "\nThe whole process took ".number_format($time, 3, ".", "")." seconds.\n";

	if ($fbDebug) {
		$fbLogMessage .= "\n\nThe following html is the response facebook gave to the plugin. If you can read html try discover if there's something wrong and what it is.\n\n";

		if ($fbDebugLog == null) {
			$fbLogMessage .= "The log is null. Odd";
		} else {
			foreach ($fbDebugLog as $action => $page) {
				$fbLogMessage .= "##############".$action."##############\n".$page."\n----------------------------------------------------------------\n\n\n";
			}
		}
	}

	if ($fbLogEmail != null) {
		sendLogEmail($fbLogEmail, $fbLogMessage);
	}

	//exit(); //debug
}
?>