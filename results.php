<?php include_once 'partials/header.php';
$searchterm = $_POST["search"];
?>
<header class="header">
  <h1 class="headline">Welcome <small><?php echo $_SESSION['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($_SESSION['isadmin']===0){ ?>
    <li>    <a href="lockerroom.php" alt="Your Clubs">Locker Room</a> </li>
    <li>    <a href="createclub.php" >Create a Club</a> </li>
    <?php }else{ ?>
      <li>    <a href="dashboard.php" alt="Dashboard" >Management</a> </li>
      <li>    <a href="previousmatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="matchsetup.php" >Setup a Match</a></li>
      <li>    <a href="pitch.php" alt="Pitch">Pitches</a></li>
 <?php } ?>
    <li>   <a href="matchs.php" alt="upcoming" >Matches</a> </li>
    <li>   <a href="stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
    <li>   <a href="profile.php" ><i class="fi-torso large"></i></a></li>
    <li>   <a href="inbox.php"  class="is-active" ><i class="fi-mail large newEmail"></i><sup><?php echo $_SESSION['msgs'];?></sup></a></li>
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
          //var_dump($SRP);die();
          foreach ($SRP as $key => $value) {
        ?>
        <!-- cards -->
        <div class="medium-3 column">
          <div class="card">
            <div class="image">
              <img src="assets/img/club.jpg">
              <span class="title"><?php print_r($SRP[$key]['name']);?></span>
            </div>
            <div class="content">
                    <p>Members: <?php print_r($SRP[$key]['membersCount']);?></p>
                    <p>Played Matchs: </p>
                    <p>City: <?php print_r($SRP[$key]['country']);?></p>
                    <p>Created on: <?php print_r($SRP[$key]['createdOn']);?></p>
            </div>
            <div class="action">
              <a data-open="ClubRules_<?php print_r($SRP[$key]['id']);?>" >Join</a>
            </div>
          </div>
        </div>
        <!-- popup -->
        <div class="tiny reveal"  class="reveal" id="ClubRules_<?php print_r($SRP[$key]['id']);?>" data-reveal >
          <h4> <?php print_r($SRP[$key]['name']);?> Rules</h4>
          <p>Please read the rules before requesting to join the club:</p>
          <hr>
          <p><?php print_r($SRP[$key]['rules']);?></p>
          <hr>
          <form class="" action="process.php" method="post">
            <input type="hidden" name="joinClub" value="join">
            <input type="hidden" name="username" value="<?php echo $user['username'];?>">
            <input type="hidden" name="userid" value="<?php echo $user['id'];?>">
            <input type="hidden" name="postion" value="<?php echo $user['position'];?>">
            <input type="hidden" name="clubID" value="<?php print_r($SRP[$key]['id']);?>">
            <input type="hidden" name="ownerid" value="<?php print_r($SRP[$key]['ownerid']);?>">
            <input type="submit" class="nice success  radius button" value="Join">
          </form> <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
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
