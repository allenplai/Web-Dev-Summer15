<?php
	require_once("support.php");

	$body = "";
	if (isset($_POST["submitInfoButton"])) {
		$attempts = $_POST["attempts"] + 1;
		$nameValue = trim($_POST["name"]);
		$passwordValue = trim($_POST["password"]);
		
		if ($nameValue === "") 
			$body .= "<strong>Name Value Missing</strong><br />";
		if ($passwordValue === "" || ($passwordValue !== "terps"))
			$body .= "<strong>Error: Invalid Password Value Provided</strong><br />";
			$passwordValue = "";
		if ($body == "") {
			$body .= "<strong>Welcome to the our system $nameValue</strong><br />";
		}
		$body.= "<strong>Attempts: $attempts</strong>";
	} else {
		$nameValue = "";
		$passwordValue = "";
		$attempts = 0;
	}
	
	// superglobals are not accessible in heredoc
	$scriptName = $_SERVER["PHP_SELF"];
	$topPart = <<<EOBODY
		<form action="$scriptName" method="post">
			<p>
				<strong>Name: </strong><input type="text" name="name" value="$nameValue" />
			</p>
			
			<p>
				<strong>Password: </strong><input type="password" name="password" value="$passwordValue"/>
			</p>
			
			<p>
				<input type="hidden" name="attempts" value="$attempts" />
			</p>
			
			<!--We need the submit button-->
			<p>
				<input type="submit" name="submitInfoButton" />
			</p>
		</form>		
EOBODY;
	$body = $topPart.$body;
	
	$page = generatePage($body);
	echo $page;
?>