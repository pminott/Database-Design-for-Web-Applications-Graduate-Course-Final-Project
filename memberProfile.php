<?php

    require_once('massgeekery_fns.php');
    require_once('db_fns.php');

    $conn = db_connect();
    session_start();

    $user =$_SESSION['valid_user'];
    
//gets the member ID for page
    if (isset($_POST['memberID'])){
        $_SESSION['current_profile']=$_POST['memberID'];
        }
    $memberID = $_SESSION['current_profile'];
    echo $memberID;
    member_navigation();
    
    $sql = "select `memberID`,`username`,`image`,`about` FROM `members` WHERE `memberID` like '$memberID'";
    $result = $conn->query($sql) or die($sql."<br/><br/>".mysql_error());
    $row = mysqli_fetch_array($result, MYSQL_ASSOC);

    //if user chooses their memberpage it goes to their profile page.
    if($row['username'] == $user){
        header("Location: http://localhost/is667/source/massGeekery/my_profile.php");
    exit();
        
    }
    //$memberID=$row['memberID'];
    $user=$row['username'];
    $toUser=$user;
    //imageUpload($image);

    //$result = $conn->query($sql) or die($sql."<br/><br/>".mysql_error());
//displays all members in table. table links to members individual profile.
    $path="./profilePictures/";
    //$row = mysqli_fetch_array($result, MYSQL_ASSOC);
    $sql4 = "SELECT * FROM `messages` where `fromMember` like '$user%'";
    $result3 = $conn->query($sql4) or die($sql4."<br/><br/>".mysql_error());
    //$row2 = mysqli_fetch_array($result3, MYSQL_ASSOC);
    //echo $row2['fromMember'];
    $sql5 = "SELECT * FROM `messages` where `toMember` like '$user%'";
    $result4 = $conn->query($sql5) or die($sql5."<br/><br/>".mysql_error());
?>

<html>

    <body>
        <div class="container-fluid page-width">
            <?php 
                echo '<h2>'.$user.'</h2>';
                echo "<br>";
            ?>
            <div class="row neighborhood-guides">
                <div class="col-md-2">
                
            <?php 
                echo '<br>';
                echo '<div class="pull-left"><img class="profile"src='.$path.$row['image'].' class ="center-block"></div>';
                echo '<p class="text-center"><a href="#" class="btn btn-primary " data-toggle="modal" data-target="#imageModal">Change Profile Picture</a></p>'; 
            ?> 
                </div>
                
                <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby = "myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload a Picture</h4>
      </div>
        
      <div class="modal-body">
        <div class="container-fluid">
            <form action="imageUpload.php" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000"/>
                <p><strong>Browse for File:</strong> 
                    <input type="file" name="fileupload"/></p> 
                
                <button class="btn btn-primary pull-right"type="submit" value="upload!">Upload!</button>
            </form>
            </div> 
      </div>
      
    </div>
  </div>
                    </div>
                <br>
                <div class="col-md-8">
            <?php 
                echo '<h4>'.$row['about'].'</h4>';
                echo'<br>';
                
            ?>
                    <br>
                </div>
                <br>
            </div>
        </div>
         <script  src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./js/bootstrap.min.js"></script>
    </body>

</html>

<html>
    <body>
        <div class="container">
            <br><br>
            <a href="#" class="btn btn-success "data-toggle="modal" data-target="#messageModal">Send a Message</a>
            <a href="#" class="btn btn-success">Follow</a>
        
        </div>
        
    
        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby = "myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
        <h4 class="modal-title" id="myModalLabel">Send <?php echo $user; ?> a Message</h4>
      </div>
        
      <div class="modal-body">
        <div class="container-fluid">
            
            <form class="form-horizontal" action="sendMessage.php" enctype="multipart/form-data" method="post">
<fieldset>

<!-- Form Name -->
<div>
<input id="toUser" name="toUser" type="text" placeholder="" class="form-control input-md hidden"> <?php $user?>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Subject</label>  
  <div class="col-md-4">
  <input id="subject" name="subject" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="mess">Message</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="mess" name="mess"></textarea>
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group hidden">
  <label class="col-md-4 control-label hidden" for="radios">Send Anonymous Message</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="radios-0">
      <input class="hidden "type="radio" name="toUser" id="toUser" value="<?php echo $toUser?>" checked="checked">
      <?php echo $toUser?>
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="radios" id="radios-1" value="2">
      No
    </label>
  </div>
</div>    
    
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-success">Send Message!!</button>
  </div>
</div>

</fieldset>
</form>
            
            
            
            </div> 
      </div>
      
    </div>
  </div>
                    </div>
        
    </body>

</html>

<?php 
//prints the members fandoms table
    echo '<div class="container"><h3 class="pull-left">Fandoms</h3>';
    echo '<br>';
    
        

    echo '</div>';
?>
<html>
    <body>
        <div class="container ">
<?php

    $sql2 = "SELECT `memberID`, `fandomID` FROM `memberFandom` WHERE `memberID` like '$memberID'";
    $result2 = $conn->query($sql2) or die($sql2."<br/><br/>".mysql_error());
    
    while($row2 = mysqli_fetch_array($result2, MYSQL_ASSOC)){
        $fandomID=$row2['fandomID'];
        $sql3 = "SELECT `title`,`fandomID` FROM `fandom` where `fandomID` like '$fandomID'";
        $result3 = $conn->query($sql3) or die($sql3."<br/><br/>".mysql_error());
        $row3 = mysqli_fetch_array($result3, MYSQL_ASSOC);
        echo $row3['title'].", ";
    } 
?>
    </div>
        </body>
    </html>





