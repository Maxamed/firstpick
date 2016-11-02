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
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

 //var_dump( $_GET['state']);die();
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
  .content {min-height: 700px;}
  video {
      position: fixed;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 700px;
      z-index: -100;
      transform: translateX(-50%) translateY(-50%);
    background-size: cover;
    transition: 1s opacity;
    opacity: .5;
  }
  .cardsList {float:left;}
  .bodyc {padding:10px;}
  .searchbox {margin-top:0;}

  .logoicon {margin:100px 0 0 400px}
</style>
  </head>
  <body>
    <div class="title-bar">
      <div class="title-bar-left">
        <span class="title-bar-title">Amatuer Football League</span>
      </div>
        <div class="title-bar-right">
        <a class="login footWhitefont" href="#" data-open="loginBox">Login</a> -
          <a class="login footWhitefont" href="#" >How it works ?</a>
          <!-- <a class="login footWhitefont" href="#" data-open="RegBox">Register</a> - -->
        </div>
    </div>
    <!-- content -->
    <div class="content row">


      <div id="howtoo">
        <h3>Keyboard</h3>
        <section>
            <p>Try the keyboard navigation by clicking arrow left or right!</p>
        </section>
        <h3>Effects</h3>
        <section>
            <p>Wonderful transition effects.</p>
        </section>
        <h3>Pager</h3>
        <section>
            <p>The next and previous buttons help you to navigate through your content.</p>
        </section>
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
    <script src="assets/js/vendor/steps.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86576737-1', 'auto');
  ga('send', 'pageview');

  $("#howtoo").steps({
      headerTag: "h3",
      bodyTag: "section",
      transitionEffect: "slideLeft",
      autoFocus: true
  });
</script>
  </body>
</html>
