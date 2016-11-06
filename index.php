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
    .medium-3.column {margin-bottom:10px;}
    </style>
  </head>
  <body>
    <div class="title-bar">
      <div class="title-bar-left">
        <span class="title-bar-title">Amatuer Football League</span>
      </div>
        <div class="title-bar-right">
          <a class="login footWhitefont" href="#" data-open="loginBox">Login</a> -
          <a class="login footWhitefont" href="#" data-open="registerBox">Register</a> -
          <a class="login footWhitefont" href="howitworks.php" >How it works ?</a>
          <!-- <a class="login footWhitefont" href="#" data-open="RegBox">Register</a> - -->
        </div>
    </div>

         <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit style="display:none">
           <ul class="orbit-container">
             <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
             <button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
             <li class="orbit-slide is-active">
               <img src="http://placehold.it/2000x750">
             </li>
             <li class="orbit-slide">
               <img src="http://placehold.it/2000x750">
             </li>
             <li class="orbit-slide">
               <img src="http://placehold.it/2000x750">
             </li>
             <li class="orbit-slide">
               <img src="http://placehold.it/2000x750">
             </li>
           </ul>
         </div>

         <div class="row cardsList">
           <div class="listHeader" style="">
               <div>Join a Club</div>
           </div>
            <div class="medium-3 column">
              <div class="card">
                <div class="image">
                  <img src="assets/img/club.jpg">
                  <span class="title">FC Titans</span>
                </div>
                <div class="content">
                     <p>Members: 30</p>
                     <p>Played Matchs: 5</p>
                     <p>City: London</p>
                     <p>Created on: 2016-10-30</p>
                </div>
                <div class="action">
                  <a  href="<?php echo $url ?>" >Join</a>
                </div>
              </div>
            </div>

              <div class="medium-3 column">
                 <div class="card">
                   <div class="image">
                     <img src="assets/img/club.jpg">
                     <span class="title">Desert Football</span>
                   </div>
                   <div class="content">
                        <p>Members: 17</p>
                        <p>Played Matchs: 5</p>
                        <p>City: Abu Dhabi</p>
                        <p>Created on: 2016-09-03</p>
                   </div>
                   <div class="action">
                     <a  href="<?php echo $url ?>" >Join</a>
                   </div>
                 </div>
               </div>

              <div class="medium-3 column">
                <div class="card">
                  <div class="image">
                    <img src="assets/img/club.jpg">
                    <span class="title">FC Unique</span>
                  </div>
                  <div class="content">
                       <p>Members: 26</p>
                       <p>Played Matchs: 9</p>
                       <p>City: dubai</p>
                       <p>Created on: 2016-04-02</p>
                  </div>
                  <div class="action">
                    <a  href="<?php echo $url ?>" >Join</a>
                  </div>
                </div>
              </div>

              <div class="medium-3 column">
                 <div class="card">
                   <div class="image">
                     <img src="assets/img/club.jpg">
                     <span class="title">FC Titans</span>
                   </div>
                   <div class="content">
                        <p>Members: 19</p>
                        <p>Played Matchs: 5</p>
                        <p>City: dubai</p>
                        <p>Created on: 2016-10-09</p>
                   </div>
                   <div class="action">
                     <a  href="<?php echo $url ?>" >Join</a>
                   </div>
                 </div>
               </div>
        </div>
         <div class="row cardsList">
          <div class="listHeader" style="">
             <div>Current games</div>
          </div>
          <div class="medium-3 column">
               <div class="card">
                 <div class="image">
                   <img src="assets/img/club.jpg">
                   <span class="title">Dubai Devils</span>
                 </div>
                 <div class="content">
                   <p>Venue: <a target="_blank" href="https://www.google.com/maps/place/25.03913450,55.21763520">ICC</a></p>
                   <p>Kick off: <span class="ko">in 15 hours</span></p>
                   <p>Players In: 22</p>
                 </div>

                 <div class="action">
                   <a  href="<?php echo $url ?>" >Play</a>
                 </div>
               </div>
             </div>
          <div class="medium-3 column">
          <div class="card">
          <div class="image">
          <img src="assets/img/club.jpg">
          <span class="title">FC tikiTaka</span>
          </div>
          <div class="content">
          <p>Venue: <a target="_blank" href="https://www.google.com/maps/place/25.03913450,55.21763520">ICC</a></p>
          <p>Kick off: <span class="ko">in 2 days</span></p>
          <p>Players In: 18</p>
          </div>
          <div class="action">
          <a  href="<?php echo $url ?>" >Play</a>
          </div>
          </div>
          </div>
          <div class="medium-3 column">
               <div class="card">
                 <div class="image">
                   <img src="assets/img/club.jpg">
                   <span class="title">Royal Club</span>
                 </div>
                 <div class="content">
                   <p>Venue: <a target="_blank" href="https://www.google.com/maps/place/25.03913450,55.21763520">ICC</a></p>
                   <p>Kick off: <span class="ko">Tonight</span></p>
                   <p>Players In: 20</p>
                 </div>

                 <div class="action">
                   <a  href="<?php echo $url ?>" >Play</a>
                 </div>
               </div>
           </div>
          <div class="medium-3 column">
                 <div class="card">
                   <div class="image">
                     <img src="assets/img/club.jpg">
                     <span class="title">FC Sunday</span>
                   </div>
                   <div class="content">
                     <p>Venue: <a target="_blank" href="https://www.google.com/maps/place/25.03913450,55.21763520">ICC</a></p>
                     <p>Kick off: <span class="ko">Tomorrow</span></p>
                     <p>Players In: 10</p>
                   </div>

                   <div class="action">
                     <a  href="<?php echo $url ?>" >Play</a>
                   </div>
                 </div>
               </div>
         </div>
<!-- content end -->
<?php include 'partials/modal.php'; ?>
<!-- footer -->
<footer class="footer">
  <div class="row">
    <div class="small-12 medium-6 large-5 columns">
      <p class="logo"><i class="fi-shield"></i> futballteam.com</p>
      <p class="footer-links">
        <a href="inex.php">Home</a>
        <a href="#">About</a>
        <a href="howitworks.php">How does it work?</a>
        <a href="#">Contact</a>
      </p>
      <p class="copywrite">Copywrite © 2016/17</p>
    </div>
    <div class="small-12 medium-6 large-4 columns">
      <ul class="contact">
        <li><p><i class="fi-mail"></i>  coach@futballteam.com</p></li>
      </ul>
    </div>
    <div class="small-12 medium-12 large-3 columns">
      <p class="about">futballteam.com</p>
      <p class="about subheader">give and go, sunday league football. Make it your own</p>
      <ul class="inline-list social">
        <a href="#"><i class="fi-social-facebook"></i></a>
        <a href="#"><i class="fi-social-twitter"></i></a>
        <a href="#"><i class="fi-social-linkedin"></i></a>
        <a href="#"><i class="fi-social-github"></i></a>
      </ul>
    </div>
  </div>
</footer>
<!-- footer -->
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
