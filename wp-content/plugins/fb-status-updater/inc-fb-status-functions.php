<?php
function getMicrotime() {
	$tmp = split(" ", microtime());
	$rt = $tmp[0] + $tmp[1];
	return $rt;
}

$fbDebugLog = null;
function fbDebug($action, $page, $fbDebug) {
	global $fbDebugLog;
	if ($fbDebug) {
		if ($fbDebugLog == null) {
			$fbDebugLog = array();
		}
		$page = str_replace("\r\n", "", $page);
		$page = str_replace("\n", "", $page);
		$fbDebugLog[$action] = $page;
	}
}

function sendLogEmail($address, $message) {
	$subject = "[Status Updater] Status Update!";
	$emailBody = "Hey,\n";
	$emailBody .= $message;
	$emailBody .= "\n\nTo disable these email, just go to the plugin settings page, delete the \"Log email\" field and save.\n\nCheers!";
	wp_mail($address, $subject, $emailBody);
}

function deleteFbSessionData() {
	global $fbStatusCookieFile;
	// if the file is not writable, the function is not called so there's no need for double check also inside the function
	if ($handle = fopen($fbStatusCookieFile, 'w')) {
		if (fwrite($handle, "") === FALSE) {
			return false;
		}
	} else {
		fclose($handle);
		return false;
	}
	fclose($handle);
	return true;
}

function getPage($url, $postData = null, $username = null, $password = null, $mobile = true) {

	if (!function_exists("curl_init")) {
		return null;
	}

	global $fbStatusUpdatePath, $fbStatusCookieFile;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, false);
	if(!ini_get('safe_mode') && !ini_get("open_basedir")) {
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	}
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $fbStatusCookieFile);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $fbStatusCookieFile);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_REFERER, $url);
	if ($mobile) {
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420+ (KHTML, like Gecko) Version/3.0 Mobile/1A543a Safari/419.3"); //iphone
	} else {
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; it; rv:1.9.0.6; .NET CLR 3.0; ffco7) Gecko/2009011913 Firefox/3.0.6");
	}

	if ($postData != null) {
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		curl_setopt($ch, CURLOPT_POST, true);
	}

	if ($username != null && $password != null) {
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	}

	$response = curl_exec($ch);
	curl_close($ch);

	unset($ch);

	if ($response !== false && $response !== null) {
		return $response;
	} else {
		return null;
	}
}

// deprecated I guess.
function deletePostMeta($postId) {
	delete_post_meta($postId, 'fb-status-updater-status');
	delete_post_meta($postId, 'fb-status-updater-share-link');
	delete_post_meta($postId, 'fb-status-updater-share-image');
	delete_post_meta($postId, 'fb-status-updater-tw-status');
	delete_post_meta($postId, 'fb-status-updater-ms-status');
	delete_post_meta($postId, 'fb-status-updater-ms-mood');
	delete_post_meta($postId, 'fb-status-updater-send');
	delete_post_meta($postId, 'fb-status-updater-send-fb');
	delete_post_meta($postId, 'fb-status-updater-send-tw');
	delete_post_meta($postId, 'fb-status-updater-send-ms');
}

function shortenLink($postUrl, &$statusUpdate) {

	switch ($statusUpdate["link-shortener-service"]) {
		case "bit.ly":
			if (!isSet($statusUpdate["link-shortener-login"]) || !isSet($statusUpdate["link-shortener-password"])) {
				return null;
			}
			if ($statusUpdate["link-shortener-login"] == null || $statusUpdate["link-shortener-password"] == null) {
				return null;
			}
			if (!function_exists("json_decode")) {
				return null;
			}

			$jMpUrl = "http://api.bit.ly/shorten?version=2.0.1&longUrl=".urlencode($postUrl)."&login=".$statusUpdate["link-shortener-login"]."&apiKey=".$statusUpdate["link-shortener-password"]."&history=1";

			$jMpResponse = getPage($jMpUrl);

			if ($jMpResponse === false || $jMpResponse == null || $jMpResponse == "") {
				// something went wrong with the request
				return null;
			} else {
				$jsonResult = json_decode($jMpResponse);

				if (isSet($jsonResult->statusCode) && strToLower($jsonResult->statusCode) == "ok") {
					if (isSet($jsonResult->results) && count($jsonResult->results) > 0) {
						foreach ($jsonResult->results as $result) { // only one time..
							return $result->shortUrl;
						}
					}
				}
			}
			return null;
			break;

		case "j.mp":
			if (!isSet($statusUpdate["link-shortener-login"]) || !isSet($statusUpdate["link-shortener-password"])) {
				return null;
			}
			if ($statusUpdate["link-shortener-login"] == null || $statusUpdate["link-shortener-password"] == null) {
				return null;
			}
			if (!function_exists("json_decode")) {
				return null;
			}

			$jMpUrl = "http://api.j.mp/shorten?version=2.0.1&longUrl=".urlencode($postUrl)."&login=".$statusUpdate["link-shortener-login"]."&apiKey=".$statusUpdate["link-shortener-password"]."&history=1";

			$jMpResponse = getPage($jMpUrl);

			if ($jMpResponse === false || $jMpResponse == null || $jMpResponse == "") {
				// something went wrong with the request
				return null;
			} else {
				$jsonResult = json_decode($jMpResponse);

				if (isSet($jsonResult->statusCode) && strToLower($jsonResult->statusCode) == "ok") {
					if (isSet($jsonResult->results) && count($jsonResult->results) > 0) {
						foreach ($jsonResult->results as $result) { // only one time..
							return $result->shortUrl;
						}
					}
				}
			}
			return null;
			break;

		case "is.gd":
			$isGdApiUrl = "http://is.gd/api.php?longurl=".urlencode($postUrl);
			$shortUrl = getPage($isGdApiUrl);

			if (strpos($shortUrl, "Error: ") === false) {
				return $shortUrl;
			}
			return null;
			break;

		case "su.pr":
			if (!isSet($statusUpdate["link-shortener-login"]) || !isSet($statusUpdate["link-shortener-password"])) {
				return null;
			}
			if ($statusUpdate["link-shortener-login"] == null || $statusUpdate["link-shortener-password"] == null) {
				return null;
			}

			if (!function_exists("json_decode")) {
				$suprUrl = "http://su.pr/api/shorten?longUrl=".urlencode($postUrl)."&login=".$statusUpdate["link-shortener-login"]."&apiKey=".$statusUpdate["link-shortener-password"];

				$suprResponse = getPage($suprUrl);

				if ($suprResponse === false || $suprResponse == null || $suprResponse == "") {
					// something went wrong with the request
					return null;
				} else {
					$jsonResult = json_decode($suprResponse);
					if (isSet($jsonResult->statusCode) && strToLower($jsonResult->statusCode) == "ok") {
						if (isSet($jsonResult->results->{$postUrl}->shortUrl)) {
							return $jsonResult->results->{$postUrl}->shortUrl;
						}
					}
				}
			} else {
				$suprUrl = "http://su.pr/api/shorten?longUrl=".urlencode($postUrl)."&format=xml&login=".$statusUpdate["link-shortener-login"]."&apiKey=".$statusUpdate["link-shortener-password"];
				$suprResponse = getPage($suprUrl);

				if ($suprResponse === false || $suprResponse == null || $suprResponse == "") {
					// something went wrong with the request
					return null;
				} else {
					$xmlResult = simplexml_load_string($suprResponse);
					if (isSet($xmlResult->statusCode) && strToLower($xmlResult->statusCode) == "ok") {
						if (isSet($xmlResult->results->result->item[1]["value"])) {
							return $xmlResult->results->result->item[1]["value"];
						}
					}
				}
			}
			break;

		case "su.pr anonymous":

			if (!function_exists("json_decode")) {
				$suprUrl = "http://su.pr/api/shorten?longUrl=".urlencode($postUrl);

				$suprResponse = getPage($suprUrl);

				if ($suprResponse === false || $suprResponse == null || $suprResponse == "") {
					// something went wrong with the request
					return null;
				} else {
					$jsonResult = json_decode($suprResponse);
					if (isSet($jsonResult->statusCode) && strToLower($jsonResult->statusCode) == "ok") {
						if (isSet($jsonResult->results->{$postUrl}->shortUrl)) {
							return $jsonResult->results->{$postUrl}->shortUrl;
						}
					}
				}
			} else {
				$suprUrl = "http://su.pr/api/shorten?longUrl=".urlencode($postUrl)."&format=xml";
				$suprResponse = getPage($suprUrl);

				if ($suprResponse === false || $suprResponse == null || $suprResponse == "") {
					// something went wrong with the request
					return null;
				} else {
					$xmlResult = simplexml_load_string($suprResponse);
					if (isSet($xmlResult->statusCode) && strToLower($xmlResult->statusCode) == "ok") {
						if (isSet($xmlResult->results->result->item[1]["value"])) {
							return $xmlResult->results->result->item[1]["value"];
						}
					}
				}
			}
			break;

		case "tr.im":

			if (!isSet($statusUpdate["link-shortener-login"]) || !isSet($statusUpdate["link-shortener-password"])) {
				return null;
			}
			if ($statusUpdate["link-shortener-login"] == null || $statusUpdate["link-shortener-password"] == null) {
				return null;
			}

			$trimUrl = "http://api.tr.im/v1/trim_simple?url=".urlencode($postUrl)."&username=".$statusUpdate["link-shortener-login"]."&password=".$statusUpdate["link-shortener-password"];
			$trimResponse = getPage($trimUrl);

			if ($trimResponse === false || $trimResponse == null || $trimResponse == "") {
				// something went wrong with the request
				return null;
			} else {
				return trim($trimResponse);
			}
			return null;
			break;

		case "tr.im anonymous":

			$trimUrl = "http://api.tr.im/v1/trim_simple?url=".urlencode($postUrl);
			$trimResponse = getPage($trimUrl);

			if ($trimResponse === false || $trimResponse == null || $trimResponse == "") {
				// something went wrong with the request
				return null;
			} else {
				return trim($trimResponse);
			}
			return null;
			break;
		default:
			$isGdApiUrl = "http://is.gd/api.php?longurl=".urlencode($postUrl);
			$shortUrl = getPage($isGdApiUrl);

			if (strpos($shortUrl, "Error: ") === false) {
				return $shortUrl;
			}
			return null;
	}
	return null;
}

// return false if no errors found
function checkFbResponseError($response) {
	if ($response === null) {
		return "not-available";
	} else {
		$tmp = str_replace("failed_captcha=0", "", $response);
		if (strpos($tmp, "captcha") !== false) {
			return "captcha";
		}
		if (strpos($response, "type=\"password\"") !== false) {
			return "password";
		}
	}
	return false;
}
?>