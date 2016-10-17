<?php
require_once("db.php");
//error_reporting(E_ALL);

$db = new Mysqlidb('localhost', 'root', 'mo', 'topbins');
if(!$db) die("Database error");


//create new user
// function createUser($uDetails){
//     $db = $GLOBALS['db'];
//     $hash = password_hash($uDetails['pass'], PASSWORD_DEFAULT);
//     $data = Array(
//         'username' => $uDetails['uname'],
//         'email' => $uDetails['email'],
//         'password' => $hash,
//         'createdAt' => $db->now()
//     );
//
//    $id = $db->insert('users', $data);
//    return $id;
//   }
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
//login user -- old don't waste time
// function loginUser($uDetails){
//   $db = $GLOBALS['db'];
//   $db->where ("username", $uDetails['uname']);
//   $user = $db->getOne ("users");
//   var_dump($user['admin']);die();
//   $premission = Array();
//   if (password_verify($uDetails['pass'], $user['password'])) {
//     $premission = Array(
//         'stats'     => 1,
//         'username'  => $user['username'],
//         'isAdmin'   => $user['admin'],
//         'id'        => $user['id']
//     );
//   } else {
//     $premission = Array( 'stats'=> 0);
//   }
//   return $premission;
//
// }
//get user
function getUser($usrID){
  $db = $GLOBALS['db'];
  $db->where ("id", $usrID);
  $user = $db->getOne("users");
  return $user;
}

//get clubs users are in
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
  if(count($UserClub)===0){$array=0;}else{
  $array = call_user_func_array('array_merge', array_map('array_values', $UserClub));
}
  return $array;

}
//get all users in a club
function getClubsUsers($clubID){

  $db = $GLOBALS['db'];
  $db->where('clubID', $clubID);
  $ids = $db->get('clubusers',null,'userID');

    //var_dump($ids);die();
  $ndb = $GLOBALS['db'];
$UserDetails = Array();


  foreach ($ids as $key => $value) {

      $ndb->where("id", $value['userID']);
      $UserDetails[$key] = $ndb->get("users");
      //var_dump($UserDetails[$key]);
  }
  //var_dump($UserDetails);

  if(count($UserDetails)===0){$array=0;}else{
  $array = call_user_func_array('array_merge', array_map('array_values', $UserDetails));
}
  return $array;



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
function isAdmin($uid){
  $db = $GLOBALS['db'];
  $db->where ("id", $uid);
  $user = $db->getOne("users");
   if($user['admin'] === 0) {
     $val = 0;
   }else{
     $val = $user['admin'];
   }
   return $val;

}
function setAdmin($uid,$clubid){
      $db = $GLOBALS['db'];
      $db->where ("id", $uid);
      $updateuser = Array(
         'admin' => $clubid
       );
    $id = $db->update('users', $updateuser);
    $_SESSION['isadmin'] = $clubid;
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
    return true;
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
  $db->where ("userID", $userID);
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

//club inviteDetails
function ClubInvites($inviteDetails){

  $length = 20;
  $inviteCode ='';
  $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
  for ($p = 0; $p < $length; $p++) {
  	$inviteCode .= $characters[mt_rand(0, strlen($characters))];
  }

  $db = $GLOBALS['db'];
  $data = Array(
      'NewUser' => $inviteDetails['name'],
      'email' => $inviteDetails['email'],
      'clubowner' => $inviteDetails['ownderid'],
      'clubID' => $inviteDetails['clubid'],
      'invite' => $inviteCode,
      'invitedate' => $db->now()
  );

 $id = $db->insert('clubinvites', $data);

return $inviteCode;

}

//getinvite lcfirst

function GetInviteList($userID){
  $db = $GLOBALS['db'];
  $db->where ("clubowner", $userID);
  $invites = $db->get("clubinvites");
  return $invites;
}

//process invites
function ProcessInvite($inviteCode,$userDetails){


  $db = $GLOBALS['db'];
  $db->where ("invite", $inviteCode);
  $db->where ("accepted", "0");
  $transfers = $db->get("clubInvites");
    $data = Array(
        'sendername' => $userDetails['nickname'],
        'senderid' => $userDetails['uid'],
        'senderpos' => $userDetails['position'],
        'clubID' => $transfers[0]['clubID'],
        'ownerid' => $transfers[0]['ClubOwner'],
        'sentdate' => $db->now()
    );
  $id = $db->insert('inboxjoin', $data);
  $data2 = Array(
      'accepted' => 1
  );
  $db->where ("id", $transfers[0]['id']);
  $id1 = $db->update('clubInvites', $data2);
}

//request to join
function JoinClub($membership){
//var_dump($membership );die();
      $db = $GLOBALS['db'];
      $data = Array(
          'sendername' => $membership['username'],
          'senderid' => $membership['userid'],
          'senderpos' => $membership['userposition'],
          'clubID' => $membership['clubID'],
          'ownerid' => $membership['ownerid'],
          'sentdate' => $db->now()
      );

     $id = $db->insert('inboxjoin', $data);
   }
//clean inbox
function CleanInbox($transferID){
  $db = $GLOBALS['db'];
  $db->where('id', $transferID);
  if($db->delete('inboxjoin'))
  return true;
}
//get inbox messages for transfer
function getTransfers($userID){
  $db = $GLOBALS['db'];
  $db->where ("ownerid", $userID);
  $transfers = $db->get("inboxjoin");
  return $transfers;
}

//create match
function CreateMatch($matchDetails){
  $db = $GLOBALS['db'];
  $date = DateTime::createFromFormat('m-d-Y H:i',$matchDetails['datetime']);
  $from_date = $date->format("Y-m-d H:i");
  $data = Array(
      'clubid' => $matchDetails['clubid'],
      'date' => $from_date,
      'noplayers' => $matchDetails['noplayers'] - 1,
      'cost' => $matchDetails['cost'],
      'pitchid' => $matchDetails['pitch'],
      'usrid' => $matchDetails['userid'],
      'createdon' => $db->now()
  );

 $id = $db->insert('matchday', $data);
   //var_dump( $data);die();
 return $id;

}
//add user to match
function AdduserToMatch($matchid,$matchClubid, $matchUserid){

      $db = $GLOBALS['db'];
      $data = Array(
          'clubid' => $matchClubid,
          'userid' => $matchUserid,
          'matchid' => $matchid,
          'rsvpon' => $db->now()
      );
     $id = $db->insert('matchusers', $data);
    //var_dump( $data);die();

    //  $ndb = $GLOBALS['db'];
    //  $data = Array(
    //      'membersCount' => $db->inc(1)
    //  );
    //
    // $nid = $ndb->update('Club', $data);
    return true;
}
//Get active matchsetup
function GetMatchs($clubID){

  $db = $GLOBALS['db'];
  $db->where ("clubid", $clubID);
  $matchs = $db->get("matchday");
  var_dump( $matchs);die();
  return $matchs;

}
?>
