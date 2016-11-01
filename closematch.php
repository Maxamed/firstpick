
<?php
include_once 'partials/header.php';
include_once 'partials/secure.php';
  $matchid = $_GET['matchid'];
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $_SESSION['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($_SESSION['isadmin']===0){ ?>
    <li>    <a href="lockerroom.php" alt="Your Clubs" >Locker Room</a> </li>
    <li>    <a href="createclub.php"  >Create a Club</a> </li>
    <?php }else{ ?>
      <li>    <a href="dashboard.php" alt="Dashboard">Management</a> </li>
      <li>   <a href="inbox.php" alt="Inbox">Inbox</a></li>
      <li>    <a href="previousmatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="matchsetup.php"  class="is-active">Setup a Match</a></li>
      <li>    <a href="pitch.php" alt="Pitch">Pitches</a></li>
 <?php } ?>
    <li>   <a href="matchs.php" alt="upcoming">Matches</a> </li>
    <li>   <a href="stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="profile.php" alt="profile">Profile</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
  </ul>
</header>

  <div class="row cardsList" style="margin-top:20px">
    <div class="listHeader column" style="">
        <div>Close this Match</div>
    </div>
    <div class="small-12 columns auth-plain " style="border:4px solid white;padding:20px;background: url(assets/img/bg.svg) repeat;background-color: white!important;">

      <form class="endmatch">
        <p>Once you add all users stats, feel free to end Match below.</p>
        <p>Please note once you end match you will not be able to add user stats.</p>
        <input type="hidden" name="endmatch" value="endmatch">
        <input type="hidden" name="matchID" value="<?php echo $matchid;?>">
        <input type="submit" class="nice blue radius button" value="End Match">
      </form>
    </div>
  </div>

<div class="row cardsList" >
  <div class="listHeader" style="">
      <div>Add Players Stats</div>
  </div>
  <?php $MatchUsers = getMatchUsers($matchid);
//var_dump($MatchUsers);
  if($MatchUsers===0){}else{
  foreach ($MatchUsers as $key => $value) {

  ?>
  <!-- users -->
  <div class="medium-3 columns end singleCard">
    <div class="card">
      <div class="content">
        <span class="title"><?php print_r($value['username']);?></span>
          <form class="usrdata endmatch">
              <input type="hidden" name="usrdata" value="usrdata">
              <input type="hidden" name="userid" value="<?php print_r($value['id']);?>">
              <input type="hidden" name="matchID" value="<?php echo $matchid;?>">
              <input type="radio" name="result" value="win" checked><label for="win">win</label>
              <input type="radio" name="result" value="loss"><label for="loss">loss</label>
              <input type="radio" name="result" value="draw"><label for="draw">draw</label>

              <label>Red Cards
              <select name="rcards">
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
              <label>Yellow Cards
              <select name="ycards">
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
      </div>
      <div class="action">
        <input type="submit" class="nice blue radius button" value="Add Stats">
      </div>
        </form>
    </div>
  </div>
  <!-- users -->
  <?php }}?>
</div>
<!-- content end -->
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
