

<?php include_once 'partials/header.php';

$clubdata = Clubpage($_GET['id']);
//var_dump($clubdata);
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $_SESSION['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($_SESSION['isadmin']===0){ ?>
    <li>    <a href="lockerroom.php" alt="Your Clubs"  class="is-active">Locker Room</a> </li>
    <li>    <a href="createclub.php"  >Create a Club</a> </li>
    <?php }else{ ?>
      <li>    <a href="dashboard.php" alt="Dashboard"class="is-active">Management</a> </li>
      <li>   <a href="inbox.php" alt="Inbox">Inbox</a></li>
      <li>    <a href="previousmatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="matchsetup.php" >Setup a Match</a></li>
      <li>    <a href="pitch.php" alt="Pitch">Pitches</a></li>
 <?php } ?>
    <li>   <a href="matchs.php" alt="upcoming" >Matches</a> </li>
    <li>   <a href="stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="profile.php" alt="profile">Profile</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
  </ul>
</header>

<div class="row" style="margin-top:20px;">

  <div class="small-12 columns auth-plain " style="margin-bottom:20px;border:4px solid white;padding:20px;background: url(../img/bg.svg) repeat;background-color: white!important;">


    <div class="row">
      <div class="large-12 columns">
        <div class="panel">
          <h1><?php echo $clubdata['name'] ?></h1>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Nav Sidebar -->
      <!-- This is source ordered to be pulled to the left on larger screens -->
      <div class="large-4 columns ">
        <div class="panel">
          <a href="#"><img src="assets/img/club.jpg" /></a>
          <div class="section-container vertical-nav" style="background-color:white;padding:15px;"data-section data-options="deep_linking: false; one_up: true">
            <section class="section">
              <h5 class="title">Created on</h5><span><?php echo $clubdata['createdOn'] ?></span>
            </section>
            <section class="section">
              <h5 class="title">Created By</h5><span>James Brown</span>
            </section>
            <section class="section">
              <h5 class="title">Number of Members</h5><span><?php echo $clubdata['membersCount'] ?> members</span>
            </section>
            <section class="section">
              <h5 class="title">Number of Games to date</h5><span><?php echo $clubdata['matchCount'] ?>  games</span>
            </section>
            <!-- <section class="section">
              <h5 class="title">Home Ground</h5><span>Sports City, Dubai</span>
            </section>
            <section class="section">
              <h5 class="title">Away Ground</h5><span>Jabal Ali</span>
            </section>
            <section class="section">
              <h5 class="title">Top Scorer</h5><span>Kapo Ali</span>
            </section> -->
          </div>

        </div>
      </div>

      <!-- Main Feed -->
      <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
      <div class="large-8 columns" >
<?php if($_SESSION['isadmin']!=0){ ?>
        <form  method="post" action="process.php">
            <h2>Create your unique invite code</h2>

            <input type="hidden" name="inviteForm" value="inviteForm">
            <input type="hidden" name="clubid" value="<?php echo $clubdata['id'] ?>">
            <input type="hidden" name="ownderid" value="<?php echo $clubdata['ownerid'] ?>">
            <label>Name</label>
            <input type="text"   name ="name" placeholder="My trusted wingman">
            <label>Email</label>
            <input type="text"   name="email" placeholder="email">
          <input type="submit" class="nice blue radius button" value="Generate Code">
          </form>

            <?php  $invites = GetInviteList($_SESSION['id']);
            ?>
            <p>Pending Invites</p>
        <table style="border:1px solid red">
          <thead>
            <tr>
              <th width="150">Invitee</th>
              <th width="150">Email</th>
              <th width="150">Unique Code</th>
              <th width="150">Date</th>
              <th width="50">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php  foreach ($invites as $key => $value) {
            ?>
            <tr>
              <td><?php print_r($invites[$key]['NewUser']);?></td>
              <td><?php print_r($invites[$key]['Email']);?></td>
              <td>http://topbins.local/invite.php?invite=<?php print_r($invites[$key]['invite']);?></td>
              <td><?php print_r($invites[$key]['InviteDate']);?></td>
              <td>Still under progress</td>
            </tr>
            <?php }?>
          </tbody>
        </table>
<?php }?>
      </div>


    </div>


  </div>
</div>

<!-- content end -->
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
