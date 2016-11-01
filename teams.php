
<?php
include_once 'partials/header.php';
include_once 'partials/secure.php';
  $matchid = $_GET['matchid'];
?>
<style>
.roaster,.roaster li { list-style-type: none; padding: none;margin:none}

</style>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $_SESSION['username'];?></small></h1>
  <ul class="header-subnav">
    <?php if($_SESSION['isadmin']===0){ ?>
    <li>    <a href="lockerroom.php" alt="Your Clubs" >Locker Room</a> </li>
    <li>    <a href="createclub.php"  >Create a Club</a> </li>
    <?php }else{ ?>
      <li>    <a href="dashboard.php" alt="Dashboard">Management</a> </li>
      <li>   <a href="inbox.php" alt="Inbox">Inbox</a></li>
      <li>    <a href="previousmatchs.php" alt="HistoryMatchs">Match History</a> </li>
      <li>    <a href="matchsetup.php"  class="is-active">Setup a Match</a></li>
      <li>    <a href="pitch.php" alt="Pitch">Pitches</a></li>
 <?php } ?>
    <li>   <a href="matchs.php" alt="upcoming">Matches</a> </li>
    <li>   <a href="stats.php" alt="Stats">Stats</a> </li>
    <li>   <a href="profile.php" alt="profile">Profile</a> </li>
    <li>   <a href="logout.php" alt="logout">logout</a> </li>
  </ul>
</header>

<div class="row cardsList" >
  <div class="listHeader" style="">
      <div>Create Teams</div>
  </div>
  <ul  class="sortable team2 roaster" style="float:left;border:1px solid blue;min-height:100px;min-width:100px;">
    <form >
      <?php $MatchUsers = getMatchUsers($matchid);
    //var_dump($MatchUsers);
      if($MatchUsers===0){}else{
      foreach ($MatchUsers as $key => $value) {
      ?>
      <li data-matchid="<?php echo $matchid;?>" data-userid="<?php echo $value['id'];?>">
        <div class="singleCard">
          <div class="card">
            <div class="content">
              <span class="title"><?php echo $value['username'];?></span>
              <p>Position: <?php echo $value['position'];?></p>
            </div>
          </div>
        </div>
      </li>

      <?php }}?>
    </form>
  </ul>
  <ul  class="sortable team2 roaster" style="float:left;border:1px solid blue;min-height:100px;min-width:100px;">
    <form >
      <li></li>
    </form>
  </ul>

</div>
<!-- content end -->
<?php include 'partials/footer.php'; ?>
<script src="assets/js/vendor/sortable.js"></script>
  <script>
  var adjustment;

  $(".sortable").sortable({
    group: 'sortable',
    pullPlaceholder: false,
    // animation on drop
    onDrop: function  ($item, container, _super) {
      var $clonedItem = $('<li/>').css({height: 0});
      $item.before($clonedItem);
      $clonedItem.animate({'height': $item.height()});

      $item.animate($clonedItem.position(), function  () {
        $clonedItem.detach();
        _super($item, container);
      });
    },

    // set $item relative to cursor position
    onDragStart: function ($item, container, _super) {
      var offset = $item.offset(),
          pointer = container.rootGroup.pointer;

      adjustment = {
        left: pointer.left - offset.left,
        top: pointer.top - offset.top
      };

      _super($item, container);
    },
    onDrag: function ($item, position) {
      $item.css({
        left: position.left - adjustment.left,
        top: position.top - adjustment.top
      });
    }
  });
</script>
