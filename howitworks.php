<?php
if (!session_id()) {
    session_start();
}
require_once 'sdk/Facebook/autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
//@ fddd
$fb = new Facebook\Facebook([
  'app_id' => '537836766412726', // Replace {app-id} with your app id
  'app_secret' => '6f528be8aa1e5b38a1ff1d0cfdd0daa5',
  'default_graph_version' => 'v2.2'
  ]);

$helper = $fb->getRedirectLoginHelper();


//  $_SESSION['FBRLH_state']=$_GET['state'];
$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://futballteam.com/sdk/callback.php', $permissions);

$url =  htmlspecialchars($loginUrl);

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Fuuty, the Amatuer football organisation site">
    <meta property="og:title" content="Fuuty">
    <meta property="og:image" content="link_to_image">
    <meta property="og:description" content="Fuuty, the Amatuer football organisation site">
    <title>Fuuty</title>
    <link rel="stylesheet" href="assets/css/foundation.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/helper.css">
    <link rel="stylesheet" href="assets/css/icons.css">
    <style>
      .vertical li {}
        .vertical li a {color:black;font-weight: bold}
    </style>
  </head>
  <body>
  <div class="title-bar">
    <div class="title-bar-left">
      <span class="title-bar-title">Amatuer Football League</span>
    </div>
    <div class="title-bar-right">
      <a class="login footWhitefont" href="#" data-open="loginBox">Login / Register</a> -
        <a class="login footWhitefont" href="howitworks.php" >How it works ?</a>
    </div>
  </div>
  <!-- content -->
  <div class="container" style="">
    <div class="row cardsList">
      <div class="listHeader" id="AsCaptain">
          <div>As a Captin</div>
      </div>
      <div class="row" style="margin:10px">
        <div class="large-4 columns" data-sticky-container >
          <div class="sticky whiteBackground" id="example" data-sticky data-margin-top="0" data-margin-bottom="0" data-top-anchor="AsCaptain">
            <ul class="vertical menu" data-magellan>
              <li><a href="#first">Create a Club</a></li>
              <li><a href="#second">Select Pitches</a></li>
              <li><a href="#third">Invite Players</a></li>
              <li><a href="#four">Accept / Reject Player Transfers</a></li>
              <li><a href="#five">Create a Match</a></li>
              <li><a href="#six">Accept / Reject Player RSVP</a></li>
              <li><a href="#seven">Create Teams</a></li>
              <li><a href="#eight">Finish a Match</a></li>
              <li><a href="#nine">Add Player stats</a></li>
            </ul>
          </div>
        </div>
        <div class="small-8 columns auth-plain whiteBackground">
          <div class="sections">
            <section id="first" data-magellan-target="first">
              <h4>Create a Club</h4>
              <p>Every user of Futballteam.com can create 1 unique Club. However, before creating a club we advise you to search for clubs available in your vicinity</p>
              <p>Can't find clubs? go ahead and create your own.</p>
              <p> Once you login you'll have the option in the main navigation menu</p>
              <img src="assets/content/createclub.png" />
              <p> On create a club page you will be asked for few details to define your club, as follow:</p>
              <img src="assets/content/createclub1.png" />
              <p>On successful submission your login menu will change to reflect your status as club captain, keep an eye out going forward on your notification section for eager players want to join your club</p>
            </section>
            <section id="second" data-magellan-target="second">
              <h4>Select Pitches</h4>
              <p>A club is not complete with its own Home ground, so go ahead and click on Pitch to start assigning a pitch to your club</p>
              <p>You will have the option to search for pitch using our interactive map, once you find a pitch assign a distinctive name and save it for future use</p>
              <img src="assets/content/pitch.png" />
              <p>Once a pitch is saved it will appear on your saved pitchs list  </p>
              <img src="assets/content/pitch1.png" />
            </section>
            <section id="third" data-magellan-target="third">
              <h4>Invite Players</h4>
              <p>In your Managment Dashboard section, your owned clubs will appear highlighted in white, with an option to Delete or View</p>
              <p>Go ahead and Click on View</p>
              <img src="assets/content/yourclub.png" />
              <p>This should take you to your Club page, on the club page you'll find the Generate Invite Code section</p>
              <img src="assets/content/invite.png" />
              <p>Generating an invite code will give you a unique invite to your club, so go ahead and send this to all your future users.</p>
              <img src="assets/content/invite2.png" /> 
              <p> </p>
              <p> </p>
            </section>
            <section id="four" data-magellan-target="four">
              <h4>Accept / Reject Player Transfers</h4>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique et nisi ultricies dictum. Aenean facilisis quam ante, vitae aliquam nunc efficitur ac. Praesent quis tempor ligula, cursus fermentum massa. Curabitur viverra ligula sit amet aliquet ullamcorper. Pellentesque lacus nulla, interdum sed dui id, interdum laoreet tortor. Suspendisse faucibus velit ut sem pulvinar porta. Sed iaculis odio fermentum cursus blandit. In ultrices semper elit in porttitor. Morbi vel suscipit felis.
              Etiam blandit ultrices lobortis. Donec et convallis felis. Etiam vulputate pellentesque sem vitae bibendum. Proin scelerisque tempor efficitur. Nam bibendum dui vitae ex semper, a euismod mi feugiat. Aenean rhoncus mi consectetur scelerisque rhoncus. Donec malesuada urna aliquam lobortis aliquam. In cursus placerat porttitor. Nullam tempus mi nec turpis lacinia, ut venenatis est porta. Mauris semper libero eget urna eleifend tempor quis vitae nulla. Integer est mi, dictum non auctor ac, pulvinar vel metus. Morbi eget maximus lectus. Duis hendrerit est ut nulla aliquam gravida. Integer sollicitudin, tellus vitae aliquam porttitor, ligula nisi posuere arcu, eget rhoncus turpis dolor vel orci. Quisque viverra ultrices diam.
              Etiam turpis turpis, posuere sit amet quam nec, ultrices rhoncus urna. Nullam vel blandit lorem. Sed vitae tempus quam. Phasellus volutpat sagittis congue. Nullam sollicitudin porta nibh. Morbi ultrices consectetur magna. Suspendisse dui nunc, gravida quis nibh non, pellentesque laoreet augue. Vivamus justo felis, gravida ac nisi quis, pretium fringilla sapien. Quisque vel accumsan neque, faucibus fermentum sapien. Sed pharetra pellentesque ornare. Nullam quis mauris sed mauris fermentum imperdiet. Phasellus odio elit, suscipit ac nunc a, finibus elementum lacus. Etiam sapien erat, mattis quis ultrices non, sodales eu quam. Ut in luctus purus, id finibus nunc. Praesent sit amet efficitur turpis, sed tristique tellus.
            </section>
            <section id="five" data-magellan-target="five">
              <h4>Create a Match</h4>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique et nisi ultricies dictum. Aenean facilisis quam ante, vitae aliquam nunc efficitur ac. Praesent quis tempor ligula, cursus fermentum massa. Curabitur viverra ligula sit amet aliquet ullamcorper. Pellentesque lacus nulla, interdum sed dui id, interdum laoreet tortor. Suspendisse faucibus velit ut sem pulvinar porta. Sed iaculis odio fermentum cursus blandit. In ultrices semper elit in porttitor. Morbi vel suscipit felis.
              Etiam blandit ultrices lobortis. Donec et convallis felis. Etiam vulputate pellentesque sem vitae bibendum. Proin scelerisque tempor efficitur. Nam bibendum dui vitae ex semper, a euismod mi feugiat. Aenean rhoncus mi consectetur scelerisque rhoncus. Donec malesuada urna aliquam lobortis aliquam. In cursus placerat porttitor. Nullam tempus mi nec turpis lacinia, ut venenatis est porta. Mauris semper libero eget urna eleifend tempor quis vitae nulla. Integer est mi, dictum non auctor ac, pulvinar vel metus. Morbi eget maximus lectus. Duis hendrerit est ut nulla aliquam gravida. Integer sollicitudin, tellus vitae aliquam porttitor, ligula nisi posuere arcu, eget rhoncus turpis dolor vel orci. Quisque viverra ultrices diam.
              Etiam turpis turpis, posuere sit amet quam nec, ultrices rhoncus urna. Nullam vel blandit lorem. Sed vitae tempus quam. Phasellus volutpat sagittis congue. Nullam sollicitudin porta nibh. Morbi ultrices consectetur magna. Suspendisse dui nunc, gravida quis nibh non, pellentesque laoreet augue. Vivamus justo felis, gravida ac nisi quis, pretium fringilla sapien. Quisque vel accumsan neque, faucibus fermentum sapien. Sed pharetra pellentesque ornare. Nullam quis mauris sed mauris fermentum imperdiet. Phasellus odio elit, suscipit ac nunc a, finibus elementum lacus. Etiam sapien erat, mattis quis ultrices non, sodales eu quam. Ut in luctus purus, id finibus nunc. Praesent sit amet efficitur turpis, sed tristique tellus.
            </section>
            <section id="six" data-magellan-target="six">
              <h4>Accept / Reject Player RSVP</h4>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique et nisi ultricies dictum. Aenean facilisis quam ante, vitae aliquam nunc efficitur ac. Praesent quis tempor ligula, cursus fermentum massa. Curabitur viverra ligula sit amet aliquet ullamcorper. Pellentesque lacus nulla, interdum sed dui id, interdum laoreet tortor. Suspendisse faucibus velit ut sem pulvinar porta. Sed iaculis odio fermentum cursus blandit. In ultrices semper elit in porttitor. Morbi vel suscipit felis.
              Etiam blandit ultrices lobortis. Donec et convallis felis. Etiam vulputate pellentesque sem vitae bibendum. Proin scelerisque tempor efficitur. Nam bibendum dui vitae ex semper, a euismod mi feugiat. Aenean rhoncus mi consectetur scelerisque rhoncus. Donec malesuada urna aliquam lobortis aliquam. In cursus placerat porttitor. Nullam tempus mi nec turpis lacinia, ut venenatis est porta. Mauris semper libero eget urna eleifend tempor quis vitae nulla. Integer est mi, dictum non auctor ac, pulvinar vel metus. Morbi eget maximus lectus. Duis hendrerit est ut nulla aliquam gravida. Integer sollicitudin, tellus vitae aliquam porttitor, ligula nisi posuere arcu, eget rhoncus turpis dolor vel orci. Quisque viverra ultrices diam.
              Etiam turpis turpis, posuere sit amet quam nec, ultrices rhoncus urna. Nullam vel blandit lorem. Sed vitae tempus quam. Phasellus volutpat sagittis congue. Nullam sollicitudin porta nibh. Morbi ultrices consectetur magna. Suspendisse dui nunc, gravida quis nibh non, pellentesque laoreet augue. Vivamus justo felis, gravida ac nisi quis, pretium fringilla sapien. Quisque vel accumsan neque, faucibus fermentum sapien. Sed pharetra pellentesque ornare. Nullam quis mauris sed mauris fermentum imperdiet. Phasellus odio elit, suscipit ac nunc a, finibus elementum lacus. Etiam sapien erat, mattis quis ultrices non, sodales eu quam. Ut in luctus purus, id finibus nunc. Praesent sit amet efficitur turpis, sed tristique tellus.
            </section>
            <section id="seven" data-magellan-target="seven">
              <h4>Create Teams</h4>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique et nisi ultricies dictum. Aenean facilisis quam ante, vitae aliquam nunc efficitur ac. Praesent quis tempor ligula, cursus fermentum massa. Curabitur viverra ligula sit amet aliquet ullamcorper. Pellentesque lacus nulla, interdum sed dui id, interdum laoreet tortor. Suspendisse faucibus velit ut sem pulvinar porta. Sed iaculis odio fermentum cursus blandit. In ultrices semper elit in porttitor. Morbi vel suscipit felis.
              Etiam blandit ultrices lobortis. Donec et convallis felis. Etiam vulputate pellentesque sem vitae bibendum. Proin scelerisque tempor efficitur. Nam bibendum dui vitae ex semper, a euismod mi feugiat. Aenean rhoncus mi consectetur scelerisque rhoncus. Donec malesuada urna aliquam lobortis aliquam. In cursus placerat porttitor. Nullam tempus mi nec turpis lacinia, ut venenatis est porta. Mauris semper libero eget urna eleifend tempor quis vitae nulla. Integer est mi, dictum non auctor ac, pulvinar vel metus. Morbi eget maximus lectus. Duis hendrerit est ut nulla aliquam gravida. Integer sollicitudin, tellus vitae aliquam porttitor, ligula nisi posuere arcu, eget rhoncus turpis dolor vel orci. Quisque viverra ultrices diam.
              Etiam turpis turpis, posuere sit amet quam nec, ultrices rhoncus urna. Nullam vel blandit lorem. Sed vitae tempus quam. Phasellus volutpat sagittis congue. Nullam sollicitudin porta nibh. Morbi ultrices consectetur magna. Suspendisse dui nunc, gravida quis nibh non, pellentesque laoreet augue. Vivamus justo felis, gravida ac nisi quis, pretium fringilla sapien. Quisque vel accumsan neque, faucibus fermentum sapien. Sed pharetra pellentesque ornare. Nullam quis mauris sed mauris fermentum imperdiet. Phasellus odio elit, suscipit ac nunc a, finibus elementum lacus. Etiam sapien erat, mattis quis ultrices non, sodales eu quam. Ut in luctus purus, id finibus nunc. Praesent sit amet efficitur turpis, sed tristique tellus.
            </section>
            <section id="eight" data-magellan-target="eight">
              <h4>Finish a Match</h4>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique et nisi ultricies dictum. Aenean facilisis quam ante, vitae aliquam nunc efficitur ac. Praesent quis tempor ligula, cursus fermentum massa. Curabitur viverra ligula sit amet aliquet ullamcorper. Pellentesque lacus nulla, interdum sed dui id, interdum laoreet tortor. Suspendisse faucibus velit ut sem pulvinar porta. Sed iaculis odio fermentum cursus blandit. In ultrices semper elit in porttitor. Morbi vel suscipit felis.
              Etiam blandit ultrices lobortis. Donec et convallis felis. Etiam vulputate pellentesque sem vitae bibendum. Proin scelerisque tempor efficitur. Nam bibendum dui vitae ex semper, a euismod mi feugiat. Aenean rhoncus mi consectetur scelerisque rhoncus. Donec malesuada urna aliquam lobortis aliquam. In cursus placerat porttitor. Nullam tempus mi nec turpis lacinia, ut venenatis est porta. Mauris semper libero eget urna eleifend tempor quis vitae nulla. Integer est mi, dictum non auctor ac, pulvinar vel metus. Morbi eget maximus lectus. Duis hendrerit est ut nulla aliquam gravida. Integer sollicitudin, tellus vitae aliquam porttitor, ligula nisi posuere arcu, eget rhoncus turpis dolor vel orci. Quisque viverra ultrices diam.
              Etiam turpis turpis, posuere sit amet quam nec, ultrices rhoncus urna. Nullam vel blandit lorem. Sed vitae tempus quam. Phasellus volutpat sagittis congue. Nullam sollicitudin porta nibh. Morbi ultrices consectetur magna. Suspendisse dui nunc, gravida quis nibh non, pellentesque laoreet augue. Vivamus justo felis, gravida ac nisi quis, pretium fringilla sapien. Quisque vel accumsan neque, faucibus fermentum sapien. Sed pharetra pellentesque ornare. Nullam quis mauris sed mauris fermentum imperdiet. Phasellus odio elit, suscipit ac nunc a, finibus elementum lacus. Etiam sapien erat, mattis quis ultrices non, sodales eu quam. Ut in luctus purus, id finibus nunc. Praesent sit amet efficitur turpis, sed tristique tellus.
            </section>
            <section id="nine" data-magellan-target="nine">
              <h4>Add Player stats</h4>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tristique et nisi ultricies dictum. Aenean facilisis quam ante, vitae aliquam nunc efficitur ac. Praesent quis tempor ligula, cursus fermentum massa. Curabitur viverra ligula sit amet aliquet ullamcorper. Pellentesque lacus nulla, interdum sed dui id, interdum laoreet tortor. Suspendisse faucibus velit ut sem pulvinar porta. Sed iaculis odio fermentum cursus blandit. In ultrices semper elit in porttitor. Morbi vel suscipit felis.
              Etiam blandit ultrices lobortis. Donec et convallis felis. Etiam vulputate pellentesque sem vitae bibendum. Proin scelerisque tempor efficitur. Nam bibendum dui vitae ex semper, a euismod mi feugiat. Aenean rhoncus mi consectetur scelerisque rhoncus. Donec malesuada urna aliquam lobortis aliquam. In cursus placerat porttitor. Nullam tempus mi nec turpis lacinia, ut venenatis est porta. Mauris semper libero eget urna eleifend tempor quis vitae nulla. Integer est mi, dictum non auctor ac, pulvinar vel metus. Morbi eget maximus lectus. Duis hendrerit est ut nulla aliquam gravida. Integer sollicitudin, tellus vitae aliquam porttitor, ligula nisi posuere arcu, eget rhoncus turpis dolor vel orci. Quisque viverra ultrices diam.
              Etiam turpis turpis, posuere sit amet quam nec, ultrices rhoncus urna. Nullam vel blandit lorem. Sed vitae tempus quam. Phasellus volutpat sagittis congue. Nullam sollicitudin porta nibh. Morbi ultrices consectetur magna. Suspendisse dui nunc, gravida quis nibh non, pellentesque laoreet augue. Vivamus justo felis, gravida ac nisi quis, pretium fringilla sapien. Quisque vel accumsan neque, faucibus fermentum sapien. Sed pharetra pellentesque ornare. Nullam quis mauris sed mauris fermentum imperdiet. Phasellus odio elit, suscipit ac nunc a, finibus elementum lacus. Etiam sapien erat, mattis quis ultrices non, sodales eu quam. Ut in luctus purus, id finibus nunc. Praesent sit amet efficitur turpis, sed tristique tellus.
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- content end -->
<?php include 'partials/modal.php'; ?>
<!-- footer -->
<!-- footer -->
<footer class="footer">
  <div class="row">
    <div class="small-12 medium-6 medium-push-6 columns">
      <p class="logo show-for-small-only"><i class="fi-target"></i> FIGHT CLUB</p>
      <form class="footer-form">
        <div class="row">
          <div class="medium-9 medium-push-3 columns">
            <label>
              <label for="email" class="contact">Contact Us</label>
              <input type="email" id="email" placeholder="Email Address" />
            </label>
          </div>
        </div>
        <div class="row">
          <div class="medium-9 medium-push-3 columns">
            <label>
              <textarea rows="5" id="message" placeholder="Message"></textarea>
            </label>
          </div>
          <div class="row">
            <div class="medium-9 medium-push-3 columns">
              <button class="submit" type="submit" value="Submit">Send</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="small-12 medium-6 medium-pull-6 columns">
      <p class="logo hide-for-small-only"><i class="fi-target"></i>Amatuer Football League</p>
      <p class="footer-links">
        <a href="#">Home</a>
        <a href="#">How it works</a>
        <a href="#">Faq</a>
      </p>
      <ul class="inline-list social">
        <a href="#"><i class="fi-social-facebook"></i></a>
        <a href="#"><i class="fi-social-twitter"></i></a>
        <a href="#"><i class="fi-social-linkedin"></i></a>
        <a href="#"><i class="fi-social-github"></i></a>
      </ul>
      <p class="copywrite">Copywrite © 2015</p>
    </div>
  </div>
</footer>
    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/foundation.min.js"></script>
    <script src="assets/js/vendor/datepicker.js"></script>
    <script src="assets/js/vendor/multiselect.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86576737-1', 'auto');
  ga('send', 'pageview');

</script>
  </body>
</html>
