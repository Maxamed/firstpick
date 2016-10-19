
<?php include_once 'partials/header.php';
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
    <li>   <a href="Matchs.php" alt="upcoming"  class="is-active">Matches</a> </li>
    <li>   <a href="Stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="profile.php" alt="profile">Profile</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
  </ul>
</header>
<div class="row cardsList" >
  <div class="listHeader" style="">
      <div>Add Players Stats</div>
  </div>
  <?php $clubUsers = getClubsUsers($_SESSION['isadmin']);
//ar_dump($clubUsers);die();
  if($clubUsers===0){}else{
  foreach ($clubUsers as $key => $value) {

  ?>
  <!-- users -->
  <div class="medium-3 columns end singleCard">
    <div class="card">
      <div class="content">
        <span class="title"><?php print_r($value['username']);?></span>
          <form class="endmatch" method="post" action="process.php">
              <input type="hidden" name="creatematch" value="creatematch">
              <input type="hidden" name="clubID" value="<?php echo $_SESSION['isadmin'];?>">
              <input type="hidden" name="userid" value="<?php echo $_SESSION['id'];?>">
              <label>Result
              <select name="result">
                <option value="1">Loss</option>
                <option value="2">Draw</option>
                <option value="3">Win</option>
              </select></label>
              <label>Goals Scored
              <select name="goals">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select></label>
              <label>Assists
              <select name="assists">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select></label>
            </form>
      </div>
        <div class="action">
          <a>Add stats</a></p>
        </div>
    </div>
  </div>
  <!-- users -->

  <?php }}?>

</div>
<!-- content end -->
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
