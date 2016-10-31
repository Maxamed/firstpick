
<?php include_once 'partials/header.php';
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
    <ul class="header-subnav">
      <?php if($_SESSION['isadmin']===0){ ?>
      <li>    <a href="lockerroom.php" alt="Your Clubs">Locker Room</a> </li>
      <li>    <a href="createclub.php" >Create a Club</a> </li>
      <?php }else{ ?>
        <li>    <a href="dashboard.php" alt="Dashboard">Management</a> </li>
        <li>    <a href="previousmatchs.php" alt="HistoryMatchs">Match History</a> </li>
        <li>    <a href="matchsetup.php" >Setup a Match</a></li>
        <li>    <a href="pitch.php" alt="Pitch">Pitches</a></li>
   <?php } ?>
      <li>   <a href="matchs.php" alt="upcoming" >Matches</a> </li>
      <li>   <a href="stats.php"  class="is-active" alt="Stats">Stats</a> </li>
      <li>   <a href="logout.php" alt="logout">logout</a> </li>
      <li>   <a href="profile.php"><i class="fi-torso large"></i></a></li>
      <li>   <a href="inbox.php"><i class="fi-mail large newEmail"></i><sup><?php echo $_SESSION['msgs'];?></sup></a></li>
    </ul>
</header>
<div class="container">

</div>
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
