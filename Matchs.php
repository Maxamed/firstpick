
<?php include_once 'partials/header.php';

     $MatchDetails = GetClubGames($_SESSION['id']);
     $dateTimeNow = date('Y-m-d H:i:s', time());
     //var_dump($dateTimeNow);
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $_SESSION['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($_SESSION['isadmin']===0){ ?>
    <li>    <a href="LockerRoom.php" alt="Your Clubs" >Locker Room</a> </li>
    <li>    <a href="createclub.php"  >Create a Club</a> </li>
    <?php }else{ ?>
      <li>    <a href="Dashboard.php" alt="Dashboard">Management</a> </li>
      <li>   <a href="Inbox.php" alt="Inbox">Inbox</a></li>
      <li>    <a href="PreviousMatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="MatchSetup.php" >Setup a Match</a></li>
      <li>    <a href="Pitch.php" alt="Pitch">Pitches</a></li>
 <?php } ?>
    <li>   <a href="Matchs.php" alt="upcoming"class="is-active" >Matches</a> </li>
    <li>   <a href="Stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="profile.php" alt="profile">Profile</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
  </ul>
</header>

<!-- current matchs -->
<div class="row cardsList">
  <div class="listHeader column" style="">
      <div>Your Matchs</div>
  </div>

    <?php
      if($MatchDetails===0){}else{
      foreach ($MatchDetails as $key => $value) {
        $kickoff = kickOff($value['date'],$dateTimeNow);
        $ClubName = Clubpage($value['clubid']);
        $pitchName = GetPitchDetails($value['pitchID']);
    ?>
  <!-- cards -->
  <div class="medium-3 column"  >
    <div class="card">
      <div class="image">
        <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
        <span class="title"></span>
      </div>
      <div class="content">
        <p><?php print_r($ClubName['name']);?></p>
        <p>Venue: <a target="_blank" href="https://www.google.com/maps/place/<?php print_r($pitchName['lat']);?>,<?php print_r($pitchName['lng']);?>"><?php print_r($pitchName['name']);?></a></p>
        <p>Kick off: <?php print_r($kickoff); ?> Hours</p>
        <p>Players In: <?php print_r($value['noplayers']);?></p>
      </div>
      <div class="action">
        <form class="" action="process.php" method="post">
          <input type="hidden" name="RSVPMatch" value="RSVPMatch">
          <input type="hidden" name="username" value="<?php echo $user['username'];?>">
          <input type="hidden" name="kickoff" value="<?php echo $value['date'];?>">
          <input type="hidden" name="matchid" value="<?php echo $value['id'];?>">
          <input type="hidden" name="userid" value="<?php echo $user['id'];?>">
          <input type="hidden" name="postion" value="<?php echo $user['position'];?>">
          <input type="hidden" name="clubID" value="<?php print_r($value['clubid']);?>">
          <input type="hidden" name="ownerid" value="<?php print_r($ClubName['ownerid']);?>">
          <input type="submit" class="nice success  radius button" value="RSVP Match">
        </form>
      </div>
    </div>
  </div>
  <!-- card end -->
  <?php }}?>
</div>

<!-- modal create a match content -->

<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
