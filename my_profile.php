<?php

    require_once('massgeekery_fns.php');
    require_once('db_fns.php');

    $conn = db_connect();
    session_start();

    $user =$_SESSION['valid_user'];
    

    member_navigation();
    
    $sql = "select `memberID`,`username`,`image`,`about` FROM `members` WHERE `username` like '$user'";
    $result = $conn->query($sql) or die($sql."<br/><br/>".mysql_error());
    $row = mysqli_fetch_array($result, MYSQL_ASSOC);
    $memberID=$row['memberID'];
    
    
    

    //imageUpload($image);
    
    //$result = $conn->query($sql) or die($sql."<br/><br/>".mysql_error());
//displays all members in table. table links to members individual profile.
    $path="./profilePictures/";
    //$row = mysqli_fetch_array($result, MYSQL_ASSOC);
    
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
                echo '<div class="pull-left"><img class="profile" src='.$path.$row['image'].' class ="center-block"></div>';
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

<?php 

//get member's fandom list
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
    
            <?php
//prints the sent messages table
    echo '<div class="container"><h3 class="pull-left">Messages</h3>';
    echo '<br>';
    
    echo '</div>';
?>

        <div class="container ">
            
            
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <td>Sent to</td>
                        <td>Subject</td>
                        <td>Message</td>
                        <td></td>
                    </tr>
                </thead>
            <tbody>
<?php  
    //echo $num_results;
    $path="./profilePictures/";
    $sql4 = "SELECT * FROM `messages` where `fromMember` like '$user%' or `toMember` like '$user%'";
    $result4 = $conn->query($sql4) or die($sql4."<br/><br/>".mysql_error());
    while ($row3 = mysqli_fetch_array($result4, MYSQL_ASSOC)) {
?>
                <tr>
                    <td> <?php echo $row3['toMember'];?></td>
                    <td> <?php echo $row3['subject']." "." ";?></td>
                    <td> <?php echo $row3['message'];?></td>
                    <td><?php if ($row3['toMember']==$user) {
                        echo '<a href="#" class="btn btn-success">Reply</a>';
    }?></td>
                </tr>
           
        <?php
    }
     
   
?>              </tbody>    
            </table>
        </div>
    </body>
</html>


