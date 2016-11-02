
<?php include_once 'partials/header.php';
?>
<header class="header"><?php include_once 'partials/notificationbar.php'; ?>
    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
    <ul class="header-subnav">
      <?php if($_SESSION['isadmin']===0){ ?>
      <li>    <a href="lockerroom.php" alt="Your Clubs">Locker Room</a> </li>
      <li>    <a href="createclub.php"    class="is-active">Create a Club</a> </li>
      <?php }else{ ?>
        <li>    <a href="dashboard.php" alt="Dashboard"class="is-active">Management</a> </li>
        <li>    <a href="previousmatchs.php" alt="HistoryMatchs">Match History</a> </li>
        <li>    <a href="matchsetup.php" >Setup a Match</a></li>
        <li>    <a href="pitch.php" alt="Pitch">Pitches</a></li>
   <?php } ?>
      <li>   <a href="matchs.php" alt="upcoming" >Matches</a> </li>
      <li>   <a href="stats.php" alt="Stats">Stats</a> </li>
  </ul>
</header>
<div class="container">
  <!-- modal create a match content -->
  <div class="row cardsList">
    <div class="listHeader" style="">
        <div>Create your Club</div>
    </div>
    <div class="row" style="margin:10px">
      <div class="small-12 columns auth-plain whiteBackground">
          <!-- create  club-->
        <form id="myForm" method="post" action="process.php">
            <input type="hidden" name="createclub" value="createclub">
            <label>Club Name <input type="text" name="clubname" placeholder="Club Name" required></label>
            <p class="help-text" id="clubname">You need a club name, make it fierce.</p>
            <input type="hidden" name="userid" value="<?php echo $user['id']?>">
            <label>Club Rules</label>
            <textarea placeholder="Lets have some order here" required name="rules" height="240"></textarea></label>
            <p class="help-text" id="clubrules">Rules: 1. no slide tackle?, 2. don't be late</p>
            <label>Club City <input type="text" name="clubcountry" required placeholder="city"></label>
            <p class="help-text" id="clubcountry">You need a club name, make it fierce.</p>
            <input type="submit" class="nice blue radius button" value="Create your club">
        </form>
          <!-- create club-->
      </div>
    </div>
  <!-- modal create a match content -->
  </div>
</div>
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
