<?php
	require_once("support.php");	

	$host = "localhost";
	$user = "student";
	$password = "goodbyeWorld";
	$database = "myDB";
	$table = "docs";
	$db = connectToDB($host, $user, $password, $database);
	
	// $fileToRetrieve = "JimHenson.jpg";
	$fileToRetrieve = "lecture.pdf";
	
	$sqlQuery = "select docData, docMimeType from $table where docName = '{$fileToRetrieve}'";
	$result = mysqli_query($db, $sqlQuery);
	if ($result) {
		$recordArray = mysqli_fetch_assoc($result);
		header("Content-type: "."{$recordArray['docMimeType']}");
		echo $recordArray['docData'];
		mysqli_free_result($result);
	} else { 				   ;
		$body = "<h3>Failed to retrieve document $fileToRetrieve: ".mysqli_error($db)." </h3>";
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