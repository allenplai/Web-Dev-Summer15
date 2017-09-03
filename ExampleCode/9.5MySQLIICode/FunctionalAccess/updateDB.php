<?php
	require_once("support.php");	

	$host = "localhost";
	$user = "student";
	$password = "goodbyeWorld";
	$database = "myDB";
	$table = "friends";
	$db = connectToDB($host, $user, $password, $database);
	
	/* Friend to add to table */
	$name = "Ben";
	$gender = "M";
	$salary = 8888;
	$id = 999;
	$sqlQuery = sprintf("update $table set salary=%s,id=%s where name='%s'", $salary, $id, $name); 
	$result = mysqli_query($db, $sqlQuery);
	
	if ($result) {
		$body = "<h3>The entry has been updated</h3>";
	} else { 				   ;
		$body = "Inserting records failed.".mysqli_error($db);
	}
		
	/* Closing */
	mysqli_close($db);
	
	echo generatePage($body);

function connectToDB($host, $user, $password, $database) {
	$db = mysqli_connect($host, $user, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Connect failed.\n".mysqli_connect_error();
		exit();
	}
	return $db;
}
?>