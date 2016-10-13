<?php
session_start();
if (isset($_SESSION['user'])) {
 } else {
   header("location:home");
 }
include_once 'vendors/functions.php';
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
