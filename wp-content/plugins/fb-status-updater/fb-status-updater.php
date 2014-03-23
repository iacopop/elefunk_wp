<?php
/*
Plugin Name: Status Updater
Plugin URI: http://www.francesco-castaldo.com/plugins-and-widgets/fb-status-updater/
Description: If you have a company Facebook profile or pages or groups, or a company Twitter or Myspace account, this plugin is what you need to connect them with your company blog! When you publish a new wordpress article, the Status Updater plugin is able to update the Facebook status, a Fb the page wall, a Fb group wall, the Twitter status and the Myspace status with the post title and url. The "Advanced status composition" option lets you customize what to push and where for each post. Go to the <a href="/wp-admin/options-general.php?page=fb-status-updater.php">Settings</a> page to enable the plugin, sync your accounts ad fine tuning everything | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8255191" target="_blank">Donate</a>
Author: Francesco Castaldo
Version: 1.5.6
Author URI: http://www.francesco-castaldo.com/
*/

/*
Copyright 2009  Francesco Castaldo  (email : fcastaldo@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// ingnore user abort and finish whatever operation the script was performing
// so that if the cron is triggerend in the footer, even if the user changes page the post is published
ignore_user_abort(true);

$fbStatusUpdaterVersion = "1.5.6";

$fbStatusUpdatePath = __FILE__;
$fbStatusUpdatePath = substr($fbStatusUpdatePath, 0,  strrpos($fbStatusUpdatePath, DIRECTORY_SEPARATOR));
$fbStatusCookieFile = $fbStatusUpdatePath.DIRECTORY_SEPARATOR."fbSessionData.txt";

include_once('inc-fb-status-functions.php');

include_once('inc-fb-status-cron.php');

include_once('inc-fb-status-updater.php');

include_once('inc-fb-status-option.php');

include_once('inc-fb-status-activation.php');

include_once('inc-fb-add-post-meta.php');

if (isSet($_GET["checkLogin"]) && $_GET["checkLogin"] == "true") {
	include_once('inc-fb-status-check.php');
} else {
	function addFbStatusUpdaterOptionPage() {
		add_options_page('Status Updater', 'Status Updater', 9, basename(__FILE__), "fbStatusOptionPage");
	}

	add_action('admin_menu', 'addFbStatusUpdaterOptionPage');
	add_action('admin_menu', 'addFbStatusEditBox');
	add_action('wp_footer','fbStatusCron');

	// add the advanced box to the post form
	add_action('edit_post', 'fbStatusProcessMetaFields');
	add_action('save_post', 'fbStatusProcessMetaFields');
	// if the save_post action is always triggered before publishing, this might be useless
	add_action('publish_post', 'fbStatusProcessMetaFields', 0);

	// add the "send to social networks" action
	add_action("publish_post", "fbStatusUpdater", 15);

	//adds the advanced section to the edit post
	function addFbStatusEditBox() {

		global $wp_version;

		if (function_exists("add_meta_box")) {
			$tmpStatusUpdate = get_option('fb-status-update');
			if (isSet($tmpStatusUpdate["fb-advanced-status"]) && $tmpStatusUpdate["fb-advanced-status"] === true) {
				if (version_compare($wp_version, '2.7.0', '>')) {
					add_meta_box("fb_status_updater", "Status Updater", "fbStatusAddMetaFields", 'post', 'side', 'high');
				} else {
					add_meta_box("fb_status_updater", "Status Updater", "fbStatusAddMetaFields", 'post', 'normal', 'high');
				}
			}
			unset($tmpStatusUpdate);
		}
	}
}
?>