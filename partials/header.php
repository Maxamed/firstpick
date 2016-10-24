<?php
session_start();

date_default_timezone_set('Asia/Dubai');
if (isset($_SESSION['FBID'])) {
  include_once 'vendors/functions.php';

  $id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
  $user = getUser($id);
  $isAdmin = isAdmin($id);
  $msgs  = notifications($isAdmin,$id);
  $_SESSION['msgs'] = $msgs;
  $_SESSION['isadmin'] = $isAdmin;
 } else {
   header("location:logout.php");
 }

// echo '<div style="background:white">';
// var_dump($_SESSION);
// echo '</div>';
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
