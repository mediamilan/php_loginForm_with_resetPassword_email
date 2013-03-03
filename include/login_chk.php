<?php require_once ('include/conn.php'); ?>
<?php require_once ('include/validation.php'); ?>
<?php
	
	$error_msg ="";
	$set_cookie = false;
	$sucs_email = "NO"; //SUCCESSFUL EMAIL CHECK
	
	if( (isset($_POST['map_remember'])) && ($_POST['map_remember'] == 'Yes') ) {
		//SET COOKIE
		$set_cookie = true;
	}
	
	/*******************
	PROCESS EMAIL
	*******************/
	
	if(trim($_POST['map_email'])){
		
		//VALIDATE EMAIL ID
		if (validateEmail( $_POST["map_email"] )){
			
			$sgn_email = sanitize($_POST['map_email']);
			$sucs_email = "SUCCESS";
			
		} else {
			$err_msg .= "<li>Not a valid Email ID</li>";
		}
		
	} else { 
		$err_msg .= "<li>Email cannot be left empty</li>"; 
	};
	
	/*******************
	END PROCESS EMAIL
	*******************/
	
	if(trim($_POST['map_password'])){ 
		$sgn_password = sanitize($_POST['map_password']);
	} else { $err_msg .= "<li>Password cannot be left empty.</li>"; };
	
	$sgn_time = date("Y-m-d H:i:s");
	
	//END VALIDATING THE FIELDS
	
	
	/*******************
	START PROCESS THE FORM
	*******************/
	if( ( $sucs_email == "SUCCESS") && (trim($_POST['map_password'])) ) {
		
		//use whatever escaping function your db requires this is very important.
		$escapedEmail = mysql_real_escape_string($sgn_email); 
		$escapedPW = mysql_real_escape_string($sgn_password);
		
		//CONNECT TO DB
		mysql_select_db( DB_NAME , $conn);
		
		$saltQuery = "select mu_salt from mump_user where mu_email = '$escapedEmail';";
		$query_resultRow = mysql_query($saltQuery);
		
		if (!$query_resultRow) {
			
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
			
		} else {
			$row = mysql_fetch_assoc($query_resultRow);
			$salt = $row['mu_salt']; 
			
			$saltedPW =  $escapedPW . $salt;
			$hashedPW = hash('sha256', $saltedPW);
			
			//CONNECT TO DB
			mysql_select_db( DB_NAME , $conn);
			
			$query = "select * from mump_user where mu_email = '$escapedEmail' and mu_password = '$hashedPW'; ";
			$query_db = mysql_query($query);
			$query_resultRow = "";
			$query_resultRow = mysql_fetch_array($query_db);
			
			if (!$query_resultRow) {
				$err_msg .= "<li> Email ID or Password is Incorrect.</li>";
			} else {
				
				if ($set_cookie) {
					// Set a cookie that expires in 24 hours
					setcookie( "MudmapLog", $escapedEmail, time()+60*60*24*30 );
				} else {
					setcookie( "MudmapLog", $escapedEmail );
				}
			}
			
		}
		
	} //CHECK IF BOTH EMAIL AND PASSWORD ENTERED
	
	/*******************
	END PROCESS THE FORM
	*******************/
	
	
	
?>