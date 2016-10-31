
<?php include_once 'partials/header.php';
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
      <li>   <a href="profile.php"   class="is-active" ><i class="fi-torso large"></i></a></li>
      <li>   <a href="inbox.php"><i class="fi-mail large newEmail"></i><sup><?php echo $_SESSION['msgs'];?></sup></a></li>
    </ul>
</header>
<!-- modal create a match content -->
<div class="container">
  <?php  if(isset($_SESSION['invitecode'])) {?>
    <div class="row" style="margin:20px;position:relative">
      <div class="small-12 columns auth-plain " style="border:4px solid white;padding:20px;background: url(../img/bg.svg) repeat;background-color: white!important;">
        <div class="signup-panel">
          You have a Pending invitation, once you complete your registeration you'll be added automatically to the club.
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="row cardsList">
    <div class="listHeader" style="">
        <div>Your Profile</div>
    </div>
    <div class="small-12 columns auth-plain " style="border:4px solid white;padding:20px;background: url(assets/img/bg.svg) repeat;background-color: white!important;">

    <!-- create  match-->
              <form  method="post" action="process.php">
                  <input type="hidden" name="invitecode" value="<?php echo $_SESSION['invitecode'];?>">
                  <input type="hidden" name="editprofile" value="editprofile">
                  <input type="hidden" name="uid" value="<?php echo $_SESSION['id'];?>">
                  <label>Name</label>
                  <input type="text" disabled name ="name" value="<?php echo $_SESSION['username'];?>">

                  <label>Email</label>
                  <input type="text" disabled name="email" value="<?php echo $_SESSION['email'];?>">

                  <label>Nickname</label>
                  <input type="text" required name="nickname" placeholder="Nickname">

                  <label>Date of birth</label>
                  <input type="text" required name="DOB" placeholder="22/12/1980"  id="dp2">

                  <label>Favourite position</label>
                  <select name="position" required  >
                      <option value="gk">Goal Keeper</option>
                      <option value="rb">Right Back</option>
                      <option value="lb">Left Back</option>
                      <option value="cb">Center Back</option>
                      <option value="rm">Right Midfield</option>
                      <option value="cm">Centre Midfield</option>
                      <option value="lm">Left Midfield</option>
                      <option value="n10">No 10</option>
                      <option value="cf">Forward</option>
                      <option value="lw">Left Wing</option>
                      <option value="rw">Right Wing</option>
                  </select><br/>

                  <label>Phone number</label>
                  <input type="text" name="phone" required placeholder="phone">


                <input type="submit" class="nice blue radius button" value="Lets go">
                </form>
        <!-- create match-->
      </div>
  </div>
</div>
<!-- modal create a match content -->
<!-- content end -->
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
