<?php include_once 'partials/header.php';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$user = getUser($id);
$searchterm = $_POST["search"];
$isAdmin = isAdmin($id);
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($isAdmin){ ?>
      <li>    <a href="Dashboard.php" alt="Dashboard"class="is-active">Managment</a> </li>
      <li>    <a href="PreviousMatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="MatchSetup.php" >Setup a Match</a></li>
      <li>    <a href="Pitch.php" alt="Pitch">Pitchs</a></li>
    <?php }else{ ?>
    <li>    <a href="LockerRoom.php" alt="Your Clubs"  class="is-active">Your Clubs</a> </li>
    <li>    <a href="createclub.php"  >Create a Club</a> </li>
 <?php } ?>
    <li>   <a href="Matchs.php" alt="upcoming" >Matchs</a> </li>
    <li>   <a href="Inbox.php" alt="Inbox">Inbox</a></li>
    <li>   <a href="Stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="profile.php" alt="profile">Profile</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
  </ul>
</header>
<div class="row results">
  <div class="large-12 columns ">
      <div class="row cardsList">
        <div class="listHeader" style="">
            <div>Search Results for "<?php echo $searchterm; ?>"</div>
        </div>
        <?php
          $SRP =DoSearch($searchterm);
          foreach ($SRP as $key => $value) {
        ?>
        <!-- cards -->
        <div class="medium-3 column">
          <div class="card">
            <div class="image">
              <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
              <span class="title"><?php print_r($SRP[$key]['name']);?></span>
            </div>
            <div class="content">
                    <p>Members: <?php print_r($SRP[$key]['membersCount']);?></p>
                    <p>Played Matchs: </p>
                    <p>City: <?php print_r($SRP[$key]['country']);?></p>
                    <p>Created on: <?php print_r($SRP[$key]['createdOn']);?></p>
            </div>
            <div class="action">
              <a data-open="ClubRules" >Join</a>
            </div>
          </div>
        </div>
        <!-- popup -->
        <div class="tiny reveal"  class="reveal" id="ClubRules" data-reveal >
          <h4> <?php print_r($SRP[$key]['name']);?> Rules</h4>
          <p>Please read the rules before requesting to join the club:</p>
          <hr>
          <p><?php print_r($SRP[$key]['rules']);?></p>
          <hr>
          <button type="button" url=""class="success button" >Cancel</button>
          <form class="" action="process.php" method="post">
            <input type="hidden" name="joinClub" value="join">
            <input type="hidden" name="username" value="<?php echo $user['username'];?>">
            <input type="hidden" name="userid" value="<?php echo $user['id'];?>">
            <input type="hidden" name="postion" value="<?php echo $user['position'];?>">
            <input type="hidden" name="clubID" value="<?php print_r($SRP[$key]['id']);?>">
            <input type="hidden" name="ownerid" value="<?php print_r($SRP[$key]['ownerid']);?>">
            <input type="submit" class="nice success  radius button" value="Join">
          </form>
        </div>
        <!-- popup -->
        <!-- card end -->
        <?php
        }
        ?>
    </div>
  </div>
</div>

<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>