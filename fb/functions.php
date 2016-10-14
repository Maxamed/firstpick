<?php
require '../vendors/db.php';
$db = new Mysqlidb('localhost', 'root', 'mo', 'topbins');
if(!$db) die("Database error");


function checkuser($fuid,$username,$email){

  $db = $GLOBALS['db'];
  $db->where ("fuid", $fuid);
  $user = $db->getOne("users");
  if($user === NULL){
    $data = Array(
        'fuid' => $fuid,
        'username' => $username,
        'email' => $email,
        'createdAt' => $db->now()
    );
   $id = $db->insert('users', $data);

 	    $_SESSION['id'] = $id;
   header("Location: ../profile.php");
  }else{

    $db = $GLOBALS['db'];
    $db->where ("fuid", $fuid);
    $user = $db->getOne("users");


    $_SESSION['FBID'] = $fuid;
    $_SESSION['id'] = $user['id'];
    $_SESSION['isadmin'] = $user['isadmin'];
    $_SESSION['FULLNAME'] = $fbfullname;
    $_SESSION['EMAIL'] =  $femail;

    if($user['isAdmin']!=0){
        $response = "../dashboard.php" ;
    }else{
        $response = "../LockerRoom.php";
    }

    header("Location: ".$response);
  }
  //var_dump($user);die();
}

?>
