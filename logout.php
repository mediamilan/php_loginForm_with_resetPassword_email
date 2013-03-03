<?php 
	if(isset($_COOKIE["MudmapLog"])) {
		setcookie( "MudmapLog", $escapedEmail, time()-60*60*24*30 );
		header("Location: login.php?logout=success");
		
	}
?>