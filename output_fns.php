<?php

function display_login_form() {
?>
<div class="container">
<form class="form-horizontal" method="post" action="member.php">
<fieldset>

<!-- Form Name -->
<legend>Member Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password </label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    <span class="help-block"><a href ="./register_form.php">Not a member?</span>
    <span class="help-block"><a href ="./forgot_form.php">Forgot your password?</span>
  </div>
</div>
</fieldset>
   
    <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button type="submit" id="login_form" name="login_form" class="btn btn-primary">Submit</button>
  </div>
</div>
    

</form>
</div> 
<?php
    
}

function display_registration_form() {
?>
    <html>
    <body>
    <div class="container">
    <form class="form-horizontal" method="post" action="register_new.php">
<fieldset>

<!-- Form Name -->
<legend>Member Sign Up</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fname">First Name</label>  
  <div class="col-md-4">
  <input id="fname" name="fname" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lname">Last Name</label>  
  <div class="col-md-4">
  <input id="lname" name="lname" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="email" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email2">Confirm Email</label>  
  <div class="col-md-4">
  <input id="email2" name="email2" type="email" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password </label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password2">Confirm password</label>
  <div class="col-md-4">
    <input id="password2" name="password2" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button type="submit" id="signup_form" name="signup_form" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>
</div>
 </body>
    </html>
<?php

}

function display_user_urls($url_array) {
  // display the table of URLs

  // set global variable, so we can test later if this is on the page
  global $bm_table;
  $bm_table = true;
?>
  <br />
  <form name="bm_table" action="delete_bms.php" method="post">
  <table width="300" cellpadding="2" cellspacing="0">
  <?php
  $color = "#cccccc";
  echo "<tr bgcolor=\"".$color."\"><td><strong>Bookmark</strong></td>";
  echo "<td><strong>Delete?</strong></td></tr>";
  if ((is_array($url_array)) && (count($url_array) > 0)) {
    foreach ($url_array as $url)  {
      if ($color == "#cccccc") {
        $color = "#ffffff";
      } else {
        $color = "#cccccc";
      }
      //remember to call htmlspecialchars() when we are displaying user data
      echo "<tr bgcolor=\"".$color."\"><td><a href=\"".$url."\">".htmlspecialchars($url)."</a></td>
            <td><input type=\"checkbox\" name=\"del_me[]\"
                value=\"".$url."\"/></td>
            </tr>";
    }
  } else {
    echo "<tr><td>No bookmarks on record</td></tr>";
  }
?>
  </table>
  </form>
<?php
}



function display_add_bm_form() {
  // display the form for people to ener a new bookmark in
?>
<form name="bm_table" action="add_bms.php" method="post">
<table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
<tr><td>New BM:</td>
<td><input type="text" name="new_url" value="http://"
     size="30" maxlength="255"/></td></tr>
<tr><td colspan="2" align="center">
    <input type="submit" value="Add bookmark"/></td></tr>
</table>
</form>
<?php
}

//displays navigation menu for non-members.  

function display_footer(){
?>
    <footer class="footer">
      <div class="container">
        <p class="text-muted pull-right"><a href="#">Contact</a></p>
      </div>
    </footer>
<?php 
}


function navigation(){
 ?>
<html>
  <head>
	
	<title>Mass Geekery</title>
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/anime.css" rel="stylesheet">

	
  </head>       
<div class="navbar navbar-static-top">
        <div class="container">
	    <a href = "#" class = "pull-left"><h2>Mass Geekery</h2></a>
                               <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                                    <span class = "icon-bar"></span>
                                    <span class = "icon-bar"></span>
                                    <span class = "icon-bar"></span>
                                </button>
                               
                            <div class = "collapse navbar-collapse navHeaderCollapse">
                               <ul class = "nav navbar-nav navbar-right">
                                    <li><a href = "#">About</a></li>
                                    <li><a href = "./members.php">Members</a></li>
                                    <li><a href = "#">Forum</a></li>
                                    <li><a href = "./login.php">Login</a></li>
                                </ul>
                            </div>
        </div>
    </div>
    </html>
<?php
    
}


function member_navigation(){
 ?>
<html>
  <head>
	
	<title>Mass Geekery</title>
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/anime.css" rel="stylesheet">
	
  </head>       
<div class="navbar navbar-static-top">
        <div class="container">
	    <a href = "#" class = "pull-left"><h2>Mass Geekery</h2></a>
                               <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                                    <span class = "icon-bar"></span>
                                    <span class = "icon-bar"></span>
                                    <span class = "icon-bar"></span>
                                </button>
                               
                            <div class = "collapse navbar-collapse navHeaderCollapse">
                               <ul class = "nav navbar-nav navbar-right">
                                    <li><a href = "#">About</a></li>
                                    <li><a href = "./my_profile.php">Profile</a></li>
                                    <li><a href = "./members.php">Members</a></li>
                                    <li><a href = "#">Forum</a></li>
                                    <li><a href = "./logout.php">Logout</a></li>
                                </ul>
                            </div>
        </div>
    </div>
    </html>
<?php
    
}

function display_profile(){
    
?>
<!DOCTYPE html>
<html>
  <head>
	
	<title>Mass Geekery</title>
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<link href="./css/anime.css" rel="stylesheet">
	
  </head>
  
  <body>
    <div class="navbar navbar-static-top">
        <div class="container">
	    <a href = "#" class = "pull-left"><h2>Mass Geekery</h2></a>
                               <button class = "navbar-toggle" data-toggle = "collapse" data-target = ".navHeaderCollapse">
                                    <span class = "icon-bar"></span>
                                    <span class = "icon-bar"></span>
                                    <span class = "icon-bar"></span>
                                </button>
                               
                            <div class = "collapse navbar-collapse navHeaderCollapse">
                               <ul class = "nav navbar-nav navbar-right">
                                    <li><a href = "#">About</a></li>
                                    <li><a href = "./member.php">Members</a></li>
                                    <li><a href = "#">Forum</a></li>
                                    <li data-toggle="modal" data-target="#myModal"><a href = "#">Login</a></li>
                                </ul>
                            </div>
        </div>
      
 </div>     
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby = "myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Member Login</h4>
      </div>
        
      <div class="modal-body">
        <div class="container-fluid">
            <form class="form-horizontal" method="post" action="member.php">
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password </label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    <span class="help-block"><a href ="./register_form.php">Not a member?</a></span>
    <span class="help-block"><a href ="#">Forgot your password?</a></span>
  </div>
</div>
</fieldset>
   
    <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button type="submit" id="login_form" name="login_form" class="btn btn-primary">Submit</button>
  </div>
</div>
    

</form>
        </div> 
      </div>
      
    </div>
  </div>
</div>

      
     
	<div class="neighborhood-guides">
        <div class = "container">
            <br>
            <div class="row">
                <div class ="col-md-2">
					<div class ="thumbnail">
                        <img src="./profilePictures/profile.png">
                    </div>
				</div>
                <div class ="col-md-10">
					<div class ="thumbnail">
                        
                    </div>
				</div>
        </div>
    </div>
	<div class ="learn-more">
		<div class = "container">
			<div class="row">
				<div class="col-md-4">
				<h3>Activities</h3>
				<p>From apartments and rooms to treehouses and boats: stay in unique spaces in 192 countries.</p>
				<p>
					<a href ="#"> See how to travel on Airbnb</a>
				</p>
			</div>
				<div class="col-md-4">
				<h3>Fandoms</h3>
				<p>Renting out your unused space could pay your bills or fund your next vacation.</p>
				<p>
					<a href = "#">Learn more about hosting</a>
				</p>
			</div>
				<div class="col-md-4">
				<h3>Messages</h3>
				<p>From Verified ID to our worldwide customer support team, we've got your back</p>
				<p>
					<a href = "#"> Learn about trust at Airbnd</a>
				</p>
			</div>
			</div>
		</div>
    </div>
      
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./js/bootstrap.min.js"></script>
  </body>
    <footer class="footer">
      <div class="container">
        <p class="text-muted pull-right"><a href="#">Contact</a></p>
      </div>
    </footer>
</html>
<?php 
}
?>
