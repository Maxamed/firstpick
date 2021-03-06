<?php
error_reporting(E_ALL);
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
    <meta name="description" content="Fuuty, the Amatuer football organisation site">
    <meta property="og:title" content="Fuuty">
    <meta property="og:description" content="Fuuty, the Amatuer football organisation site">
    <title>Fuuty</title>
    <link rel="stylesheet" href="assets/css/foundation.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/helper.css">
    <link rel="stylesheet" href="assets/css/icons.css">
    <style>
      .notificationBar {list-style-type: none; padding: none;margin:none;min-width:200px;}
          .notificationBar li {display:inline-block}
          .notificationBar li a{color:white;padding-right:5px;}
          .notify {width:100%;}
    </style>
  </head>
  <body>
