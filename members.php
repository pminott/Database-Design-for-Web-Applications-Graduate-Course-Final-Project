<?php

    require_once('massgeekery_fns.php');
    require_once('db_fns.php');

    $conn = db_connect();

    member_navigation();
    
    $sql = "SELECT `memberID`,`username`,`about`,`image` FROM `members`";

    $result = $conn->query($sql) or die($sql."<br/><br/>".mysql_error());
//displays all members in table. table links to members individual profile.

  
?>
<html>
    <body>
        <div class="container">
            <h1>Members</h1>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <td>Picture</td>
                        <td>Username</td>
                        <td>Description</td>
                    </tr>
                </thead>
            <tbody>
<?php  
    $num_results = mysqli_num_rows($result);
    //echo $num_results;
    $path="./profilePictures/";
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
?>
                
                <tr>
                    <td> <?php echo '<img class="profile"               src='.$path.$row['image'].' >';?></td>
                    <td><?php echo $row['username']." "." ";?></td>
                    <td><?php echo $row['about'].'<form class="form-horizontal" action="memberProfile.php" enctype="multipart/form-data" method="post">
<fieldset>
        <input class="hidden" type="radio" name="memberID" id="memberID" value="'.$row['memberID'].'" checked="checked">
                <button type="submit" class="btn btn-primary text-center">View '.$row['username'].'\'s profile!</button>
                </fieldset>
                </form>' ;?><br>
                        
                    </td>
                </tr>
        
        
        <?php
    }
    
?>              </tbody>    
            </table>
        </div>
    </body>
</html>
<?php 
    display_footer(); 
?>
    



