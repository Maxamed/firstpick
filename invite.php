<?php

  session_start();
  $invitecode =$_GET['invite'];
  $_SESSION['FBID'] = NULL;
  $_SESSION['id'] = NULL;
  $_SESSION['isadmin'] =  NULL;
  $_SESSION['username'] =  NULL;
  $_SESSION['EMAIL'] =  NULL;


$_SESSION['invitecode'] =  $invitecode;
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

  </head>
  <body>


    <div  class="authbox" style="margin:50px auto;padding:20px;" >
      <div class="row">
        <div class="large-6 columns auth-plain">
          <div class="signup-panel newusers">
            <a href="fb/fbconfig.php" class="facebook button split"> <span></span>sign in with facebook</a>
            <button href="#" class="twitter button split"> <span></span>sign in with twitter</button>
            <button href="#" class="google button split"> <span></span>sign in with google +</button>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/foundation.min.js"></script>
    <script src="assets/js/vendor/datepicker.js"></script>
    <script src="assets/js/vendor/multiselect.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>
