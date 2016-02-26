<?php
require_once('massgeekery_fns.php');
require_once('db_fns.php');
$conn = db_connect();
session_start();
$fromUser = $_SESSION['valid_user'];
//echo "<br>".$fromUser;
$toUser = $_POST['toUser'];
//echo "<br>". $toUser;
$subject = $_POST['subject'];
//echo "<br>".$subject;
$message = $_POST['mess'];
$mess = $message;
//echo "<br>".$message;
//echo "<br>".$mess."<br>";



sendMessage($subject, $mess, $fromUser, $toUser);


function sendMessage($subject, $mess, $fromUser, $toUser){
    $conn = db_connect();
    $result= $conn->query("insert into messages(subject, message, fromMember, toMember) values ('".$subject."', '".$mess."', '".$fromUser."', '".$toUser."')");
    
    if (!$result) {
    throw new Exception('Could not add to database - please try again laterrr.');
    
    }
    else {
        
        reloadPage();

    
    }
}
function reloadPage(){
?>
<html>
<head>
    <title>Mass Geekery</title>
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/anime.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type="text/javascript">
    $(window).load(function(){
        $('#reloadProfile').modal('show');
    });
    </script>
</head>
<body>
<div class="modal fade" id="reloadProfile" tabindex="-1" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
        
      <div class="modal-body">
        <div class="container-fluid">
            <div class="alert alert-success text-center">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Congraduations!</strong> Message was sent
            </div><a href = "http://localhost/is667/source/massGeekery/memberProfile.php" class="pull-right btn btn-primary">Back to user profile!</a>
            </div> 
      </div>
      
    </div>
  </div>
</div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./js/bootstrap.min.js"></script>
</body>
</html>   
<?php    
}
?>
