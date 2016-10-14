
<?php include_once 'partials/header.php';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
//var_dump($_SESSION['isadmin']);die();
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $_SESSION['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($_SESSION['isadmin']===0){ ?>
    <li>    <a href="LockerRoom.php" alt="Your Clubs"  class="is-active">Locker Room</a> </li>
    <li>    <a href="createclub.php"  >Create a Club</a> </li>
    <?php }else{ ?>
      <li>    <a href="Dashboard.php" alt="Dashboard"class="is-active">Management</a> </li>
      <li>   <a href="Inbox.php" alt="Inbox">Inbox</a></li>
      <li>    <a href="PreviousMatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="MatchSetup.php" >Setup a Match</a></li>
      <li>    <a href="Pitch.php" alt="Pitch">Pitches</a></li>
 <?php } ?>
    <li>   <a href="Matchs.php" alt="upcoming" >Matches</a> </li>
    <li>   <a href="Stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="profile.php" alt="profile">Profile</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
  </ul>
</header>
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
      <div>Your Club</div>
  </div>
  <?php $clubs = getClubs($id);
  foreach ($clubs as $key => $value) {

  ?>
  <!-- club -->
  <div class="medium-3  float-right">
    <div class="card">
      <div class="image">
        <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
        <span class="title"><?php print_r($value[$key]['name']);?></span>
      </div>
      <div class="content">
        <p>Members: <?php print_r($value[$key]['membersCount']);?></p>
        <p>City: <?php print_r($value[$key]['country']);?></p>
        <p>Created on: <?php print_r($value[$key]['createdOn']);?></p>
      </div>
      <div class="action">
        <a href="club.php?id=<?php print_r($value[$key]['id']);?>" >View</a>
        <a data-open="DeleteClub" >Delete</a>
      </div>
    </div>
  </div>
</div>
  <?php    } ?>
<!-- popup -->
<div class="tiny reveal"  class="reveal" id="DeleteClub" data-reveal >
  <p>delete your club ? </p> <p> This means you will lose all data and players created and added </p>
  <button type="button" class="success button" >Cancel</button>
  <button type="button" class="alert button">Delete</button>
</div>
<!-- popup -->
  <!-- club -->
  <hr>
  <div class="row cardsList" >
    <div class="listHeader" style="">
        <div>Club Squad</div>
    </div>
    <?php $clubUsers = getClubsUsers($_SESSION['isadmin']);
    foreach ($clubUsers as $key => $value) {
    //var_dump($clubUsers);die();

    ?>
    <!-- users -->
    <div class="medium-3 columns end singleCard">
      <div class="card"><img src="https://graph.facebook.com/<?php print_r($value[$key]['Fuid']);?>/picture">
        <div class="content">
          <span class="title"><?php print_r($value[$key]['username']);?></span>
          <p>Position: <?php print_r($value[$key]['position']);?></p>
          <p>L:4-W:9-D:6</p>
          <p>Scored:10 - Assists:4</p>
        </div>
          <div class="action">
            <p><a href="mailto:<?php print_r($value[$key]['email']);?>"><?php print_r($value[$key]['email']);?></a><br/><a href="tel:<?php print_r($value[$key]['tel']);?>"><?php print_r($value[$key]['tel']);?></a><br/>
            <a <a data-open="DeletePlayer" >Delete Player<span class="fi-x"></span></a></p>
          </div>
      </div>
    </div>
    <!-- users -->

    <?php }?>

     <!-- popup -->
     <div class="tiny reveal"  class="reveal" id="DeletePlayer" data-reveal >
       <p>delete this player? </p> <p> Thats a shame, he must've been naughty</p>
       <button type="button" class="success button" >Cancel</button>
       <button type="button" class="alert button">Delete</button>
     </div>
     <!-- popup -->
  </div>

  <!-- content end -->
  <?php include 'partials/modal.php'; ?>
  <?php include 'partials/footer.php'; ?>
