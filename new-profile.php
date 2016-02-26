<?php

    require_once('massgeekery_fns.php');
    require_once('db_fns.php');
    session_start();
    
    echo $_SESSION['valid_user'];
    $user =$_SESSION['valid_user'];
    echo $user;
    echo session_id();
    member_navigation();
    $conn = db_connect();
    echo "<br>";
    //Code that gets the users memberID
    $sql3 = "select `memberID` FROM `members` WHERE `username` like '$user'";
    $result2 = $conn->query($sql3) or die($sql3."<br/><br/>".mysql_error());
    $row = mysqli_fetch_array($result2, MYSQL_ASSOC);
    echo $row['memberID'];

    $sql = "select distinct`title`,`fandomID` from `fandom`";
    $result0 = $conn->query($sql) or die($sql."<br/><br/>".mysql_error());
    //gets anime title, then stores the values in an array
    $sql2 = "select `title` from `fandom` join `fandomMedium` on fandomMedium.fandomID = fandom.fandomID where `mediumID` like '1'";
    $result = $conn->query($sql2) or die($sql2."<br/><br/>".mysql_error());
  
    //$result2 = $conn->query($sql3) or die($sql3."<br/><br/>".mysql_error());
    //while($row = mysqli_fetch_array($result2, MYSQL_ASSOC)){
      //  echo $row['title']." ".$row['mediumID'];
        //echo "<br>";
        
    //}

    

    //$result = $conn->query($sql) or die($sql."<br/><br/>".mysql_error());
//displays all members in table. table links to members individual profile.

  
?>

<div class="container page-width">
<form class="form-horizontal" method="post" action="updateProfile.php">
<fieldset>

<!-- Form Name -->
<legend>Let's fill in your profile!</legend>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="about">Add a description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="about" name="about"></textarea>
  </div>
</div>


<!-- Select Type of fan -->
<div class="form-group col-md-8">
  <label class="col-md-8 control-label" for="fantypes">What type of fan are you?</label>
  <div class="col-md-4">
    <select id="fantype" name="fantype" class="form-control">
      <option value="0" selected="selected">Select One...</option>
      <option value="1" id="1">Overall Geek - Enjoys a multitude of mediums.</option>
      <option value="2" id="2">Film Fanatic- Someone who is a fan of movies.</option>
      <option value="3" id="3">Reader - Enjoys the written word.</option>
      <option value="4" id="4">Gamer - Spends various amounts of time playing video gmaes.</option>
      <option value="5" id="5">Watcher - Watches a lot of television.</option>
      <option value="6" id="6">Otaku - Has a perference for Asian comics and cartoons (Anime/Manga).</option>
      <option value="7" id="7">Noob - New to fandoms.</option>
    </select>
  </div>
</div>
<br>
<!-- Multiple Checkboxes -->
<div class="form-group">
    <div class="container anime half-width">
        <label class="col-md-8 control-label pull-left" for="fandoms">Choose some fandoms from the list below</label><br>

        <ul id="fandomList" class="pull-left">

        <?php 
            while($row0 = mysqli_fetch_array($result0, MYSQL_ASSOC)){
            //echo $row2['title'];
            echo '<li"><input type="checkbox" name="fanlist[]" value="'.$row0['title'].'" />'.$row0['title']." "." "." ";
            echo "</li><br>";
            //echo '<input type="checkbox" name="animes[]" value="'.$row2['title'].'" />'.$row2['title'].'<br>';
            }
            ?>
        </ul>
    </div>
    </div>
    

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save Profile</button>
  </div>
</div>

</fieldset>
</form>
</div>