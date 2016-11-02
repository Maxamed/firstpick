
<?php include_once 'partials/header.php';
     $dateTimeNow = date('Y-m-d H:i:s', time());
     error_reporting(E_ALL);
?>
<header class="header"><?php include_once 'partials/notificationbar.php'; ?>
    <h1 class="headline">Welcome <small><?php echo $_SESSION['username'];?></small></h1>
    <ul class="header-subnav">
      <?php if($_SESSION['isadmin']===0){ ?>
      <li>    <a href="lockerroom.php" alt="Your Clubs">Locker Room</a> </li>
      <li>    <a href="createclub.php" >Create a Club</a> </li>
      <?php }else{ ?>
        <li>    <a href="dashboard.php" alt="Dashboard">Management</a> </li>
        <li>    <a href="previousmatchs.php" alt="HistoryMatchs">Match History</a> </li>
        <li>    <a href="matchsetup.php" >Setup a Match</a></li>
        <li>    <a href="pitch.php" alt="Pitch">Pitches</a></li>
   <?php } ?>
      <li>   <a href="matchs.php"    class="is-active" alt="upcoming" >Matches</a> </li>
      <li>   <a href="stats.php" alt="Stats">Stats</a> </li>
  </ul>
</header>
<div class="container">
  <!-- available matchs thats not yours-->
  <div class="row cardsList">
    <div class="listHeader column" style="">
        <div>Confirmed Matchs</div>
    </div>
      <?php
        $confirmed = GetUpcoming($id);

        if($confirmed===0){
          ?>
          <div class="small-12 columns auth-plain whiteBackground ">
            <p>Once you RSVP for a match and get accepted by Club Captain the match will appear here</p>
          </div>
        <?php }else{
        foreach ($confirmed as $key => $value) {
          $ClubName = Clubpage($value['clubid']);
          $pitchName = GetPitchDetails($value['pitchID']);
        ?>
      <!-- cards -->
      <div class="medium-3 column"  >
        <div class="card">
          <div class="image">
            <img src="assets/img/club.jpg">
            <span class="title"><?php print_r($ClubName['name']);?></span>
          </div>
          <div class="content">
            <p>Venue: <a target="_blank" href="https://www.google.com/maps/place/<?php print_r($pitchName['lat']);?>,<?php print_r($pitchName['lng']);?>"><?php print_r($pitchName['name']);?></a></p>
            <p>Kick off: <span class="ko"> <?php print_r($value['date']); ?></span></p>
            <p>Players In: <?php print_r($value['noplayers']);?> - <a data-open="players_<?php echo $value['id'];?>" >view Players</a></p>
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
              <input type="submit" class="nice success  radius button" value="Drop out Match">
            </form>
          </div>
        </div>
      </div>
      <!-- card end -->

      <!-- popup -->
      <div class="large reveal"  class="reveal" id="players_<?php echo $value['id'];?>" data-reveal >
        <h4> Players</h4>
        <?php
            $MatchUsers = getMatchUsers($value['id']);
              foreach ($MatchUsers as $key => $value) {
        ?>
        <!-- users -->
        <div class="medium-3 columns end singleCard">
          <div class="card"><img src="https://graph.facebook.com/<?php print_r($value['Fuid']);?>/picture">
            <div class="content">
              <span class="title"><?php print_r($value['username']);?></span>
              <p>Position: <?php print_r($value['position']);?></p>
            </div>
          </div>
        </div>
        <!-- users -->

        <?php  } ?>
      </div>
      <!-- popup -->
      <?php  }} ?>
  </div>
  <!-- end available matchs -->

  <!-- current clubs matchs -->
  <div class="row cardsList">
    <div class="listHeader column" style="">
        <div>Available Matchs</div>
    </div>

      <?php

        $MatchDetails = GetClubGames($_SESSION['id'],$_SESSION['isadmin']);
        if($MatchDetails===0){  ?>
          <div class="small-12 columns auth-plain whiteBackground ">
            <p>You currently not part of a club, once you join a club - any matches organised by that club will appear here</p>
          </div>
        <?php }else{
        foreach ($MatchDetails as $key => $value) {
          //$kickoff = kickOff($value['date'],$dateTimeNow);
          $ClubName = Clubpage($value['clubid']);
          $pitchName = GetPitchDetails($value['pitchID']);
      ?>
    <!-- cards -->
    <div class="medium-3 column"  >
      <div class="card">
        <div class="image">
          <img src="assets/img/club.jpg">
          <span class="title"></span>
        </div>
        <div class="content">
          <p><?php print_r($ClubName['name']);?></p>
          <p>Venue: <a target="_blank" href="https://www.google.com/maps/place/<?php print_r($pitchName['lat']);?>,<?php print_r($pitchName['lng']);?>"><?php print_r($pitchName['name']);?></a></p>
          <p>Kick off: <?php print_r($value['date']); ?> </p>
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

</div>
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
<script src='assets/js/vendor/moment.min.js'></script>
<script>
var d = moment($('.ko').text());
var $tim = moment(d).fromNow();
$('.ko' ).empty().append($tim);
console.log($tim);
</script>
