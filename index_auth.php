<?php
  $config_file_path = 'auth/hybridauth/config.php';
  require_once("auth/hybridauth/Hybrid/Auth.php");
  $hybridauth = new Hybrid_Auth( $config_file_path );
 ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Amatuer Football League</title>
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
      <video poster="" id="bgvid" playsinline autoplay muted loop>
      <source src="assets/video/video.mp4" type="video/mp4">
      </video>
      <img src="assets/img/topbins.png" class='logoicon text-center' />
      <form action="results.php" method="post" class="searchbox column large-12">
        <ul class="menu">
          <li  class="column large-9"><input type="search" name="search" placeholder="Try all for every club.."></li>
          <li>
            <input type="submit" class="button column wide" value="find a club"></li>
        </ul>
      </form>

    </div>

<!-- content end -->
<div id="loginBox" class="reveal" data-reveal>
  <div class="row">



    <div class="large-6 columns auth-plain">
      <div class="signup-panel newusers">
        <a href="auth/login.php?provider=facebook" class="facebook button split"> <span></span>sign in with facebook</a>
        <a href="auth/login.php?provider=twitter" class="twitter button split"> <span></span>sign in with twitter</a>
        <button href="#" class="google button split"> <span></span>sign in with google +</button>
      </div>
    </div>
  </div>
</div>
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
        <a href="auth/login.php?provider=facebook"><i class="fi-social-facebook"></i></a>
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
  </body>
</html>
