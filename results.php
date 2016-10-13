
<?php include_once 'partials/header.php';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$user = getUser($id);

$searchterm = $_POST["search"];
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
<div class="row results">
  <div class="large-12 columns ">
      <div class="row cardsList">
        <div class="listHeader" style="">
            <div>Search Results for "<?php echo $searchterm; ?>"</div>
        </div>
        <?php
          $SRP =DoSearch($searchterm);
          foreach ($SRP as $key => $value) {
        ?>
        <!-- cards -->
        <div class="medium-3 column">
          <div class="card">
            <div class="image">
              <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
              <span class="title"><?php print_r($SRP[$key]['name']);?></span>
            </div>
            <div class="content">
                    <p>Members: <?php print_r($SRP[$key]['membersCount']);?></p>
                    <p>Played Matchs: <?php print_r($SRP[$key]['membersCount']);?></p>
                    <p>City: <?php print_r($SRP[$key]['country']);?></p>
                    <p>Created on: <?php print_r($SRP[$key]['createdOn']);?></p>
            </div>
            <div class="action">
              <a href='join/<?php print_r($SRP[$key]['id']);?>'>Join</a>
            </div>
          </div>
        </div>
        <!-- card end -->
        <?php
        }
        ?>
    </div>
  </div>
</div>
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
