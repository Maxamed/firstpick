<?php
if($isAdmin===0){
  session_unset();
  $_SESSION['FBID'] = NULL;
  $_SESSION['id'] = NULL;
  $_SESSION['isadmin'] =  NULL;
  $_SESSION['username'] =  NULL;
  $_SESSION['EMAIL'] =  NULL;
  header("Location: index.php");
  exit;
}
?>
