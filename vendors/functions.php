<?php
require_once("db.php");
error_reporting(E_ALL);

$db = new Mysqlidb('localhost', 'root', 'mo', 'topbins');
if(!$db) die("Database error");


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
//is user admin
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
//make user admin
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
//add user to club
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
//[pitch detail]
function GetPitchDetails($pitchID){
  $db = $GLOBALS['db'];
  $db->where ("id", $pitchID);
  $pitchs = $db->getOne("pitch");
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
//TODO: AJAX call back to tell user he already in club
function JoinClub($membership){
  //var_dump($membership );die();
      $ndb = $GLOBALS['db'];

      $ndb->where ("userid", $membership['userid']);
      $ndb->where ("clubid", $membership['clubID']);
      $res = $ndb->getOne("clubusers","joinedOn");

      if($res){
          return false;
      }else{
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
         return true;
      }


   }
//request to play
function PlayMatch($membership){

  $ndb = $GLOBALS['db'];

  $ndb->where ("userid", $membership['userid']);
  $ndb->where ("matchid", $membership['matchid']);
  $res = $ndb->getOne("matchusers","rsvpon");

  if($res){
      return false;
  }else{

    $date = date_create($membership['kickoff'])->format('Y-m-d H:i:s');
    //var_dump($date);die();

     $db = $GLOBALS['db'];
     $data = Array(
         'sendername' => $membership['username'],
         'senderid' => $membership['userid'],
         'kickoff' => $date,
         'senderpos' => $membership['userposition'],
         'matchid' => $membership['matchid'],
         'clubID' => $membership['clubID'],
         'ownerid' => $membership['ownerid'],
         'sentdate' => $db->now()
     );

    $id = $db->insert('inboxrsvp', $data);
    return true;
  }
    //var_dump($id);die();
  }
//clean inbox
function CleanInbox($actionID,$tableID){
  $db = $GLOBALS['db'];
  $db->where('id', $actionID);
  if($db->delete("inboxjoin"))
  return true;
}
//clean inboxrsvp
function CleanRSVPInbox($uid,$matchid){
  $db = $GLOBALS['db'];
  $db->where('senderid', $uid);
  $db->where('matchid', $matchid);
  $id =$db->delete("inboxrsvp") ;
//  var_dump($id);die();
}
//get inbox messages for transfer
function getTransfers($userID){
  $db = $GLOBALS['db'];
  $db->where ("ownerid", $userID);
  $transfers = $db->get("inboxjoin");
  return $transfers;
}
//get inbox messages for rsvp
function getRSVP($userID){
  $db = $GLOBALS['db'];
  $db->where ("ownerid", $userID);
  $transfers = $db->get("inboxrsvp");
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
      'matchowner' => $matchDetails['userid'],
      'createdon' => $db->now()
  );

 $id = $db->insert('matchday', $data);
   //var_dump( $data);die();
 return $id;

}
//add user to match
function AdduserToMatch($matchid,$cludid,$uid){

      $db = $GLOBALS['db'];
      $data = Array(
          'clubid' => $cludid,
          'userid' => $uid,
          'matchid' => $matchid,
          'rsvpon' => $db->now()
      );
     $id = $db->insert('matchusers', $data);

     $ndb = $GLOBALS['db'];
     $data = Array(
         'noplayers' => $db->inc(-1)
     );

    $ndb->where ("id", $matchid);
    $nid = $ndb->update('matchday', $data);
    return true;
}
//Get active matchsetup
function GetUserGames($usr){
  $db = $GLOBALS['db'];
  $db->where("usrid", $usr);
  $db->where("status", "0");
  $id = $db->get("matchday");
  return $id;
}
//Get active matchsetup
function GetClubGames($userID,$userclub){
  $db = $GLOBALS['db'];
  $db->where('userID', $userID);
  $ids = $db->get('clubusers',null,'clubid');

  $ndb = $GLOBALS['db'];
  $MatchDetails = Array();
  foreach ($ids as $key => $value) {
      if($value['clubid'] == $userclub){

      }else{
      $ndb->where("clubid", $value['clubid']);
      $ndb->where("status", "0");
      $MatchDetails[$key] = $ndb->get("matchday");
    }
  }
  if(count($MatchDetails)===0){$array=0;}else{
  $array = call_user_func_array('array_merge', array_map('array_values', $MatchDetails));
  }
  //var_dump($array);die();
  return $array;
}
//get kick off hours remaining
function kickOff($timenow,$timegame){


  $datetime2 = new DateTime($timenow);
  $datetime1 = new DateTime($timegame);
  $interval = $datetime1->diff($datetime2);
  $ko = $interval->format('%a days  %H hours %I minutes');
  return $ko;
}

//get upcoming matchs
function GetUpcoming($userid){
  $db = $GLOBALS['db'];
  $db->where('userID', $userid);
  $ids = $db->get('matchusers',null, 'matchid');

  $ndb = $GLOBALS['db'];
  $MatchDetails = Array();
  foreach ($ids as $key => $value) {

      $ndb->where("id", $value['matchid']);
      $ndb->where("status", "0");
      $MatchDetails[$key] = $ndb->get("matchday");
  }

  if(count($MatchDetails)===0){$array=0;}else{
  $array = call_user_func_array('array_merge', array_map('array_values', $MatchDetails));
  }
  //var_dump($array);die();
  return $array;

}
//Close Match
function EndMatch($matchid){
  $db = $GLOBALS['db'];
  $data = Array (
    'status' => 1
  );

  $db->where("id", $matchid);
  $id = $db->update("matchday",$data);
  return $id;

}

?>
