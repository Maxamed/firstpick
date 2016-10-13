
<?php include_once 'partials/header.php';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$user = getUser($id);
$isAdmin = isAdmin($id);
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($isAdmin){ ?>
      <li>    <a href="Dashboard.php" alt="Dashboard"class="is-active">Management</a> </li>
      <li>    <a href="PreviousMatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="MatchSetup.php" >Setup a Match</a></li>
      <li>    <a href="Pitch.php" alt="Pitch">Pitches</a></li>
    <?php }else{ ?>
    <li>    <a href="LockerRoom.php" alt="Your Clubs"  class="is-active">Locker Room</a> </li>
    <li>    <a href="createclub.php"  >Create a Club</a> </li>
 <?php } ?>
    <li>   <a href="Matchs.php" alt="upcoming" >Matches</a> </li>
    <li>   <a href="Inbox.php" alt="Inbox">Inbox</a></li>
    <li>   <a href="Stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="profile.php" alt="profile">Profile</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
  </ul>
</header>

<!-- modal create a match content -->

  <div class="row" style="margin:20px 0">
    <div class="small-12 columns auth-plain " style="border:4px solid white;padding:20px;background: url(assets/img/bg.svg) repeat;background-color: white!important;">
      <div class="signup-panel left-solid">
        <!-- create  club-->
            <div >
              <form id="myForm" method="post" action="process.php">
              <input type="hidden" name="createclub" value="createclub">

                  <h2>Create a club</h2>
                  <label>Club Name <input type="text" name="clubname" placeholder="Club Name"></label>
                  <p class="help-text" id="clubname">You need a club name, make it fierce.</p>
                  <input type="hidden" name="userid" value="<?php echo $user['id']?>">
                  <label>Club Rules</label>
                  <textarea placeholder="Lets have some order here" name="rules" height="240"></textarea></label>
                  <p class="help-text" id="clubrules">Rules: 1. no slide tackle?, 2. don't be late</p>
                  <label>Club City <input type="text" name="clubcountry" placeholder="clubcountry"></label>
                  <p class="help-text" id="clubcountry">You need a club name, make it fierce.</p>

                  <!-- <label>Invite players
                  <input type="text" placeholder="john@gmail.com,ali@hotmail.com,Adam@gmail.com" required aria-describedby="playeremail"></label>
                  <p class="help-text" id="playeremail">please use comma between emails.</p> -->

                <input type="submit" class="nice blue radius button" value="Create your club">
                </form>
            </div><!--end 8 columns-->
        <!-- create club-->
      </div>

    </div>
  </div>
<!-- modal create a match content -->

<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
