
<?php include_once 'vendors/functions.php';
//login
// if (isset($_POST['login']) ) {
//   $userDetails['uname'] =  $_POST['uname'];
//   $userDetails['pass'] =  $_POST['password'];
//
//   $premission = loginUser($userDetails);
//   if($premission['stats']=== 1){
//         session_start();
//        $_SESSION['user'] = $premission['username'];
//        $_SESSION['id'] = $premission['id'];
//        $_SESSION['isAdmin'] = $premission['isAdmin'];
//        var_dump($_SESSION['isAdmin']);die();
//     if($premission['isadmin']!=0){
//         $response = "dashboard.php" ;
//     }else{
//         $response = "LockerRoom.php";
//     }
//     }else{
//         $response = "index.php" ;
//       }
//        header('Location: ' . $response);
//       die();
// }
//register_
// if (isset($_POST['register'])) {
//   $userLogin = [];
//   $userLogin['uname']   =   $_POST['uname'];
//   $userLogin['email']   =   $_POST['email'];
//   $userLogin['pass']    =   $_POST['password'];
//
//   $userID = createUser($userLogin);
//    session_start();
//     $_SESSION['id'] = $userID;
//  //var_dump($userID); var_dump($_SESSION);die();
//   header('Location: profile.php');
//
// }
//edit profile
if (isset($_POST['editprofile'])) {

  $userDetails = [];
  $userDetails['nickname']  = $_POST['nickname'];
  $userDetails['DOB']       = $_POST['DOB'];
  $userDetails['position']  = $_POST['position'];
  $userDetails['phone']     = $_POST['phone'];
  $userDetails['uid']       = $_POST['uid'];

  $msg = editUser($userDetails);

  header('Location: LockerRoom.php');


}

//create club
if (isset($_POST['createclub'])) {

  $clubDetails = [];
  $clubDetails['name'] = filter_var($_POST['clubname'], FILTER_SANITIZE_STRING);
  $clubDetails['userid'] = filter_var($_POST['userid'], FILTER_SANITIZE_STRING);
  $clubDetails['rules'] = filter_var($_POST['rules'], FILTER_SANITIZE_STRING);
  $clubDetails['clubcountry'] = filter_var($_POST['clubcountry'], FILTER_SANITIZE_STRING);

  if(is_int($Clubid=clubCreation($clubDetails)))
    {
      setAdmin($clubDetails['userid'],$Clubid);
      AdduserToClub($clubDetails['userid'],$Clubid);
      header('Location: dashboard.php');
    }else{ die();}

}


//create club
if (isset($_POST['savepitch'])) {
$pitchDetails = [];
$pitchDetails['pitchname']    = filter_var($_POST['pitchname'], FILTER_SANITIZE_STRING);
$pitchDetails['lat']          = filter_var($_POST['lat'], FILTER_SANITIZE_STRING);
$pitchDetails['lon']          = filter_var($_POST['lon'], FILTER_SANITIZE_STRING);
$pitchDetails['usrID']        = filter_var($_POST['usrID'], FILTER_SANITIZE_STRING);
$pitchDetails['pitchaddress'] = filter_var($_POST['pitchaddress'], FILTER_SANITIZE_STRING);

 $msg = SavePitch($pitchDetails);
header('Location: pitch.php');

}

//joinClub
if (isset($_POST['joinClub'])) {
$joinprocess = [];
$joinprocess['username']     = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$joinprocess['userid']     = filter_var($_POST['userid'], FILTER_SANITIZE_STRING);
$joinprocess['userposition']     = filter_var($_POST['postion'], FILTER_SANITIZE_STRING);
$joinprocess['clubID']     = filter_var($_POST['clubID'], FILTER_SANITIZE_STRING);
$joinprocess['ownerid']     = filter_var($_POST['ownerid'], FILTER_SANITIZE_STRING);

 $msg = JoinClub($joinprocess);
header('Location: LockerRoom.php');

}


//Add player
if (isset($_POST['AddPlayer'])) {
$uid    = filter_var($_POST['senderID'], FILTER_SANITIZE_STRING);
$cludid  = filter_var($_POST['clubID'], FILTER_SANITIZE_STRING);
$transferid  = filter_var($_POST['transferID'], FILTER_SANITIZE_STRING);
if(AdduserToClub($uid,$cludid)){
  CleanInbox($transferid);
  header('Location: inbox.php');
}


}



?>
