<?php
session_start();
session_unset(); 

    $_SESSION['FBID'] = NULL;
    $_SESSION['id'] = NULL;
    $_SESSION['isadmin'] =  NULL;
    $_SESSION['username'] =  NULL;
    $_SESSION['EMAIL'] =  NULL;
header("Location: index.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com");
?>
