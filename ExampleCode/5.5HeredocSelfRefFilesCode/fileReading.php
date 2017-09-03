<?php
	require_once("support.php");

	if (isset($_POST["submitInfoButton"])) {
		if (!file_exists($_POST["filename"])) {
			$body = "<strong>File {$_POST["filename"]} does not exist.</strong>";
		} else {
			$body = "<h1>Displaying file contents of file {$_POST["filename"]}</h1>";	
			$fp = fopen($_POST["filename"], "r") or die("Could not open file");
			while (!feof($fp)) {
				$line = fgets($fp);
				$body .= "$line<br />";		
			}
			fclose($fp);
		}	
	} else {
		// superglobals are not accessible in heredoc
		$scriptName = $_SERVER["PHP_SELF"];
		$body = <<<EOBODY
			<form action="$scriptName" method="post">
				<p>
					<strong>Filename: </strong><input type="text" name="filename" />
				</p>
			
				<!--We need the submit button-->
				<p>
					<input type="submit" name="submitInfoButton" />
				</p>
			</form>		
EOBODY;
	
	}
	
	$page = generatePage($body);
	echo $page;
?>