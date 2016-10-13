
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
<div class="row cardsList">
  <div class="listHeader" >
      <div>Search for a ground</div>
  </div>
  <div class="large-5 columns" style="border:4px solid white;padding:20px;background: url(assets/img/bg.svg) repeat;background-color: white!important;">
    <form method="post" id="geocoding_form">
      <div class="input-group">
        <span class="input-group-label">Search</span>
        <input class="input-group-field" type="text" placeholder="Sports City, Dubai" id="address" name="address">
        <div class="input-group-button">
          <input type="submit" class="button" value="Submit">
        </div>
      </div>
    </form>
      <div id="map" style=" height:300px;"></div>
      <div id="result" style="background-color:white;padding:10px;">
        <form class="hide" id="savepitch"  method="post" action="process.php">
          <input type="hidden" name="savepitch" value="savepitch">
          <p>We got the longtiude and latittude, now customise your pitch</p>
          <label>Pitch name<input type="text" name="pitchname" placeholder="Home Ground"></label>
          <input type="hidden" name="lat" value="">
          <input type="hidden" name="lon" value="">
          <input type="hidden" name="usrID" value="<?php echo $id ?>">
          <label>Pitch address<input type="text" name="pitchaddress" placeholder=""></label>
          <input type="submit" class="button" value="Submit">
        </form>
      </div>
  </div>
  <div class="large-7 columns">
    <?php  $Pitchs = GetPitchList($id);?>
    <table>
  <thead>
    <tr>
      <th width="150">Pitch name</th>
      <th>Pitch address</th>
      <th width="50">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php  foreach ($Pitchs as $key => $value) {?>
    <tr>
      <td><?php print_r($Pitchs[$key]['name']);?></td>
      <td><a target="_blank" href="https://www.google.com/maps/place/<?php print_r($Pitchs[$key]['lat']);?>,<?php print_r($Pitchs[$key]['lng']);?>"><?php print_r($Pitchs[$key]['pitchaddress']);?></a></td>
      <td><a href="#">Delete</a></td>
    </tr>
    <?php }?>
  </tbody>
</table>
  </div>
</div>

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
