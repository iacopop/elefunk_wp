<?php
function fbStatusCron($post_ID) {

	$statusUpdate = get_option('fb-status-update');

	if (isSet($statusUpdate["last-cron"])) {
		// check if last cron has run at least half an hour before
		if ((time() - $statusUpdate["last-cron"]) < (60*$statusUpdate["cron-time"])) {
			// last chron has run before 30 minutes ago, do nothing
			return;
			// A little note about this: I know that if all previous articles have been sent, without this check a new scheduled article
			// would be sent just after its due time but I just don't want the whole function to weight on every single user on every page
			// he browses. This way, it's just one user on one page every 30 minutes who engages the update process
		}
	}

	$querystring = "numberposts=1&order=DESC&orderby=date&post_status=publish&post_type=post";

	if (isSet($statusUpdate["fb-post-ids"])) {
		$fbPostIds = str_replace("#", ",", $statusUpdate["fb-post-ids"]);
		$fbPostIds = trim(substr($fbPostIds, 1, strlen($fbPostIds) - 2));
		$querystring .= "&exclude=".$fbPostIds;
	}

	$myposts = get_posts($querystring);

	foreach($myposts as $post) {

		if (!isSet($post->ID) || $post->ID == null || $post->ID == false || $post->ID == "") {
			setup_postdata($post); // shouldn't be necessary but docs say yes
		}
		fbStatusUpdater($post->ID, true);
	}

	// get the updated version because the fbStatusUpdater function added a new id to the list of already published
	// the variable retrieved at the beginning of this function does not contain it and by storing the new
	// cron time on that, the new id would be lost
	$statusUpdate = get_option('fb-status-update');
	$statusUpdate["last-cron"] = time();
	update_option('fb-status-update', $statusUpdate);
}
?>