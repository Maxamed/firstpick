
<?php include_once 'partials/header.php';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$user = getUser($id);
$clubdata = Clubpage($_GET['id']);
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
    <ul class="header-subnav">
      <li>   <a href="Dashboard.php" alt="Dashboard"class="is-active">Managment</a> </li>
      <li>   <a href="Inbox.php" alt="Inbox">Inbox</a></li>
      <li>   <a href="Pitch.php" alt="Pitch">Pitchs</a></li>
      <li>   <a href="PreviousMatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>  <a href="MatchSetup.php" >Setup a Match</a></li>
      <li>   <a href="logout.php" alt="logout">logout</a> </li>
    </ul>
</header>
<div class="row" style="margin-top:20px;">

  <div class="small-12 columns auth-plain " style="margin-bottom:20px;border:4px solid white;padding:20px;background: url(../img/bg.svg) repeat;background-color: white!important;">

<!-- start -->
<!-- Header and Nav -->
  <div class="row">
    <div class="large-12 columns">
      <div class="panel">
        <h1><?php echo $clubdata[name] ?></h1>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-4 columns ">
      <div class="panel">
        <a href="#"><img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg" /></a>
          <div class="section-container vertical-nav" style="background-color:white;padding:15px;"data-section data-options="deep_linking: false; one_up: true">
          <section class="section">
            <h5 class="title">Created on</h5><span><?php echo $clubdata[createdOn] ?></span>
          </section>
          <section class="section">
            <h5 class="title">Created By</h5><span>James Brown</span>
          </section>
          <section class="section">
            <h5 class="title">Number of Members</h5><span><?php echo $clubdata[membersCount] ?> members</span>
          </section>
          <section class="section">
            <h5 class="title">Number of Games to date</h5><span><?php echo $clubdata[matchCount] ?>  games</span>
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



    </div>


  </div>

<!-- end -->

  </div>
</div>

<!-- content end -->
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
