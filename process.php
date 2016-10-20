
<?php include_once 'vendors/functions.php';

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

  header('Location: LockerRoom.php');


}


//edit user stats
if (isset($_POST['usrdata'])) {
  $userDetails = [];
  $userDetails['userid']  = $_POST['userid'];
  $userDetails['matchid']       = $_POST['matchID'];
  $userDetails['goals']  = $_POST['goals'];
  $userDetails['result']     = $_POST['result'];
  $userDetails['assists']       = $_POST['assists'];

   $msg = editUserStats($userDetails);
   var_dump($msg);die();




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
   if(isAdmin($_POST['userid'])===0){header('Location: LockerRoom.php'); }else{header('Location: dashboard.php');}


}
//Add player to club
if (isset($_POST['AddPlayer'])) {
  $uid    = filter_var($_POST['senderID'], FILTER_SANITIZE_STRING);
  $cludid  = filter_var($_POST['clubID'], FILTER_SANITIZE_STRING);
  $transferid  = filter_var($_POST['transferID'], FILTER_SANITIZE_STRING);
  if(AdduserToClub($uid,$cludid)){
      CleanInbox($transferid);
      header('Location: inbox.php');
    }


}
//Add player to match
if (isset($_POST['MatchPlayer'])) {
  $senderid    = filter_var($_POST['senderID'], FILTER_SANITIZE_STRING);
  $cludid  = filter_var($_POST['clubid'], FILTER_SANITIZE_STRING);
  $matchid  = filter_var($_POST['matchid'], FILTER_SANITIZE_STRING);
  $rsvpon  = filter_var($_POST['sentDate'], FILTER_SANITIZE_STRING);

// AdduserToMatch($uid,$cludid,$matchid);
// header('Location: inbox.php');
// TODO: CleanInbox

if(AdduserToMatch($matchid ,$cludid,$senderid)){
    $table = "inboxrsvp";
    CleanRSVPInbox($senderid,$matchid);
    header('Location: inbox.php');
  }


}



?>
