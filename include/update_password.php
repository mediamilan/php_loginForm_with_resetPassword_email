<?php require_once ('include/conn.php'); ?>
<?php require_once ('include/validation.php'); ?>
<?php
	
	$error_msg ="";
	$sgn_time = date("Y-m-d H:i:s");
	
	/*******************
	PROCESS EMAIL
	*******************/
	
	if(trim($_POST['map_password'])){
		$new_password = $_POST['map_password'];
		$user_email = $_POST['map_email'];
		
		$escapedEmail = mysql_real_escape_string($user_email); 
		$escapedPW = mysql_real_escape_string($new_password);

		# generate a random salt to use for this account

		$size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
		$salt = bin2hex(mcrypt_create_iv($size, MCRYPT_RAND));
		
		$saltedPW =  $escapedPW . $salt;
		$hashedPW = hash('sha256', $saltedPW);
		
		//CONNECT TO DB
		mysql_select_db( DB_NAME , $conn);
		
		$query_resultRow = mysql_query("UPDATE mump_user SET mu_password='$hashedPW', mu_salt='$salt' WHERE mu_email = '$escapedEmail' ", $conn);
		
		
		if (!$query_resultRow) {
			$err_msg .= "<li>The Record's could not be updated.</li>";
		} else {
			$err_msg .= "<li>Your Password has been updated.</li>";
			$pwd_updated = "Yes";
		}
		
	} else { 
		$err_msg .= "<li>Password field cannot be left empty!</li>"; 
	};
	
	
	/*******************
	END PROCESS THE FORM
	*******************/
	
	
	
?>