<?php

    require_once('massgeekery_fns.php');
    require_once('db_fns.php');

    $conn = db_connect();
    session_start();

    echo $_SESSION['valid_user'];
    $user =$_SESSION['valid_user'];
    echo $user;
    echo session_id();

    member_navigation();
    $about = $_POST['about'];
    echo $_POST['about'];
    $fantype=$_POST['fantype'];
    echo $_POST['fantype'];
    
    $sql = "select `memberID`,`username`,`image`,`about` FROM `members` WHERE `username` like '$user'";
    $result = $conn->query($sql) or die($sql."<br/><br/>".mysql_error());
    $row = mysqli_fetch_array($result, MYSQL_ASSOC);
    echo $row['memberID'];
    $memberID=$row['memberID'];
    updateProfile($memberID,$fantype,$about);
    //imageUpload($image);

    //$result = $conn->query($sql) or die($sql."<br/><br/>".mysql_error());
//displays all members in table. table links to members individual profile.
    $path="./profilePictures/";
    //$row = mysqli_fetch_array($result, MYSQL_ASSOC);

//inserts the members fandoms into the fandomMember table
if( isset($_POST['fanlist']) && is_array($_POST['fanlist']) ) 
    {foreach($_POST['fanlist'] as $title) {
        
        $sql2 = "select `fandomID` FROM `fandom` WHERE `title` like '$title'";
        $result2 = $conn->query($sql2) or die($sql2."<br><br>".mysql_error());
        $row2 = mysqli_fetch_array($result2, MYSQL_ASSOC);
        $fandomID =$row2['fandomID'];
        
        // -- insert into database call might go here
        // -- insert into database call might go here
        $sql3 = "insert into `memberFandom`(`memberID`, `fandomID`) VALUES ('$memberID.','$fandomID')";
        
        $result3 = $conn->query($sql3) or die($sql3."<br/><br/>".mysql_error());
        }
}
    //once profile is update, redirects member to their profile page
    header("Location: http://localhost/is667/source/massGeekery/my_profile.php");
    exit();

?>