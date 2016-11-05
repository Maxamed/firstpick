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
    .orbit-container { position: relative; }

.orbit-caption {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255,255,255,.3); }

.orbit-caption p {
  position: relative;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  text-align: center;
  color: #fefefe;
  font-size: 48px;
  font-weight: 900; }

@media screen and (max-width: 39.9375em) {
  .orbit-caption p {
    font-size: 12px;
    font-weight: 400; } }
.orbit-bullets {
  display: none; }
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
    <div class="content row" style="margin-top:100px;margin-bottom:100px">


    <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="autoplay:false;">
      <ul class="orbit-container">
        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
        <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
        <li class="is-active orbit-slide">
          <img class="orbit-image" src="https://foundation.zurb.com/sites/docs/assets/img/orbit/01.jpg" alt="Space">
          <span class="orbit-caption"><p>Vertical aligning of text over image on Orbit Slider</p></span>

        </li>
        <li class="orbit-slide">
          <img class="orbit-image" src="https://foundation.zurb.com/sites/docs/assets/img/orbit/01.jpg" alt="Space">
        </li>
        <li class="orbit-slide">
          <img class="orbit-image" src="https://foundation.zurb.com/sites/docs/assets/img/orbit/01.jpg" alt="Space">
        </li>
        <li class="orbit-slide">
          <img class="orbit-image" src="https://foundation.zurb.com/sites/docs/assets/img/orbit/01.jpg" alt="Space">
        </li>
      </ul>
      <!-- <nav class="orbit-bullets">
        <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
        <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
        <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
        <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
      </nav> -->
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
