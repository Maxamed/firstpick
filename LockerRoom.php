
<?php include_once 'partials/header.php';
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
    <ul class="header-subnav">
      <?php if($_SESSION['isadmin']===0){ ?>
      <li>    <a href="LockerRoom.php" alt="Your Clubs"  class="is-active">Locker Room</a> </li>
      <li>    <a href="createclub.php"  >Create a Club</a> </li>
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
<div class="container">
  <div class="row large-12" >
    <form action="results.php" method="post">
    <ul class="menu float-right">
      <li><input type="search" name="search" placeholder="Try all for every club.."></li>
      <li>
        <input type="submit" class="button" value="Search"></li>
    </ul></form>
  </div>

  <div class="row cardsList">
    <div class="listHeader" style="">
        <div>Your Clubs</div>
    </div>
    <div class="row" style="margin:10px">
      <?php $clubs = getClubs($id);
      if($clubs===0){
        ?>
        <div class="small-12 columns auth-plain whiteBackground " >
          <p>Welcome to (We need a domain name),</p>
          <p>You currently not part of any club, you can either search for a club or start your <a href="createclub.php"  >Dynasty</a>....</p>
        </div>
      <?php
      }else{
      foreach ($clubs as $key => $value) {
      ?>
      <!-- club -->
      <div class="medium-3 float-left" style="margin:0 10px;">
        <div class="card">
          <div class="image">
            <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
            <span class="title"><?php print_r($value['name']);?></span>
          </div>
          <div class="content">
            <p>Members: <?php print_r($value['membersCount']);?></p>
            <p>City: <?php print_r($value['country']);?></p>
            <p>Created on: <?php print_r($value['createdOn']);?></p>
          </div>
          <div class="action">
            <a href="club.php?id=<?php print_r($value['id']);?>" >View</a>
          </div>
        </div>
    </div>
      <?php    }} ?>
    </div>
  </div>
</div>
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
