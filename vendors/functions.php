<?php
require_once("db.php");
error_reporting(E_ALL);

$db = new Mysqlidb('localhost', 'root', 'mo', 'firstpick');
if(!$db) die("Database error");


//create new user
function createUser($uDetails){
    $db = $GLOBALS['db'];
    $hash = password_hash($uDetails['pass'], PASSWORD_DEFAULT);
    $data = Array(
        'username' => $uDetails['uname'],
        'email' => $uDetails['email'],
        'password' => $hash,
        'createdAt' => $db->now()
    );

   $id = $db->insert('users', $data);
   return $id;
  }
//edit user
function editUser($uDetails){

    $db = $GLOBALS['db'];
    $date = date("Y-m-d H:i:s",strtotime($uDetails['DOB']));
    $data = Array(
        'nickname' => $uDetails['nickname'],
        'DOB' => $date,
        'position' =>  $uDetails['position'],
        'id' =>  $uDetails['uid'],
        'tel' =>  $uDetails['phone']
    );
   $db->where("id", $uDetails['uid']);
   if ($db->update('users', $data)){
      $msg = 'Profile updated';
    }else{
        $msg = 'update failed: ' . $db->getLastError();
      }
      return $msg;
}
//login user
function loginUser($uDetails){
  $db = $GLOBALS['db'];
  $db->where ("username", $uDetails['uname']);
  $user = $db->getOne ("users");
  $premission = Array();
  if (password_verify($uDetails['pass'], $user['password'])) {
    $premission = Array(
        'stats'     => 1,
        'username'  => $user['username'],
        'isAdmin'   => $user['admin'],
        'id'        => $user['id']
    );
  } else {
    $premission = Array( 'stats'=> 0);
  }
  return $premission;

}
//get user
function getUser($usrID){
  $db = $GLOBALS['db'];
  $db->where ("id", $usrID);
  $user = $db->getOne("users");
  return $user;
}
//get club
function getClubs($usrID){
  $db = $GLOBALS['db'];
  $db->where ("userid", $usrID);
  $clubs = $db->get('clubusers');

  $newClubID = array();
  foreach($clubs as $key => $value)
  { array_push($newClubID, $clubs[$key]['clubID']); }

  $ndb = $GLOBALS['db'];

  $UserClub = array();
  foreach($newClubID as $key => $value)
  {
    $ndb->where ("id", $value);
    $club = $db->get('Club');
    //var_dump($club);
    array_push($UserClub, $club);
  }

  return $UserClub;

}
//create club

function clubCreation($clubDetails){

  $db = $GLOBALS['db'];
  $data = Array(
      'name' => $clubDetails['name'],
      'ownerid' => $clubDetails['userid'],
      'createdon' => $db->now(),
      'country' => $clubDetails['clubcountry'],
      'rules' => $clubDetails['rules']
    );
   $id = $db->insert('club', $data);
   return $id;
}

function setAdmin($uid,$clubid){
      $db = $GLOBALS['db'];
      $db->where ("id", $uid);
      $updateuser = Array(
         'admin' => $clubid
       );
    $id = $db->update('users', $updateuser);
    return $id;
}
function AdduserToClub($uid,$clubid){


      $db = $GLOBALS['db'];
      $data = Array(
          'clubid' => $clubid,
          'userid' => $uid,
          'joinedon' => $db->now()
      );

     $id = $db->insert('clubusers', $data);

     $ndb = $GLOBALS['db'];
     $data = Array(
         'membersCount' => $db->inc(1)
     );

    $nid = $ndb->update('Club', $data);

}
//get club details
function Clubpage($clubId){
  $db = $GLOBALS['db'];
  $db->where ("id", $clubId);
  $club = $db->getOne ("club");
  return $club;
}
//save Pitch
function SavePitch($pitchDetails){
  $db = $GLOBALS['db'];
  $data = Array(
      'name' => $pitchDetails['pitchname'],
      'userid' => $pitchDetails['usrID'],
      'pitchaddress' => $pitchDetails['pitchaddress'],
      'lat' => $pitchDetails['lat'],
      'lng' => $pitchDetails['lon']
    );
   $id = $db->insert('pitch', $data);
   return $id;
//    if ($id)
//     echo 'user was created. Id=' . $id;
// else
//     echo 'insert failed: ' . $db->getLastError();

}
//[pitch list]
function GetPitchList($userID){
  $db = $GLOBALS['db'];
  $db->where ("$userID", $userID);
  $pitchs = $db->get("pitch");
  return $pitchs;


}
//Search box

function DoSearch($term){
  $db = $GLOBALS['db'];
  if($term=="all"){
    $clubs = $db->get('club');
    return $clubs;
  }else{
    $db->where('name', $term);
    $db->orWhere('country', $term);
    $clubs = $db->get("club");
    return $clubs;
  }

}

?>
