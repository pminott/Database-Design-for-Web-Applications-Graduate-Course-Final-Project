<?php
require_once('massgeekery_fns.php');
require_once('db_fns.php');
session_start();
$user =$_SESSION['valid_user'];

$file_dir = "./profilePictures";

foreach($_FILES as $file_name => $file_array) {
	//echo "path: ".$file_array["tmp_name"]."<br/>\n";
	//echo "name: ".$file_array["name"]."<br/>\n";
	//echo "type: ".$file_array["type"]."<br/>\n";
	//echo "size: ".$file_array["size"]."<br/>\n";

	if (is_uploaded_file($file_array["tmp_name"])) {
		move_uploaded_file($file_array["tmp_name"], "$file_dir/".$file_array["name"]) or die ("Couldn't copy");
		//echo "file was moved!<br/>";
        $conn = db_connect();
        //echo $user;
        $result = $conn->query("update members set `image` = '".$file_array["name"]."'
        where username='".$user."'");
        
        header("Location: http://localhost/is667/finalproject/my_profile.php");
        exit();
	}
}
?>
