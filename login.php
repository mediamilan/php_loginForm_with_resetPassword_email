<?php 
	$valid_cookie = false;
	if(isset($_COOKIE["MudmapLog"])) {
		require_once ('include/functions.php');
	}
	
	if(!$valid_cookie) {
		if (isset($_POST['map_loginSubmit'])) { 
			require_once ('include/login_chk.php');
		}
	}
	
	$logout = $_GET['logout'];
	if($logout == "success"){
		$err_msg .= "<li>You have been succesfully logged out.</li>";
	}
	
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html xmlns="http://www.w3.org/1999/xhtml" class="ie7"><![endif]-->

<!--[if lte IE 8]>              <html xmlns="http://www.w3.org/1999/xhtml" class="ie8"><![endif]-->

<!--[if (gte IE 9)|!(IE)]><!--> <html xmlns="http://www.w3.org/1999/xhtml" class="not-ie">  <!--<![endif]-->
<head>
	<title>The Mud Map Project - 4WD Map of Australia</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/form-style.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="js/jquery-1.9.0.js"></script>
	<script src="js/form.js"></script>
	<script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
</head>

<body>
<div id="inner"> <!-- Begin inner -->
 <div id="container"> <!-- Begin container -->
    <div class="grid">
    <div class="grid_1">
    <h1>Mud Map account features</h1>
    <div class="grid_3">
    <div class="b1">
    <h2>Download offline maps</h2>
    <p>Browse over 60,000 outdoor activity maps. Purchase<br /> and download for offline use with Mud Map apps.</p>
    </div>
    <div class="b2">
    <h2>Plan your trips</h2>
    <p>Explore awesome destination and plan your trip<br /> from any Mac or PC.</p>
    </div>
    <div class="b3">
    <h2>Replay your journey</h2>
    <p>View your tracks, pins and photos. Manage and <br />sync your data across all devices.</p>
    </div>
    <div class="b4">
    <h2>Share your adventures</h2>
    <p>Publish your trips and share with friends across all<br /> your social networks.</p>
    </div>
    </div>
    </div>
    <!-- End grid_1 -->
    
    <div class="grid_2">
    <h1>Sign In</h1>
    <div class="grid_4">
    <div class="section">
    
		<?php if ($err_msg != "") { ?>
			<div id="error">
				<ul>
					<?php echo $err_msg; ?>
				</ul>
			</div>
		<?php } ?>	
		
		<?php if(!$valid_cookie) { ?>
			
			<form method="post" id="loginForm" action="">
				
				<p>
					<label class="only-IE" for="map_email">Email ID</label>
					<input id="email" name="map_email" type="text" class="text" value="<?php echo $_POST['map_email']; ?>" placeholder="Email ID" />
					
				</p>
				<p>
					<label class="only-IE" for="map_password">Password</label>
					<input id="pass1" name="map_password" type="password" class="Password" value="<?php echo $_POST['map_password']; ?>" placeholder="Password" />
				</p>
				<p>
					<input name="map_remember" type="checkbox" value="Yes" /> Remember Me
				</p>
				
				<p>
					<input id="send" name="map_loginSubmit" type="submit" value="Send" />
				</p>
			</form>
		
		<?php } else { ?>
			
			<div id="error" class="valid">
				<ul>
					<li><strong><em>Congratulations</em> <?php echo $firstName_cookie . " " . $lastName_cookie; ?></strong> You are logged in.</li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			
		<?php } //END CHECK IF SUCCESSFUL LOGIN  ?>
		
    </div>
    </div>
    </div>
    <!-- End grid_2 -->
    </div>
  
 </div> <!-- End of container -->

</div> <!-- End inner -->
<script type="text/javascript">
		$(function () {
			$("#country_id").selectbox();
		});
		</script>
</body>
</html>
