<?php
// You know how it works...
$link = mysqli_connect( "localhost", "root", "mo", "topbins" );

/*
* We need this function cause I'm lazy
**/
function mysqli_query_excute( $sql )
{
global $link;
  if ($result = mysqli_query($link, $sql)) {

    /* fetch associative array */
    while ($obj = mysqli_fetch_object($result)) {
         return $obj;
    }

    /* free result set */
  //  mysqli_free_result($result);
}

	// global $link;
  //
	// $result = mysqli_query( $link, $sql );
  // //var_dump();die();
	// if(  !$result )
	// {
	// 	die( printf( "Error: %s\n", mysqli_error( $link ) ) );
	// }
  //
	// return $result->fetch_object();
}

/*
* get the user data from database by email and password
**/
function get_user_by_email_and_password( $email, $password )
{
	return mysqli_query_excute( "SELECT * FROM users WHERE email = '$email' AND password = '$password'" );
}

/*
* get the user data from database by provider name and provider user id
**/
function get_user_by_provider_and_id( $provider_name, $provider_user_id )
{
	return mysqli_query_excute( "SELECT * FROM users WHERE hybridauth_provider_name = '$provider_name' AND hybridauth_provider_uid = '$provider_user_id'" );
}

/*
* get the user data from database by provider name and provider user id
**/
function create_new_hybridauth_user( $email, $first_name, $last_name,$photo, $provider_name, $provider_user_id )
{
  //var_dump();die();
	// let generate a random password for the user
	$password = md5( str_shuffle( "0123456789abcdefghijklmnoABCDEFGHIJ" ) );

	mysqli_query_excute(
		"INSERT INTO users
		(
			email,
			password,
			username,
      photo,
			hybridauth_provider_name,
			hybridauth_provider_uid,
			createdat
		)
		VALUES
		(
			'$email',
			'$password',
			'$first_name',
      '$photo',
			'$provider_name',
			'$provider_user_id',
			NOW()
		)"
	);
  $_SESSION["id"] = $user_exist->id;
  $_SESSION["user_connected"] = true;
  $_SESSION['email'] =  $user_exist->email;
  $_SESSION['username'] =  $user_exist->username;
}
