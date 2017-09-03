<?php
	require_once("support.php");	

	$host = "localhost";
	$user = "student";
	$password = "goodbyeWorld";
	$database = "myDB";
	$table = "friends";
	$db = connectToDB($host, $user, $password, $database);
	
	/* someone to be added to table */
	$name = "Ben";
	$gender = "M";
	$salary = 7777;
	$id = 1111;
	$sqlQuery = sprintf("insert into $table (name,gender, salary, id) values ('%s', '%s', %s, %s)", 
				$name, $gender, $salary, $id);
	$result = mysqli_query($db, $sqlQuery);
	if ($result) {
		$body = "<h3>The entry has been added to the database</h3>";
	} else { 				   
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