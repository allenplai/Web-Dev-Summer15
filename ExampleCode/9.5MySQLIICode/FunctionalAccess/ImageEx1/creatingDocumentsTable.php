<?php
	require_once("support.php");	

	$host = "localhost";
	$user = "student";
	$password = "goodbyeWorld";
	$database = "myDB";
	$table = "docs";
	$db = connectToDB($host, $user, $password, $database);
	
	$sqlQuery = "create table $table (docName varchar(20), docMimeType varchar(512), docData longblob)";
	$result = mysqli_query($db, $sqlQuery);
	if ($result) {
		$body = "<h3>Table $table has been created.</h3>";
	} else { 				   ;
		$body = "<h3>Creating $table failed: ".mysqli_error($db)." </h3>";
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