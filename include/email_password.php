<?php require_once ('include/conn.php'); ?>
<?php require_once ('include/validation.php'); ?>
<?php
	
	$error_msg ="";
	$sucs_email = "NO"; //SUCCESSFUL EMAIL CHECK
	
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
	
	$sgn_time = date("Y-m-d H:i:s");
	
	//END VALIDATING THE FIELDS
	
	/*******************
	START PROCESS THE FORM
	*******************/
	if( ( $sucs_email == "SUCCESS") ) {
		
		//use whatever escaping function your db requires this is very important.
		$escapedEmail = mysql_real_escape_string($sgn_email); 
		
		//CONNECT TO DB
		mysql_select_db( DB_NAME , $conn);
		
		$query = "select * from mump_user where mu_email = '$escapedEmail'; ";
		$query_db = mysql_query($query);
		$query_resultRow = mysql_fetch_array($query_db);
		
		if (!$query_resultRow) {
			$err_msg .= "<li>The given Email ID does not match in our records.</li>";
		} else {
			$token = md5($escapedEmail.time);
			$reset_url = DOMAIN_URL."/resetpassword.php?tkt=".$token."&email=".$escapedEmail;
			print_a($reset_url);
			//CONNECT TO DB
			mysql_select_db( DB_NAME , $conn);
			
			$inset_query = "insert into mump_pwdtoken (id, mu_email, mu_token) 
											values ('', '$escapedEmail', '$token'); ";
			
			if (!mysql_query( $inset_query, $conn)){
				
				die('Error: ' . mysql_error());
			
			} else {
			
				$from_mail = ADMIN_EMAIL;
				$to_mail = $escapedEmail;
				
				$headers = "From: ".$from_mail."\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
				$headers .= "X-Priority: 1\r\n";
				$headers .= "X-MSMail-Priority: High\n";
				$headers .= "X-Mailer: PHP". phpversion() ."\r\n";
				
				$email_subject = "Password Requeset URL from MudMaps";
				
				$body = "Password Reset URL!<br/>Kindly go to {$reset_url} and check for the details.";
				
				//mail($to_mail, $email_subject, $body, $headers );
				
				//if(mail($to,$subject,$message,$headers)) { 
					$err_msg .= "<li>Reset Password Link has been sent to your email id!.</li>";
					$mail_sent = true;
				//} else { 
					// echo "There was a problem"; 
				//}  
			}
		
		}
		
	} //CHECK IF BOTH EMAIL AND PASSWORD ENTERED
	
	/*******************
	END PROCESS THE FORM
	*******************/

?>