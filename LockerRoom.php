
<?php include_once 'partials/header.php';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$user = getUser($id);
?>
<header class="header" >

    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
    <ul class="header-subnav">
      <li>   <a href="LockerRoom.php" alt="Your Clubs"  class="is-active">Your Clubs</a> </li>
      <li>   <a href="Stats.php" alt="Stats">Stats</a> </li>
      <li>   <a href="Matchs.php" alt="upcoming" >Matchs</a> </li>
      <li>   <a href="createclub.php"  >Create a Club</a> </li>
      <li>   <a href="profile.php" alt="profile">Profile</a> </li>
      <li>   <a href="logout.php" alt="logout">logout</a> </li>
    </ul>
</header>
<div class="row large-12" >
  <form action="results.php" method="post">
  <ul class="menu float-right">
    <li><input type="search" name="search" placeholder="Try all for every club.."></li>
    <li>
      <input type="submit" class="button" value="Search"></li>
  </ul></form>
</div>
<div class="row cardsList">
  <div class="listHeader" style="">
      <div>Your Clubs</div>
  </div>
  <div class="row" style="margin:10px">
    <!-- club -->
    <div class="medium-3 column">
      <div class="card">
        <div class="image">
          <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
          <span class="title">Thursday Night Football</span>
        </div>
        <div class="content">
          <p>Members: 30</p>
          <p>Pitchs: 3</p>
        </div>
        <div class="action">
          <a href='club.php'>View Club</a><br/><a href='#'>Leave Club</a>
        </div>
      </div>
    </div>
    <!-- club -->
    <!-- club -->
    <div class="medium-3 column">
      <div class="card">
        <div class="image">
          <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
          <span class="title">Thursday Night Football</span>
        </div>
        <div class="content">
          <p>Members: 30</p>
          <p>Pitchs: 3</p>
        </div>
        <div class="action">
          <a href='club.php'>View Club</a><br/><a href='#'>Leave Club</a>
        </div>
      </div>
    </div>
    <!-- club -->
    <!-- club -->
    <div class="medium-3 column">
      <div class="card">
        <div class="image">
          <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
          <span class="title">Thursday Night Football</span>
        </div>
        <div class="content">
          <p>Members: 30</p>
          <p>Pitchs: 3</p>
        </div>
        <div class="action">
          <a href='club.php'>View Club</a><br/><a href='#'>Leave Club</a>
        </div>
      </div>
    </div>
    <!-- club -->
  </div>
</div>

<!-- content end -->
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
