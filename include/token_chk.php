<?php require_once ('include/conn.php'); ?>
<?php require_once ('include/validation.php'); ?>
<?php
	
	$error_msg ="";
	$valid_token = false; //Valid Token
	
	$sgn_time = date("Y-m-d H:i:s");
	
	//END VALIDATING THE FIELDS
	
	/*******************
	START PROCESS THE FORM
	*******************/
	if( $url_token ) {
		
		//CONNECT TO DB
		mysql_select_db( DB_NAME , $conn);
		
		$query = "select * from mump_pwdtoken where mu_email = '$email_token' and mu_token = '$url_token' ; ";
		$query_db = mysql_query($query);
		$query_resultRow = mysql_fetch_array($query_db);
		
		if (!$query_resultRow) {
			$err_msg .= "<li>The given url is not correct.</li>";
		} else {
			$valid_token = true;
		}
		
	} //CHECK IF BOTH EMAIL AND PASSWORD ENTERED
	
	/*******************
	END PROCESS THE FORM
	*******************/
	
	
	
?>