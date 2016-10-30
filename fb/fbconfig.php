<?php
session_start();
// added in v4.0.0
require 'functions.php';
require_once 'autoload.php';
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
// init app with app id and secret
FacebookSession::setDefaultApplication( '537836766412726','6f528be8aa1e5b38a1ff1d0cfdd0daa5' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://futballteam.com/fb/fbconfig.php' );


    var_dump($helper);die();

try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me?fields=name,email');
  $response = $request->execute();
  // get response
      $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
      //var_dump('1',$fbid,$fbfullname,$femail);
	/* ---- Session Variables -----*/
      checkuser($fbid,$fbfullname,$femail);
    /* ---- header location after session ----*/

} else {
//var_dump('wtf');die();
  $loginUrl = $helper->getLoginUrl(array('scope' => 'email'));
 header("Location: ".$loginUrl);
}
?>
