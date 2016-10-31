<?php
session_start();
date_default_timezone_set('Asia/Dubai');
require_once 'Facebook/autoload.php';
require 'functions.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

$fb = new Facebook\Facebook([
  'app_id' => '537836766412726', // Replace {app-id} with your app id
  'app_secret' => '6f528be8aa1e5b38a1ff1d0cfdd0daa5',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

//$user = $response->getGraphUser();

$graphObject = $response->getGraphObject();
$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
$fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
$femail = $graphObject->getProperty('email');    // To Get Facebook email ID
//var_dump($fbid,$fbfullname,$femail);
/* ---- Session Variables -----*/
checkuser($fbid,$fbfullname,$femail);

//echo 'Name: ' . $user->getName();

// $_SESSION['fb_access_token'] = (string) $accessToken;


 ?>
