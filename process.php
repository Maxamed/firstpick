
<?php
 error_reporting(E_ALL); ini_set('display_errors', 'On');
include_once 'vendors/functions.php';

//edit profile
if (isset($_POST['editprofile'])) {

  $userDetails = [];
  $userDetails['nickname']  = $_POST['nickname'];
  $userDetails['DOB']       = $_POST['DOB'];
  $userDetails['position']  = $_POST['position'];
  $userDetails['phone']     = $_POST['phone'];
  $userDetails['uid']       = $_POST['uid'];

    $msg = editUser($userDetails);
    if(isset($_POST['invitecode']) ){
      $msg = ProcessInvite($_POST['invitecode'],$userDetails);
    }

  header('Location: lockerroom.php');
  exit();

}


//edit user stats
if (isset($_POST['usrdata'])) {
  $userDetails = [];
  $userDetails['userid']  = $_POST['userid'];
  $userDetails['matchid']       = $_POST['matchID'];
  $userDetails['goals']  = $_POST['goals'];
  $userDetails['result']     = $_POST['result'];
  $userDetails['assists']       = $_POST['assists'];
  $userDetails['rcards']     = $_POST['rcards'];
  $userDetails['ycards']       = $_POST['ycards'];

  $msg = editUserStats($userDetails);
  //  var_dump($userDetails);die();

}

//create club
if (isset($_POST['createclub'])) {
  //var_dump($_POST);die();
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
      exit();
    }else{ die();}

}
//create match
if (isset($_POST['creatematch'])) {

  $matchDetails = [];
  $matchDetails['clubid'] = filter_var($_POST['clubID'], FILTER_SANITIZE_STRING);
  $matchDetails['datetime'] = filter_var($_POST['datetime'], FILTER_SANITIZE_STRING);
  $matchDetails['noplayers'] = filter_var($_POST['noplayers'], FILTER_SANITIZE_STRING);
  $matchDetails['cost'] = filter_var($_POST['cost'], FILTER_SANITIZE_STRING);
  $matchDetails['pitch'] = filter_var($_POST['pitch'], FILTER_SANITIZE_STRING);
  $matchDetails['userid'] = filter_var($_POST['userid'], FILTER_SANITIZE_STRING);

   //var_dump($matchDetails);die();
  $matchid = CreateMatch($matchDetails);
  AdduserToMatch($matchid,$matchDetails['clubid'], $matchDetails['userid']);
  header('Location: matchsetup.php');
  exit();
  //var_dump($matchDetails);die();
}


//submit teams
if (isset($_POST['submitTeams'])) {
   if ($_POST['team'] == 1 ){ $team    = 1; }else{ $team    = 2; }
   $matchid = $_POST['matchid'];
   if(isset($_POST['userids']) && is_array($_POST['userids'])){
      $ids = [];
      foreach($_POST["userids"] as $key => $value){
         $ids[$key] = $value;
       }
   }
   submitTeams($team,$matchid,$ids);
   header('Location: teams.php?matchid='.$matchid);
   exit();
}

//delete match
if (isset($_POST['deletematch'])) {

  $matchID = filter_var($_POST['matchid'], FILTER_SANITIZE_STRING);

   //var_dump($matchDetails);die();
  $v = CancelMatch($matchID);

  header('Location: matchsetup.php');
  exit();
  //var_dump($matchDetails);die();
}
//END match
if (isset($_POST['endmatch'])) {

  $matchID = filter_var($_POST['matchid'], FILTER_SANITIZE_STRING);

   //var_dump($matchDetails);die();
  $v = EndMatch($matchID);

  header('Location: matchsetup.php');
  exit();
  //var_dump($matchDetails);die();
}

//Generate invite code
if (isset($_POST['inviteForm'])) {

  $inviteDetails = [];
  $inviteDetails['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $inviteDetails['clubid'] = filter_var($_POST['clubid'], FILTER_SANITIZE_STRING);
  $inviteDetails['ownderid'] = filter_var($_POST['ownderid'], FILTER_SANITIZE_STRING);
  $inviteDetails['email'] = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

  $inviteInfo = ClubInvites($inviteDetails);
  header('Location: dashboard.php');
  exit();

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
  exit();
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
  header('Location: lockerroom.php');
  exit();
}

//RSVPMatch
if (isset($_POST['RSVPMatch'])) {
  $rsvpprocess = [];
  $rsvpprocess['username']     = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $rsvpprocess['matchid']     = filter_var($_POST['matchid'], FILTER_SANITIZE_STRING);
  $rsvpprocess['userid']     = filter_var($_POST['userid'], FILTER_SANITIZE_STRING);
  $rsvpprocess['userposition']     = filter_var($_POST['postion'], FILTER_SANITIZE_STRING);
  $rsvpprocess['clubID']     = filter_var($_POST['clubID'], FILTER_SANITIZE_STRING);
  $rsvpprocess['ownerid']     = filter_var($_POST['ownerid'], FILTER_SANITIZE_STRING);
  $rsvpprocess['kickoff']     = filter_var($_POST['kickoff'], FILTER_SANITIZE_STRING);

   $msg = PlayMatch($rsvpprocess);
   if(isAdmin($_POST['userid'])===0){header('Location: lockerroom.php');exit(); }else{header('Location: dashboard.php');exit();}


}
//Add player to club
if (isset($_POST['AddPlayer'])) {
  $uid    = filter_var($_POST['senderID'], FILTER_SANITIZE_STRING);
  $cludid  = filter_var($_POST['clubID'], FILTER_SANITIZE_STRING);
  $transferid  = filter_var($_POST['transferID'], FILTER_SANITIZE_STRING);
  if(AdduserToClub($uid,$cludid)){
      CleanInbox($transferid,"inboxjoin");
      header('Location: inbox.php');exit();
    }
}
//clean inbox
if (isset($_POST['cleaninbox'])) {
  $notficationid    = filter_var($_POST['notficationid'], FILTER_SANITIZE_STRING);
  $userid  = filter_var($_POST['userid'], FILTER_SANITIZE_STRING);
  $tablename  = filter_var($_POST['tablename'], FILTER_SANITIZE_STRING);
  CleanInbox($notficationid,$tablename);
  header('Location: inbox.php');exit();

}
//Add player to match
if (isset($_POST['MatchPlayer'])) {
  $senderid    = filter_var($_POST['senderID'], FILTER_SANITIZE_STRING);
  $cludid  = filter_var($_POST['clubid'], FILTER_SANITIZE_STRING);
  $matchid  = filter_var($_POST['matchid'], FILTER_SANITIZE_STRING);
  $rsvpon  = filter_var($_POST['sentDate'], FILTER_SANITIZE_STRING);


if(AdduserToMatch($matchid ,$cludid,$senderid)){
    ConfirmPlaying($matchid,$senderid);
    CleanRSVPInbox($senderid,$matchid);
    header('Location: inbox.php');exit();
  }


}
?>
