<?php
session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
//use src\TwitterOAuth;
define('CONSUMER_KEY', 'SNET3ZIGlHFG3ZKCuXdkz3rGE'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'nQihaFPfb0NcXc3pcWu3y1fhvR9zcW6ehI71eHNeLzZunAAeri'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', 'http://localhost/callback.php'); // your app callback URL
if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	//echo $url
	echo "ท่านยังไม่ได้ login<br><a href='$url'>กรูณา login</a>";
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	
	// getting basic user info
	$user = $connection->get("account/verify_credentials");
	
	// printing username on screen
	//echo $user->screen_name;
	// posting tweet on user profile
	$post = $connection->post('statuses/update', array('status' => $_GET['text']));
	// displaying response of $post object
	//print_r($post);
	header('Location: ./post_page.php');
}