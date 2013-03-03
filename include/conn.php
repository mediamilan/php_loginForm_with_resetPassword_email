<?php

	define('DB_HOST', "localhost"); // database location
	define('DB_NAME', "mudmap"); // database name
	define('DB_USER', "root"); // user name
	define('DB_PASS', ""); // password
	define('DOMAIN_URL', "https://mud-maps.com"); // DO NOT END THE URL WITH '/'
	define('ADMIN_EMAIL', "admin@mud-maps.com"); // DO NOT END THE URL WITH '/'
	
	$conn = mysql_connect( DB_HOST, DB_USER , DB_PASS);
	if (!$conn){
		die('Could not connect: ' . mysql_error());
	}
	
?>