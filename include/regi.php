<?php require_once ('include/conn.php'); ?>
<?php require_once ('include/validation.php'); ?>
<?php 

	$error_msg ="";
	$success_signUp = false;
	$success_dbEntry = false;
	$sucs_email = "NO"; //SUCCESSFUL EMAIL CHECK
	
	if(trim($_POST['map_firstName'])){ 
		$sgn_firstName = sanitize($_POST['map_firstName']);
	} else { $err_msg .= "<li>First Name cannot be empty.</li>"; };
	
	if(trim($_POST['map_lastName'])){ 
		$sgn_lastName = sanitize($_POST['map_lastName']);
	} else { $err_msg .= "<li>Last Name cannot be empty.</li>"; };
	
	/*******************
	PROCESS EMAIL
	*******************/
	
	if(trim($_POST['map_email'])){
		
		//VALIDATE EMAIL ID
		if (validateEmail( $_POST["map_email"] )){
			$sgn_email = sanitize($_POST['map_email']);
			
			//CHECK NOT EMPTY CONFIRM EMAIL
			if(trim($_POST['map_confirmEmail'])){
				
				//VALIDATE CONFIRM EMAIL ID
				if (validateEmail( $_POST["map_confirmEmail"] )){
					$sgn_confirmEmail = sanitize($_POST['map_confirmEmail']);
					
					if( $sgn_email == $sgn_confirmEmail ) {
					
						//CONNECT TO DB
						mysql_select_db( DB_NAME , $conn);
		
						$query_db = mysql_query('
							SELECT *
							FROM `mump_user`
							WHERE `mu_email` LIKE "'.$sgn_email.'"');
						
						$query_resultRow = mysql_fetch_array($query_db);
						
						if ( ($query_resultRow[mu_email]) == ($sgn_email) ) {
							$err_msg .= "<li>Email ID already taken. </li>";
						} else {
							//SUCCESSFUL UNIQUE EMAIL
							$sucs_email = "SUCCESS";
						}
		
					} else {
						$err_msg .= "<li>Please enter the same Confirm Email ID. </li>";
					}
					
				} else {
					$err_msg .= "<li>Not a valid Confirm Email ID</li>";
				}
				
			} else { $err_msg .= "<li>Confirm Email cannot be left empty.</li>"; };
			
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
	
	if(trim($_POST['map_country'])){ 
		$sgn_country = sanitize($_POST['map_country']);
	} else { $err_msg .= "<li>Please select a Country. </li>"; };
	
	$sgn_time = date("Y-m-d H:i:s");
	
	//END VALIDATING THE FIELDS
	
	
	/*******************
	START PROCESS THE FORM
	*******************/
	if( ($sucs_email == "SUCCESS") && (trim($_POST['map_password'])) && (trim($_POST['map_country'])) ) {
		$success_signUp = true;
		
		//CONNECT TO DB
		mysql_select_db( DB_NAME , $conn);
		
		//use whatever escaping function your db requires this is very important.
		$escapedEmail = mysql_real_escape_string($sgn_email); 
		$escapedPW = mysql_real_escape_string($sgn_password);

		# generate a random salt to use for this account

		$size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
		$salt = bin2hex(mcrypt_create_iv($size, MCRYPT_RAND));
		
		$saltedPW =  $escapedPW . $salt;
		$hashedPW = hash('sha256', $saltedPW);

		$inset_query = "insert into mump_user (id, mu_time, mu_firstName, mu_lastName, mu_email, mu_password, mu_salt, mu_country) 
								values ('', '$sgn_time', '$sgn_firstName', '$sgn_lastName', '$escapedEmail', '$hashedPW', '$salt', '$sgn_country'); ";
		
		if (!mysql_query( $inset_query, $conn)){
			die('Error: ' . mysql_error());
		} else {
			$success_dbEntry = true;
			setcookie( "MudmapLog", $escapedEmail );
		}
	}
	
	/*******************
	END PROCESS THE FORM
	*******************/
	
?>