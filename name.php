<?php
session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY','65Y1hoc5taBpkjDmdeuQcyLd3');
define('CONSUMER_SECRET','VTF6iJIT33nxfRcGwGclhHkXkcItK3CdsVjapwev3S0EJbmMpR');
define('OAUTH_CALLBACK','http://localhost/callback.php');
if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	echo $url;
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$user = $connection->get("account/verify_credentials");
	echo $user->screen_name;
}