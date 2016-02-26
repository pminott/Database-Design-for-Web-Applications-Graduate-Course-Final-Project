<?php

// include function files for this application
require_once('massgeekery_fns.php');
session_start();
$old_user = $_SESSION['valid_user'];

// store  to test if they *were* logged in
unset($_SESSION['valid_user']);
$result_dest = session_destroy();

// start output html
do_html_header('Logging Out');

if (!empty($old_user)) {
  if ($result_dest)  {
    header("Location: http://localhost/is667/finalproject/index.html");
    exit();

  } else {
   // they were logged in and could not be logged out
    echo 'Could not log you out.<br />';
  }
} 



?>
