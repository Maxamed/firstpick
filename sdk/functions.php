<?php
require '../vendors/db.php';
$db = new Mysqlidb('10.16.16.3', 'topbi-a2d-u-078621', 'cairocairo', 'topbi-a2d-u-078621');
if(!$db) die("Database error");


function checkuser($fuid,$username,$email){
  $db = $GLOBALS['db'];
  $db->where ("fuid", $fuid);
  $user = $db->getOne("users");
  if($user === NULL){
    //new users, doesn't exist on local database
    $data = Array(
        'fuid' => $fuid,
        'username' => $username,
        'email' => $email,
        'createdAt' => $db->now()
    );
   $id = $db->insert('users', $data);
   $_SESSION['id'] = $id;
   $_SESSION['FBID'] = $fuid;
   $_SESSION['email'] =  $email;
   $_SESSION['username'] =  $username;
   //var_dump('2',$fuid,$username,$email);die();

   header("Location: ../profile.php");

  }else{

    $_SESSION['FBID'] = $fuid;
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] =  $email;
    $_SESSION['isadmin'] = $user['admin'];
    $_SESSION['username'] = $username;


    if($user['admin']===0){
        $response = "../lockerroom.php";
    }else{
        $response = "../dashboard.php" ;
    }

    header("Location: ".$response);
    exit();
  }
  //var_dump($user);die();
}

?>
