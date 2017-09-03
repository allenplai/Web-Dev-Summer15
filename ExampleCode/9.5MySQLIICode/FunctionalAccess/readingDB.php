<?php
	require_once("support.php");	

	$host = "localhost";
	$user = "student";
	$password = "goodbyeWorld";
	$database = "myDB";
	$table = "friends";
	$db = connectToDB($host, $user, $password, $database);
	
	$sqlQuery = sprintf("select * from %s", $table);
	$result = mysqli_query($db, $sqlQuery);
	if ($result) {
		$numberOfRows = mysqli_num_rows($result);
 	 	if ($numberOfRows == 0) {
			$body = "<h2>No entries exists in the table</h2>";
		} else {
			$body = "";
			while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		     	$name = $recordArray['name'];
				$gender = $recordArray['gender'];
				$salary = $recordArray['salary'];
				$body .= "Name: $name, Gender: $gender, Salary: $salary<br />";
     		}
		}
		mysqli_free_result($result);
	}  else {
		$body = "Retrieving records failed.".mysqli_error($db);
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