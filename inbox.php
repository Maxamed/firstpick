
<?php include_once 'partials/header.php';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$user = getUser($id);
$isAdmin = isAdmin($id);
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($isAdmin){ ?>
      <li>    <a href="Dashboard.php" alt="Dashboard">Management</a> </li>
      <li>   <a href="Inbox.php" alt="Inbox" class="is-active">Inbox</a></li>
      <li>    <a href="PreviousMatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="MatchSetup.php" >Setup a Match</a></li>
      <li>    <a href="Pitch.php" alt="Pitch">Pitches</a></li>
    <?php }else{ ?>
    <li>    <a href="LockerRoom.php" alt="Your Clubs"  class="is-active">Locker Room</a> </li>
    <li>    <a href="createclub.php"  >Create a Club</a> </li>
 <?php } ?>
    <li>   <a href="Matchs.php" alt="upcoming" >Matches</a> </li>
    <li>   <a href="Stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="profile.php" alt="profile">Profile</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
  </ul>
</header>
<div class="row cardsList">
  <div class="listHeader" style="">
      <div>Transfer In</div>
  </div>
  <?php
      $transfers = getTransfers($id);
      //var_dump($transfers);die();
      foreach ($transfers as $key => $value) {
  ?>
  <!-- users -->
  <div class="medium-3 columns end singleCard">
    <div class="card">
      <div class="content">
        <span class="title"><?php print_r($transfers[$key]['senderName']);?></span>
        <p>Position: <?php print_r($transfers[$key]['SenderPos']);?></p>
        <p>Request date: <?php print_r($transfers[$key]['sentDate']);?></p>
      </div>
      <div class="action">
        <form class="" action="process.php" method="post">
          <input type="hidden" name="AddPlayer" value="AddPlayer">
          <input type="hidden" name="transferID" value="<?php print_r($transfers[$key]['id']);?>">
          <input type="hidden" name="senderID" value="<?php print_r($transfers[$key]['senderID']);?>">
          <input type="hidden" name="clubID" value="<?php print_r($transfers[$key]['ClubID']);?>">
          <div class="">
            <input type="submit" class="nice success  radius button" value="Accept">
            <span class="fi-check"></span>
          </div>
        </form>
        <!-- <a data-open="AcceptPlayer" >Accept<span class="fi-check"></span></a>
        <a data-open="RejectPlayer"  >Reject<span class="fi-x"></span></a> -->
      </div>
    </div>
  </div>
  <!-- users -->
  <?php } ?>
</div>

<!-- popup -->
<div class="small reveal"  class="reveal" id="AcceptPlayer" data-reveal >
  <p>John frost been added</p>
  <p>New addition to the team, your club is growing</p>
</div>
<!-- popup -->

<!-- popup -->
<div class="tiny reveal"  class="reveal" id="RejectPlayer" data-reveal >
  <p>John frost been Rejected</p>
  <p>Oh well, plenty of fish in the sea</p>
</div>
<!-- popup -->


  <!-- content end -->
  <?php include 'partials/modal.php'; ?>
  <?php include 'partials/footer.php'; ?>
