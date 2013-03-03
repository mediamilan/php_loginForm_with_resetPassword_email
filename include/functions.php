<?php require_once ('include/conn.php'); ?>
<?php require_once ('include/validation.php'); ?>
<?php 
	
	$cookie_email = $_COOKIE["MudmapLog"];
	$escapedEmail = mysql_real_escape_string($cookie_email); 
	
	//CONNECT TO DB
	mysql_select_db( DB_NAME , $conn);
	
	$query = "select * from mump_user where mu_email = '$escapedEmail'; ";
	$query_db = mysql_query($query);
	$query_resultRow = "";
	$query_resultRow = mysql_fetch_array($query_db);
	
	$firstName_cookie = $query_resultRow[mu_firstName];
	$lastName_cookie = $query_resultRow[mu_lastName];
	
	if ($query_resultRow) {
		$valid_cookie = true;
	}
	
?>