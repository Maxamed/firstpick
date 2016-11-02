
<?php include_once 'partials/header.php';
 error_reporting(E_ALL); ini_set('display_errors', 'On');
?>
<link href='assets/css/fullcalendar.css' rel='stylesheet' />
<header class="header"><?php include_once 'partials/notificationbar.php'; ?>
    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
    <ul class="header-subnav">
      <?php if($_SESSION['isadmin']===0){ ?>
      <li>    <a href="lockerroom.php" class="is-active" alt="Your Clubs">Locker Room</a> </li>
      <li>    <a href="createclub.php" >Create a Club</a> </li>
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
  <div class="row" style="margin:10px">
    <?php
      $confirmed = GetUpcoming($id);
      $matchDate = 0;
      if($confirmed===0){
        ?>
        <div class="small-12 columns auth-plain whiteBackground ">
          <p>Once you RSVP for a match and get accepted by Club Captain the match will appear here</p>
        </div>
      <?php }else{
        $matches = [];
        foreach ($confirmed as $key => $value) {
          $ClubName = Clubpage($value['clubid']);
          $pitchName = GetPitchDetails($value['pitchID']);
          $matchDate = $value['date'];
          $matches[$key]['start'] = $value['date'];
          $matches[$key]['title'] = $ClubName['name'];
    }
  }?>
    <div class="small-8 columns auth-plain whiteBackground">
        <div id='calendar'></div>
    </div>
  </div>
</div>
<?php include 'partials/modal.php'; ?>
<?php include 'partials/footer.php'; ?>
<script src='assets/js/vendor/moment.min.js'></script>
<script src='assets/js/vendor/fullcalendar.min.js'></script>
<script type="text/javascript">
</script>
<script>
	$(document).ready(function() {


    var now = moment();
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: now,
			navLinks: true, // can click day/week names to navigate views
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: <?php   echo json_encode($matches)  ?>
		});

	});

</script>
