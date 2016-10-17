
<?php include_once 'partials/header.php';

     $Pitchs = GetPitchList($_SESSION['id']);
  $clubUsers = getClubsUsers($_SESSION['isadmin']);

?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($isAdmin){ ?>
      <li>    <a href="Dashboard.php" alt="Dashboard">Management</a> </li>
      <li>    <a href="PreviousMatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="MatchSetup.php" class="is-active">Setup a Match</a></li>
      <li>    <a href="Pitch.php" alt="Pitch">Pitches</a></li>
    <?php }else{ ?>
    <li>    <a href="LockerRoom.php" alt="Your Clubs"  class="is-active">Locker Room</a> </li>
    <li>    <a href="createclub.php"  >Create a Club</a> </li>
 <?php } ?>
    <li>   <a href="Matchs.php" alt="upcoming" >Matches</a> </li>
    <li>   <a href="Inbox.php" alt="Inbox">Inbox</a></li>
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

    <?php $matchs = GetGames($id);
      if($matchs===0){}else{
      foreach ($matchs as $key => $value) {
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


        <p>Kick off: <?php print_r($value['date']);?></p>
        <p>Players In: <?php print_r($value['noplayers']);?></p>
      </div>
      <div class="action">
        <a href='#'>Edit Match</a>
      </div>
    </div>
  </div>
  <!-- card end -->
  <?php }}?>
</div>
<!-- modal create a match content -->

<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
