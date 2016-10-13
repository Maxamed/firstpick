
<?php include_once 'partials/header.php';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$user = getUser($id);

?>
<header class="header">
  <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
  <ul class="header-subnav">
    <li>   <a href="yourclubs.php" alt="Your Clubs" >Your Clubs</a> </li>
    <li>   <a href="yourstats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="upcoming.php" alt="upcoming" >Matchs</a> </li>
    <li>   <a href="createclub.php">Create a Club</a> </li>
    <li>   <a href="profile.php" alt="profile"  class="is-active">Profile</a> </li>
    <li>   <a href="logout" alt="logout">logout</a> </li>
  </ul>
</header>
<!-- modal create a match content -->

  <div class="row" style="margin:20px;position:relative">
    <div class="small-12 columns auth-plain " style="border:4px solid white;padding:20px;background: url(../img/bg.svg) repeat;background-color: white!important;">
      <div class="signup-panel">
        <!-- create  match-->
            <div id="contactForm" class="">
              <form  method="post" action="process.php">
                  <h2>Complete your profile profile</h2>

                  <input type="hidden" name="editprofile" value="editprofile">
                  <input type="hidden" name="uid" value="<?php echo $_SESSION['id'];?>">
                  <label>Name</label>
                  <input type="text" disabled name ="name" value="<?php echo $user['username'];?>">

                  <label>Email</label>
                  <input type="text" disabled name="email" value="<?php echo $user['email'];?>">

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
            </div><!--end 8 columns-->
        <!-- create match-->
      </div>
    </div>
  </div>
<!-- modal create a match content -->
<!-- content end -->
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
