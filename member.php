<?php

// include function files for this application
require_once('massgeekery_fns.php');
session_start();

//create short variable names
if (isset($_POST['username']))
{
    $username =$_POST['username'];
    echo $username;
    
}
if (isset($_POST['password']))
{
    $password = $_POST['password'];
    echo $password;
}
if (isset($username) && isset($password)) {
// they have just tried logging in
  try  {
    login($username, $password);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
      echo $username;
      header("Location: http://localhost/is667/finalproject/my_profile.php");
    exit();
  }
  catch(Exception $e)  {
    // unsuccessful login
    do_html_header('Problem:');
    echo 'You could not be logged in.
          You must be logged in to view this page.';
    do_html_url('login.php', 'Login');
    do_html_footer();
    exit;
  }
}
?>
