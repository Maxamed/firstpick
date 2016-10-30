
<?php include_once 'partials/header.php';
?>
<header class="header">
  <h1 class="headline">Welcome <small><?php echo $_SESSION['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($_SESSION['isadmin']===0){ ?>
    <li>    <a href="LockerRoom.php" alt="Your Clubs">Locker Room</a> </li>
    <li>    <a href="createclub.php"    class="is-active">Create a Club</a> </li>
    <?php }else{ ?>
      <li>    <a href="Dashboard.php" alt="Dashboard"class="is-active">Management</a> </li>
      <li>    <a href="PreviousMatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="MatchSetup.php" >Setup a Match</a></li>
      <li>    <a href="Pitch.php" alt="Pitch">Pitches</a></li>
 <?php } ?>
    <li>   <a href="Matchs.php" alt="upcoming" >Matches</a> </li>
    <li>   <a href="Stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
    <li>   <a href="profile.php"><i class="fi-torso large"></i></a></li>
    <li>   <a href="Inbox.php"><i class="fi-mail large newEmail"></i><sup><?php echo $_SESSION['msgs'];?></sup></a></li>
  </ul>
</header>
<div class="row large-12 clearfix" >
  <form action="results.php" method="post">
  <ul class="menu float-right" style="margin-top:10px;">
    <li><input type="search" name="search" placeholder="Try all for every club.."></li>
    <li>
      <input type="submit" class="button" value="Search"></li>
  </ul></form>
</div>
<div class="row cardsList">
  <div class="listHeader" style="">
      <div>Your Club</div>
  </div>
  <?php $clubs = getClubs($id);

  if($clubs===0){
    ?>


  <?php }else{
  foreach ($clubs as $key => $value) {
    if($value['ownerid'] == $_SESSION['id']){$ClubStyle="owner";}else{$ClubStyle="";}
  ?>
  <!-- club -->
  <div class="medium-3 float-left" style="margin:0 10px;">
    <div class="card <?php print_r($ClubStyle);?>">
      <div class="image">
        <img src="assets/img/club.jpg">
        <span class="title"><?php print_r($value['name']);?></span>
      </div>
      <div class="content">
        <p>Members: <?php print_r($value['membersCount']);?></p>
        <p>City: <?php print_r($value['country']);?></p>
        <p>Created on: <?php print_r($value['createdOn']);?></p>
      </div>
      <div class="action">
        <a href="club.php?id=<?php print_r($value['id']);?>" >View</a>
        <?php
          if($value['ownerid'] == $_SESSION['id']){
          ?>
        <a data-open="DeleteClub_<?php print_r($value['id']);?>" >Delete</a>
        <div class="tiny reveal"  class="reveal" id="DeleteClub<?php print_r($value['id']);?>" data-reveal >
          <p>delete your club ? </p> <p> This means you will lose all data and players created and added </p>
          <button type="button" class="success button" >Cancel</button>
          <button type="button" class="alert button">Delete</button>
        </div>
        <?php }?>
      </div>
    </div>
  </div>

  <?php    } }?>
<!-- popup -->
</div>
<!-- popup -->
  <!-- club -->
  <hr>
  <div class="row cardsList" >
    <div class="listHeader" style="">
        <div>Club Squad</div>
    </div>
    <?php
    $clubUsers = getClubsUsers($_SESSION['isadmin']);
    if($clubUsers===0){}else{
    foreach ($clubUsers as $key => $value) {
    $stats = getUserStats($value['id']);
    ?>
    <!-- users -->
    <div class="medium-3 columns end singleCard">
      <div class="card"><img src="https://graph.facebook.com/<?php print_r($value['Fuid']);?>/picture">
        <div class="content">
          <span class="title"><?php print_r($value['username']);?></span>
          <p>Position: <?php print_r($value['position']);?></p>
          <p>L:<?php print_r($stats['loss']);?> - W:<?php print_r($stats['win']);?> - D:<?php print_r($stats['draw']);?></p>
          <p>Scored:<?php print_r($stats['goals']);?> - Assists:<?php print_r($stats['assists']);?></p>
          <p>Red Cards:<?php print_r($stats['red']);?> - Yellow Cards:<?php print_r($stats['yellow']);?></p>
        </div>
          <div class="action">
            <p><a href="mailto:<?php print_r($value['email']);?>"><?php print_r($value['email']);?></a><br/><a href="tel:<?php print_r($value['tel']);?>"><?php print_r($value['tel']);?></a><br/>
            <a <a data-open="DeletePlayer" >Delete Player<span class="fi-x"></span></a></p>
          </div>
      </div>
    </div>
    <!-- users -->

    <?php }}?>

     <!-- popup -->
     <div class="tiny reveal"  class="reveal" id="DeletePlayer" data-reveal >
       <p>delete this player? </p> <p> Thats a shame, he must've been naughty</p>
       <button type="button" class="success button" >Cancel</button>
       <button type="button" class="alert button">Delete</button>
     </div>
     <!-- popup -->
 </div>
</div>

  <!-- content end -->
  <?php include 'partials/modal.php'; ?>
  <?php include 'partials/footer.php'; ?>
