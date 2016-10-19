
<?php include_once 'partials/header.php';

     $Pitchs = GetPitchList($_SESSION['id']);
  $clubUsers = getClubsUsers($_SESSION['isadmin']);
  $MatchDetails = GetClubGames($_SESSION['id'],$_SESSION['isadmin']);
  $dateTimeNow = date('Y-m-d H:i:s', time());
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
      <li>    <a href="MatchSetup.php" class="is-active">Setup a Match</a></li>
      <li>    <a href="Pitch.php" alt="Pitch">Pitches</a></li>
 <?php } ?>
    <li>   <a href="Matchs.php" alt="upcoming" >Matches</a> </li>
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

    <?php $matchs = GetUserGames($id);
      if($matchs===0){}else{
      foreach ($matchs as $key => $value) {
        $ClubName = Clubpage($value['clubid']);
        $pitchName = GetPitchDetails($value['pitchID']);
      //  $kickoff = kickOff($value['date'],$dateTimeNow);
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
        <p>Kick off: <?php print_r($value['date']);?> Hours</p>
        <p>Players In: <?php print_r($value['noplayers']);?></p>
      </div>
      <div class="action">
        <a href='#'>Delete Match</a>
      </div>
    </div>
  </div>
  <!-- card end -->
  <?php }}?>
</div>
<!-- modal create a match content -->

 <div class="row cardsList" style="margin-top:20px">
   <div class="listHeader column" style="">
       <div>Setup a Match</div>
   </div>
    <div class="small-12 columns auth-plain " style="border:4px solid white;padding:20px;background: url(assets/img/bg.svg) repeat;background-color: white!important;">
        <div class="signup-panel left-solid">
        <!-- create  match-->
            <div id="contactForm" class="">
              <form id="myForm" method="post" action="process.php">
                <input type="hidden" name="creatematch" value="creatematch">
                  <input type="hidden" name="clubID" value="<?php echo $_SESSION['isadmin'];?>">
                  <input type="hidden" name="userid" value="<?php echo $_SESSION['id'];?>">
                  <label>Match Date</label>
                  <input type="text" name="datetime" placeholder="22/12/2019"  id="dp10">
                  <label>Select Number of players</label>
                  <select name="noplayers">
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
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                  </select>
                  <label>Select Your Pitch</label>
                  <select name="pitch">
                    <?php  foreach ($Pitchs as $key => $value) {?>
                    <option value="<?php print_r($value['id']);?>"><?php print_r($Pitchs[$key]['name']);?></option>
                    <?php }?>
                  </select>
                  <label>Cost per person</label>
                  <input type="text" placeholder="Cost" name="cost">
                <input type="submit" class="nice blue radius button" value="Lets go">
                </form>
            </div><!--end 8 columns-->
        <!-- create match-->
      </div>
    </div>
  </div>
<!-- modal create a match content -->


<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
