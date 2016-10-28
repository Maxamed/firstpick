<?php
require_once("func.php");


if( isset( $_REQUEST["provider"] ) )
{
	// the selected provider
	$provider_name = $_REQUEST["provider"];

	try
	{
		// inlcude HybridAuth library
		// change the following paths if necessary
		$config   = 'hybridauth/config.php';
		require_once( "hybridauth/Hybrid/Auth.php" );

		// initialize Hybrid_Auth class with the config file
		$hybridauth = new Hybrid_Auth( $config );

		// try to authenticate with the selected provider
		$adapter = $hybridauth->authenticate( $provider_name );

		// then grab the user profile
		$user_profile = $adapter->getUserProfile();
    //var_dump($user_profile);die();
	}

	// something went wrong?
	catch( Exception $e )
	{
		header("Location: index.php");
	}

	// check if the current user already have authenticated using this provider before
	$user_exist = get_user_by_provider_and_id( $provider_name, $user_profile->identifier );
	// if the used didn't authenticate using the selected provider before
	// we create a new entry on database.users for him
	if( ! $user_exist )
	{
		create_new_hybridauth_user(
			$user_profile->email,
			$user_profile->firstName,
			$user_profile->lastName,
      $user_profile->photoURL,
			$provider_name,
			$user_profile->identifier
		);
    
	}

	// set the user as connected and redirect him
	$_SESSION["id"] = $user_exist->id;
	$_SESSION["user_connected"] = true;
  $_SESSION['email'] =  $user_exist->email;
  $_SESSION['username'] =  $user_exist->username;


      if($user_exist->admin===0){
          $response = "../LockerRoom.php";
      }else{
          $response = "../dashboard.php" ;
      }

      header("Location: ".$response);



	header("Location: ../profile.php");
}
