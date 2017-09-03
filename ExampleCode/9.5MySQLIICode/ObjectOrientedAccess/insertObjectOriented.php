<?php
	/* This example assumes a table friends in the database myDB  */
	/* exists.  The table has at least two fields: name and id.   */
	/* The script inserts a record.								  */
	
	require_once "dbLogin.php"; 

	/* Connecting to the database */		
	$db_connection = new mysqli($host, $user, $password, $database);
	if ($db_connection->connect_error) {
		die($db_connection->connect_error);
	} else {
		echo "Connection to database established<br><br>";
	}
	
	/* Query */
	$query = "insert into friends values('Luke', 'M', 3456, 200)";
			
	/* Executing query */
	$result = $db_connection->query($query);
	if (!$result) {
		die("Insertion failed: " . $db_connection->error);
	} else {
		echo "Insertion completed.<br>";
	}
	
	/* Closing connection */
	$db_connection->close();
?>