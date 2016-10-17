
<?php include_once 'partials/header.php';
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $_SESSION['username'];?></small></h1>
    <ul class="header-subnav">
      <?php if($_SESSION['isadmin']===0){ ?>
      <li>    <a href="LockerRoom.php" alt="Your Clubs"  class="is-active">Locker Room</a> </li>
      <li>    <a href="createclub.php"  >Create a Club</a> </li>
      <?php }else{ ?>
        <li>    <a href="Dashboard.php" alt="Dashboard"class="is-active">Management</a> </li>
        <li>   <a href="Inbox.php" alt="Inbox">Inbox</a></li>
        <li>    <a href="PreviousMatchs.php" alt="HistoryMatchs">Match History</a> </li>
        <li>    <a href="MatchSetup.php" >Setup a Match</a></li>
        <li>    <a href="Pitch.php" alt="Pitch">Pitches</a></li>
   <?php } ?>
      <li>   <a href="Matchs.php" alt="upcoming" >Matches</a> </li>
      <li>   <a href="Stats.php" alt="Stats">Stats</a> </li>
      <li>   <a href="profile.php" alt="profile">Profile</a> </li>
      <li>   <a href="logout.php" alt="logout">logout</a> </li>
    </ul>
</header>


<script src="assets/js/vendor/jquery.js"></script>
<script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyC49xjd7Oum8acc0G5tDCQcmPJlj8H0WD0"></script>
<script src="assets/js/vendor/foundation.min.js"></script>
<script src="assets/js/vendor/datepicker.js"></script>
<script src="assets/js/vendor/multiselect.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/vendor/gmaps.js"></script>
<script>
var map;
$(document).ready(function(){
  map = new GMaps({
    el: '#map',
    lat: -12.043333,
    lng: -77.028333
  });
  $('#geocoding_form').submit(function(e){
    e.preventDefault();
    GMaps.geocode({
      address: $('#address').val().trim(),
      callback: function(results, status){
        if(status=='OK'){
          var latlng = results[0].geometry.location;
          var address = results[0].formatted_address;
          map.setCenter(latlng.lat(), latlng.lng());
          map.addMarker({
            lat: latlng.lat(),
            lng: latlng.lng()
          });
          $("#savepitch input[name=lat]").val(latlng.lat());
          $("#savepitch input[name=lon]").val(latlng.lng());
          $("#savepitch input[name=pitchaddress]").val(address);
          $("#savepitch").removeClass("hide");
        }
      }
    });
  });
});
</script>
  </body>
</html>

<!-- AIzaSyC49xjd7Oum8acc0G5tDCQcmPJlj8H0WD0 -->
