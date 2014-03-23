<?php

function fbStatusAddMetaFields() {

		global $fbStatusUpdaterVersion;

		$statusUpdate = get_option('fb-status-update');

		if (!isSet($statusUpdate["version"]) || (isSet($statusUpdate["version"]) && $statusUpdate["version"] != $fbStatusUpdaterVersion) ) {
			// the plugin has not been activated yet
			$statusUpdate = fbStatusAct();
		}

		//do not add anything if the user didn't choose the advanced option
		if (!isSet($statusUpdate["fb-advanced-status"]) || (isSet($statusUpdate["fb-advanced-status"]) && $statusUpdate["fb-advanced-status"] !== true)) {
			return;
		}

	    global $post;

	    $post_id = $post;
	    if (is_object($post_id)) {
	    	$post_id = $post_id->ID;
	    }

		$statusUpdateMeta = get_post_meta($post_id, 'fb-status-updater-meta', true);
		if ($statusUpdateMeta == "") {
			$statusUpdateMeta["fb-push-as-profile-status"] = $statusUpdate["fb-push-as-profile-status"];
			$statusUpdateMeta["fb-push-as-page1-status"] = $statusUpdate["fb-push-as-page1-status"];
			$statusUpdateMeta["custom-facebook-status"] = null;
			$statusUpdateMeta["fb-push-as-profile-link"] = $statusUpdate["fb-push-as-profile-link"];
			$statusUpdateMeta["fb-push-as-page1-link"] = $statusUpdate["fb-push-as-page1-link"];
			$statusUpdateMeta["fb-share-image"] = null;
			$statusUpdateMeta["custom-twitter-status"] = null;
			$statusUpdateMeta["tw-push"] = true;
			$statusUpdateMeta["ms-push"] = true;
			$statusUpdateMeta["custom-myspace-status"] = null;
			$statusUpdateMeta["custom-myspace-mood"] = null;
			$statusUpdateMeta["push"] = true;
		}

	    ?>
			<script type="text/javascript">
				function customFbStatus() {
					var check1 = document.getElementById("su-push-as-profile-status").checked;
					if (document.getElementById("su-push-as-page1-status")) {
						var check2 = document.getElementById("su-push-as-page1-status").checked;
					} else {
						var check2 = false;
					}

					var isVisible = jQuery('#customFbStatus').is(':visible');
					if (check1 || check2) {
						if (!isVisible) {
							jQuery("#customFbStatus").show("slow");
						}
					}

					if (!check1 && !check2) {
						jQuery("#customFbStatus").hide("slow");
					}

				}

				function fbShareImage() {
					var check1 = document.getElementById("su-push-as-profile-link").checked;

					if (document.getElementById("su-push-as-page1-link")) {
						var check2 = document.getElementById("su-push-as-page1-link").checked;
					} else {
						var check2 = false;
					}

					var isVisible = jQuery('#shareImage').is(':visible');
					if (check1 || check2) {
						if (!isVisible) {
							jQuery("#shareImage").show("slow");
						}
					}

					if (!check1 && !check2) {
						jQuery("#shareImage").hide("slow");
						document.getElementById("fb-share-image").value = "";
					}
				}

				function fbCheckUrl(value) {
					if (value.length >= 7) {
						if (value.toLowerCase().substr(0, 7) != "http://") {
							window.alert("The picture field should contain a full url, like http://<?php echo($_SERVER["SERVER_NAME"]); ?>/2009/09/09/picture.jpg");
						}
						var ext = value.toLowerCase().substr(value.length - 4, 4);

						if (ext != ".jpg" && ext != ".gif" && ext != ".png") {
							window.alert("The url should point to a jpg, gif or png file");
						}
					}
				}

				function twCheck() {
					var check = document.getElementById("su-push-to-twitter").checked;
					var isVisible = jQuery('#customTwStatus').is(':visible');
					if (check) {
						if (!isVisible) {
							jQuery("#customTwStatus").show("slow");
						}
					} else {
						jQuery("#customTwStatus").hide("slow");
					}
				}

				function msCheck() {
					var check = document.getElementById("su-push-to-myspace").checked;
					var isVisible = jQuery('#customMsStatus').is(':visible');
					if (check) {
						if (!isVisible) {
							jQuery("#customMsStatus").show("slow");
							jQuery("#customMsMood").show("slow");
						}
					} else {
						jQuery("#customMsStatus").hide("slow");
						jQuery("#customMsMood").hide("slow");
					}
				}

				function suCheck() {
					var check = document.getElementById("su-push-yes").checked;
					var isVisible = jQuery('#suWrapper').is(':visible');
					if (check) {
						if (!isVisible) {
							jQuery("#suWrapper").show("slow");
						}
					} else {
						jQuery("#suWrapper").hide("slow");
					}
				}
			</script>

			<input id="fb-status-updater-edit" name="fb-status-updater-edit" type="hidden" value="true" />

			<div class="form-table" style="margin-bottom:20px;">
				<div id="suWrapper"<?php if (!$statusUpdateMeta["push"]) { echo(" style=\"display:none\""); } ?>>
					<?php if (isSet($statusUpdate["fb-email"]) && isSet($statusUpdate["fb-password"]) && $statusUpdate["fb-email"] != null && $statusUpdate["fb-password"] != null) { ?>
						<p>
							<label for="su-push-as-profile-status">
								<input type="checkbox" id="su-push-as-profile-status" name="su-push-as-profile-status" value="true" <?php if ($statusUpdateMeta["fb-push-as-profile-status"]) { echo("checked=\"checked\" "); } ?>onclick="customFbStatus()" /> Push as Facebook profile status
							</label>
						</p>
						<?php if (isSet($statusUpdate["fb-page1-url"]) && $statusUpdate["fb-page1-url"] !== null) { ?>
							<p>
								<label for="su-push-as-page1-status">
									<input type="checkbox" id="su-push-as-page1-status" name="su-push-as-page1-status" value="true" <?php if ($statusUpdateMeta["fb-push-as-page1-status"]) { echo("checked=\"checked\" "); } ?>onclick="customFbStatus()" /> Push as Facebook page status
								</label>
							</p>
						<?php } ?>

						<p id="customFbStatus"<?php if (!$statusUpdateMeta["fb-push-as-page1-status"] && !$statusUpdateMeta["fb-push-as-profile-status"]) { echo(" style=\"display:none\"");} ?>>
							<label for="su-custom-facebook-status"><strong>Custom facebook status</strong>:</label> <a href="javascript:void(null)" onclick="jQuery('#infoFb').toggle('slow');">?</a><br />
							<input style="width: 100%;" id="su-custom-facebook-status" name="su-custom-facebook-status" type="text" value="<?php echo(str_replace("\"", "&quot;", $statusUpdateMeta["custom-facebook-status"])); ?>" onkeyup="fbStatusCheckOption('fb-status-up-custom-status', 'fb-status', 'Facebook');" /><br />
							<em id="infoFb" style="display:none">By leaving this field empty, the default status (the post title) will be used if the status is pushed to the profile or a page</em>
						</p>

						<p><label for="su-push-as-profile-link"><input type="checkbox" id="su-push-as-profile-link" name="su-push-as-profile-link" value="true" <?php if ($statusUpdateMeta["fb-push-as-profile-link"]) { echo("checked=\"checked\" "); } ?>onclick="fbShareImage()" /> Push to Facebook profile as link</label></p>

						<?php if (isSet($statusUpdate["fb-page1-url"]) && $statusUpdate["fb-page1-url"] !== null) { ?>
							<p><label for="su-push-as-page1-link"><input type="checkbox" id="su-push-as-page1-link" name="su-push-as-page1-link" value="true" <?php if ($statusUpdateMeta["fb-push-as-page1-link"]) { echo("checked=\"checked\" "); } ?>onclick="fbShareImage()" /> Push to Facebook page as link</label></p>
						<?php } ?>


						<p id="shareImage"<?php if (!$statusUpdateMeta["fb-push-as-page1-link"] && !$statusUpdateMeta["fb-push-as-profile-link"]) { echo(" style=\"display:none\""); }?>>
							<label for="fb-share-image"><strong>Custom link picture</strong>:</label> <a href="javascript:void(null)" onclick="jQuery('#infoPicture').toggle('slow');">?</a><br />
							<input style="width: 100%;" id="su-share-image" name="su-share-image" type="text" value="<?php echo(str_replace("\"", "&quot;", $statusUpdateMeta["fb-share-image"])); ?>" onkeyup="fbCheckUrl(this.value);" /><br />
							<em id="infoPicture" style="display:none">Please enter the full path to the picture, like http://<?php echo($_SERVER["SERVER_NAME"]); ?>/2009/09/09/picture.jpg otherwise the default one will be used. If no default, the plugin will look for the first image inside the post content (whose src starts with http://). If none found, no image will be shared along with the link.</em>
						</p>
					<?php } ?>
					<?php if (isSet($statusUpdate["tw-user"]) && isSet($statusUpdate["tw-password"]) && $statusUpdate["tw-user"] != null && $statusUpdate["tw-password"] != null) { ?>

						<p><label for="su-push-to-twitter"><input type="checkbox" id="su-push-to-twitter" name="su-push-to-twitter" value="true" <?php if ($statusUpdateMeta["tw-push"]) { echo("checked=\"checked\" "); } ?>onclick="twCheck()" /> Push to Twitter</label></p>

						<p id="customTwStatus"<?php if (!$statusUpdateMeta["tw-push"]) { echo(" style=\"display:none\""); }?>>
							<label for="su-custom-tw-status"><strong>Custom twitter status</strong>:</label> <a href="javascript:void(null)" onclick="jQuery('#infoTw').toggle('slow');">?</a><br />
							<input style="width: 100%;" id="su-custom-tw-status" name="su-custom-tw-status" type="text" value="<?php echo(str_replace("\"", "&quot;", $statusUpdateMeta["custom-twitter-status"])); ?>" /><br />
							<em id="infoTw" style="display:none">By leaving this field empty, the default status will be used.<br />Please note that Twitter allows 140 chars updates, your status might be truncated if longer.</em>
						</p>
					<?php } ?>
					<?php if (isSet($statusUpdate["myspace-email"]) && isSet($statusUpdate["myspace-password"]) && $statusUpdate["myspace-email"] != null && $statusUpdate["myspace-password"] != null) { ?>

						<p><label for="su-push-to-myspace"><input type="checkbox" id="su-push-to-myspace" name="su-push-to-myspace" value="true" <?php if ($statusUpdateMeta["ms-push"]) { echo("checked=\"checked\" "); } ?>onclick="msCheck()" /> Push to Myspace</label></p>

						<p id="customMsStatus"<?php if (!$statusUpdateMeta["ms-push"]) { echo(" style=\"display:none\""); }?>>
							<label for="su-custom-myspace-status"><strong>Custom myspace status</strong>:</label> <a href="javascript:void(null)" onclick="jQuery('#infoMs1').toggle('slow');">?</a><br />
							<input style="width: 100%;" id="su-custom-myspace-status" name="su-custom-myspace-status" type="text" value="<?php echo(str_replace("\"", "&quot;", $statusUpdateMeta["custom-myspace-status"])); ?>" /><br />
							<em id="infoMs1" style="display:none">By leaving this field empty, the default status will be used.<br />Please note that Myspace allows 140 chars updates, your status might be truncated if longer.</em>
						</p>
						<p id="customMsMood"<?php if (!$statusUpdateMeta["ms-push"]) { echo(" style=\"display:none\""); }?>>
							<label for="su-custom-myspace-status"><strong>Custom myspace mood</strong>:</label> <a href="javascript:void(null)" onclick="jQuery('#infoMs2').toggle('slow');">?</a><br />
							<input style="width: 100%;" id="su-custom-myspace-status" name="su-custom-myspace-status" type="text" value="<?php echo(str_replace("\"", "&quot;", $statusUpdateMeta["custom-myspace-mood"])); ?>" /><br />
							<em id="infoMs2" style="display:none">By leaving this field empty, the default mood will be used.</em>
						</p>
					<?php } ?>
				</div>
				<!-- add the number of characters used -->
				<?php if (strpos($statusUpdate["fb-post-ids"], "#".$post_id."#") === false) { ?>
					<p>
						<strong>Push this post to Social Networks?:</strong><br />
						<label for="su-push-yes"><input id="su-push-yes" name="su-push" type="radio" value="true" <?php if ($statusUpdateMeta["push"]) { echo("checked=\"checked\""); } ?> onclick="suCheck()" /> Yes</label>
						<label for="su-push-no"><input id="su-push-no" name="su-push" type="radio" value="false" <?php if (!$statusUpdateMeta["push"]) { echo("checked=\"checked\""); } ?> onclick="suCheck()" /> No</label>
						<br />If none of the checkbox above is selected, this post won't be sent
					</p>
				<?php } else { ?>
					<p>
						<strong>This post was already pushed to Social Networks. Want to push it one more time?</strong><br />
						<label for="su-push-again-yes"><input id="su-push-again-yes" name="su-push-again" type="radio" value="true" /> Yes</label>
						<label for="su-push-again-no"><input id="su-push-again-no" name="su-push-again" type="radio" value="false" checked="checked" /> No</label>
						<br />If none of the checkbox above is selected, this post won't be sent
					</p>
				<?php } ?>
			</div>
	    <?php
}

function fbStatusProcessMetaFields($id) {

	if (isSet($_POST["fb-status-updater-edit"]) && trim($_POST["fb-status-updater-edit"]) == "true") {

		$statusUpdateMeta["custom-facebook-status"] = null;
		$statusUpdateMeta["custom-twitter-status"] = null;
		$statusUpdateMeta["custom-myspace-status"] = null;
		$statusUpdateMeta["custom-myspace-mood"] = null;
		$statusUpdateMeta["fb-push-as-profile-status"] = false;
		$statusUpdateMeta["fb-push-as-profile-link"] = false;
		$statusUpdateMeta["fb-push-as-page1-status"] = false;
		$statusUpdateMeta["fb-push-as-page1-link"] = false;
		$statusUpdateMeta["fb-share-image"] = null;
		$statusUpdateMeta["tw-push"] = false;
		$statusUpdateMeta["ms-push"] = false;
		$statusUpdateMeta["push"] = true;


		if (isSet($_POST["su-push-as-profile-status"]) && trim($_POST["su-push-as-profile-status"]) == "true") {
			$statusUpdateMeta["fb-push-as-profile-status"] = true;
		}

		if (isSet($_POST["su-push-as-page1-status"]) && trim($_POST["su-push-as-page1-status"]) == "true") {
			$statusUpdateMeta["fb-push-as-page1-status"] = true;
		}

		if (isSet($_POST["su-custom-facebook-status"]) && trim($_POST["su-custom-facebook-status"]) != "") {
			$statusUpdateMeta["custom-facebook-status"] = trim(strip_tags(stripslashes($_POST["su-custom-facebook-status"])));
		}

		if (isSet($_POST["su-push-as-profile-link"]) && trim($_POST["su-push-as-profile-link"]) == "true") {
			$statusUpdateMeta["fb-push-as-profile-link"] = true;
		}

		if (isSet($_POST["su-push-as-page1-link"]) && trim($_POST["su-push-as-page1-link"]) == "true") {
			$statusUpdateMeta["fb-push-as-page1-link"] = true;
		}

		if (isSet($_POST["su-share-image"]) && trim($_POST["su-share-image"]) != "") {
			$statusUpdateMeta["fb-share-image"] = trim(strip_tags(stripslashes($_POST["su-share-image"])));
			if (substr(strToLower($statusUpdateMeta["fb-share-image"]), 0, 7) !== "http://") {
				$statusUpdateMeta["fb-share-image"] = null;
			}

			$ext = substr(strToLower($statusUpdateMeta["fb-share-image"]), strlen($statusUpdateMeta["fb-share-image"]) - 4, 4);

			if ($ext != ".gif" && $ext != ".jpg" && $ext != ".png") {
				$statusUpdateMeta["fb-share-image"] = null;
			}
		}

		if (isSet($_POST["su-push-to-twitter"]) && trim($_POST["su-push-to-twitter"]) == "true") {
			$statusUpdateMeta["tw-push"] = true;
		}

		if (isSet($_POST["su-custom-tw-status"]) && trim($_POST["su-custom-tw-status"]) != "") {
			$statusUpdateMeta["custom-twitter-status"] = trim(strip_tags(stripslashes($_POST["su-custom-tw-status"])));
		}

		if (isSet($_POST["su-push-to-myspace"]) && trim($_POST["su-push-to-myspace"]) == "true") {
			$statusUpdateMeta["ms-push"] = true;
		}

		if (isSet($_POST["su-custom-myspace-status"]) && trim($_POST["su-custom-myspace-status"]) != "") {
			$statusUpdateMeta["custom-myspace-status"] = trim(strip_tags(stripslashes($_POST["su-custom-myspace-status"])));
		}

		if (isSet($_POST["su-custom-myspace-mood"]) && trim($_POST["su-custom-myspace-mood"]) != "") {
			$statusUpdateMeta["custom-myspace-mood"] = trim(strip_tags(stripslashes($_POST["su-custom-myspace-mood"])));
		}

		if (isSet($_POST["su-push"]) && trim($_POST["su-push"]) == "true") {
			$statusUpdateMeta["push"] = true;
		}

		if (isSet($_POST["su-push"]) && trim($_POST["su-push"]) == "false") {
			$statusUpdateMeta["push"] = false;
		}

		if ($statusUpdateMeta["fb-push-as-profile-status"] == false && $statusUpdateMeta["fb-push-as-profile-link"] == false && $statusUpdateMeta["fb-push-as-page1-status"] == false && $statusUpdateMeta["fb-push-as-page1-link"] == false && $statusUpdateMeta["tw-push"] == false && $statusUpdateMeta["ms-push"] == false) {
			$statusUpdateMeta["push"] = false;
		}

		// if the user want to push the post to sn again, just delete its id in the id list so that the next time the "send" function is called, this post is included
		if (isSet($_POST["su-push-again"]) && trim($_POST["su-push-again"]) == "true") {
			$statusUpdate = get_option('fb-status-update');

			if (isSet($statusUpdate["fb-post-ids"])) {
				$statusUpdate["fb-post-ids"] = str_replace("#".$id."#", "#", $statusUpdate["fb-post-ids"]);
				update_option('fb-status-update', $statusUpdate);
			}
		}

		delete_post_meta($id, 'fb-status-updater-meta');
		add_post_meta($id, "fb-status-updater-meta", $statusUpdateMeta, true);
	}
}

?>