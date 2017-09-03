<?php
	require_once("support.php");	

	$host = "localhost";
	$user = "student";
	$password = "goodbyeWorld";
	$database = "myDB";
	$table = "friends";
	$db = connectToDB($host, $user, $password, $database);
	$body = "";
	
	/* Checking wehther magic quotes are set */
	if (get_magic_quotes_gpc()) {
		$body .= "<h2>Magic Quotes ON</h2>";	
	} else {
		$body .= "<h2>Magic Quotes OFF</h2>";
	}
	
	$scriptName = $_SERVER["PHP_SELF"];
	if (!isset($_POST['submitInfoButton'])) {
		$body .= <<<EOBODY
		<form action="$scriptName" method="post">
			<p>
				<strong>Name: </strong><input type="text" name="name" />
			</p>
			
			<!--We need the submit button-->
			<p>
				<input type="submit" name="submitInfoButton" />
			</p>
		</form>		
EOBODY;
	} else {
		$targetName = $_POST['name'];
		
		// The following statement is not necessary if magic quotes are on
		$targetName = mysqli_real_escape_string($db, $targetName);
		
		$body .= "Name is: $targetName<br />";
		$sqlQuery = sprintf("select * from $table where name = '%s';", $targetName);
		$body .= "Query is: $sqlQuery<br />";
		$result = mysqli_query($db, $sqlQuery);
		if ($result) {
			$numberOfRows = mysqli_num_rows($result);
 	 		if ($numberOfRows == 0) {
				$body .= "<h2>No entries exists in the table</h2>";
			} else {
				$body .= "";
				while ($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		     		$name = $recordArray['name'];
					$gender = $recordArray['gender'];
					$salary = $recordArray['salary'];
					$body .= "Name: $name, Gender: $gender, Salary: $salary<br />";
     			}
			}
			mysqli_free_result($result);
		} else {
			$body .= "Retrieving records failed.".mysqli_error($db);
		}
		
		/* Closing */
		mysqli_close($db);
	}
	
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