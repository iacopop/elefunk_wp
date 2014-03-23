<?php
function fbStatusAct() {
	global $wpdb, $fbStatusUpdaterVersion;

	$statusUpdate = get_option('fb-status-update');
	//echo("before ".$statusUpdate["fb-post-ids"]."<br />");

	// here we have to add all existing posts to the list of the already sent, otherwise the chron job will post the old ones every half an hour

	$fbPostIds = "#";

	// get all the post ids and set them in the options so that previous posts won't be sent by the cron job
	$ids = $wpdb->get_col("SELECT ID FROM ".$wpdb->posts." WHERE post_status = 'publish' AND post_type = 'post';");
	if (!empty($ids)) {
		foreach ($ids as $id) {
			$fbPostIds .= $id."#";

			// check if it's necessary to translate old post metadata stored by the plugin
			if ($statusUpdate !== false) {
				if (isSet($statusUpdate["version"]) && $statusUpdate["version"] != null) {
					if (substr($statusUpdate["version"], 0, 3) < 1.5) {
						$rightValue = get_post_meta($id, "fb-status-updater-meta", true);
						if ($rightValue === "") {

							$isThereSomething = get_post_meta($id, "fb-status-updater-send", true);
							if ($isThereSomething != "") {
								//echo("The post id [".$id."] has old values<br />");// debug
								if ($isThereSomething == "true") {
									$statusUpdateMeta["push"] = true;
								} else {
									$statusUpdateMeta["push"] = false;
								}

								$fbStatus = get_post_meta($id, "fb-status-updater-status", true);
								if ($fbStatus !== "") {
									$statusUpdateMeta["custom-facebook-status"] = $fbStatus;
								}

								$shareLink = get_post_meta($id, "fb-status-updater-share-link", true);
								if ($shareLink == "true") {
									$statusUpdateMeta["fb-push-as-profile-link"] = true;
								}

								$shareImage = get_post_meta($id, "fb-status-updater-share-image", true);
								if ($shareImage !== "") {
									$statusUpdateMeta["fb-share-image"] = $shareImage;
								}

								$twStatus = get_post_meta($id, "fb-status-updater-tw-status", true);
								if ($twStatus !== "") {
									$statusUpdateMeta["custom-twitter-status"] = $twStatus;
								}

								$msStatus = get_post_meta($id, "fb-status-updater-ms-status", true);
								if ($msStatus !== "") {
									$statusUpdateMeta["custom-myspace-status"] = $msStatus;
								}

								$msMood = get_post_meta($id, "fb-status-updater-ms-mood", true);
								if ($msMood !== "") {
									$statusUpdateMeta["custom-myspace-mood"] = $msMood;
								}

								$sendFb = get_post_meta($id, "fb-status-updater-send-fb", true);
								if ($sendFb == "true") {
									$statusUpdateMeta["fb-push-as-profile-status"] = true;
								}
								if ($sendFb == "false") {
									$statusUpdateMeta["fb-push-as-profile-status"] = false;
								}

								$sendTw = get_post_meta($id, "fb-status-updater-send-tw", true);
								if ($sendTw == "true") {
									$statusUpdateMeta["tw-push"] = true;
								}
								if ($sendTw == "false") {
									$statusUpdateMeta["tw-push"] = false;
								}

								$sendMs = get_post_meta($id, "fb-status-updater-send-ms", true);
								if ($sendMs == "true") {
									$statusUpdateMeta["ms-push"] = true;
								}
								if ($sendMs == "false") {
									$statusUpdateMeta["ms-push"] = false;
								}

								//echo("New values for [".$id."]:<br /><br />"); // debug
								//var_dump($statusUpdateMeta); // debug
								//echo("<br /><br />"); // debug

								add_post_meta($id, "fb-status-updater-meta", $statusUpdateMeta, true);
							}
						} else {
							//echo("The post id [".$id."] has already new values<br />");// debug
							// there's already something stored correctly, do not overwrite with old values
							// should never happen indeed
						}

						// clean old values!
						delete_post_meta($id, 'fb-status-updater-status');
						delete_post_meta($id, 'fb-status-updater-share-link');
						delete_post_meta($id, 'fb-status-updater-share-image');
						delete_post_meta($id, 'fb-status-updater-tw-status');
						delete_post_meta($id, 'fb-status-updater-ms-status');
						delete_post_meta($id, 'fb-status-updater-ms-mood');
						delete_post_meta($id, 'fb-status-updater-send');
						delete_post_meta($id, 'fb-status-updater-send-fb');
						delete_post_meta($id, 'fb-status-updater-send-tw');
						delete_post_meta($id, 'fb-status-updater-send-ms');
					}
				}
			}
		}
	}


	if ($statusUpdate == false) {
		$statusUpdate = array();
		$statusUpdate["fb-post-ids"] = $fbPostIds;
		$statusUpdate["version"] = $fbStatusUpdaterVersion;
		add_option('fb-status-update', $statusUpdate);
		//echo("add ".$statusUpdate["fb-post-ids"]."<br />");
	} else {
		$statusUpdate["version"] = $fbStatusUpdaterVersion;
		$statusUpdate["fb-post-ids"] = $fbPostIds;
		// convert old params into new
		if (isSet($statusUpdate["jmp-api-login"]) && isSet($statusUpdate["jmp-api-key"]) && $statusUpdate["jmp-api-login"] != null && $statusUpdate["jmp-api-key"] != null) {
			$statusUpdate["link-shortener-login"] = $statusUpdate["jmp-api-login"];
			$statusUpdate["link-shortener-password"] = $statusUpdate["jmp-api-key"];
			$statusUpdate["link-shortener-service"] = "j.mp";
		} else {
			if (!isSet($statusUpdate["link-shortener-login"])) {
				$statusUpdate["link-shortener-service"] = "is.gd";
			}
		}
		unset($statusUpdate["jmp-api-login"], $statusUpdate["jmp-api-key"]);

		if (isSet($statusUpdate["fb-post-to-profile"])) {
			$statusUpdate["fb-push-as-profile-status"] = $statusUpdate["fb-post-to-profile"];
			unset($statusUpdate["fb-post-to-profile"]);
		}
		if (isSet($statusUpdate["fb-share-as-link"])) {
			$statusUpdate["fb-push-as-profile-link"] = $statusUpdate["fb-share-as-link"];
			unset($statusUpdate["fb-share-as-link"]);
		}

		unset($statusUpdate["fb-wall-id"], $statusUpdate["fb-wall-id-2"]);


		update_option('fb-status-update', $statusUpdate);
		//echo("update ".$statusUpdate["fb-post-ids"]."<br />");
	}
	//echo("<p>Status updater plugin activated silently ;)</p>");

	return $statusUpdate;
}
?>