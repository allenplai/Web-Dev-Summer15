<?php
	require_once("support.php");

	if (isset($_POST["submitInfoButton"])) {
		if (!file_exists($_POST["fileToRead"])) {
			$body = "<strong>File {$_POST["fileToRead"]} does not exist.</strong>";
		} else {
			// this option returns each line of the file into an array
			$arrayOfLines = file($_POST["fileToRead"]);
			
			// opening file for writing
			$fp = fopen($_POST["fileToWrite"], "w") or die("Could not open file");
			foreach ($arrayOfLines as $line) {
				$line = strtoupper($line);
				if (fwrite($fp, $line) != strlen($line)) {
					$body .= "<strong>Error occurred during writing</strong>";
					exit ;
				}
			}
			fclose($fp);
			
			$body = "<h1>{$_POST["fileToWrite"]} has been created.</h1>";	
		}	
	} else {
		// superglobals are not accessible in heredoc
		$scriptName = $_SERVER["PHP_SELF"];
		$body = <<<EOBODY
			<form action="$scriptName" method="post">
				<p>
					<strong>File To Read: </strong><input type="text" name="fileToRead" />
				</p>

				<p>
					<strong>File To Write: </strong><input type="text" name="fileToWrite" />
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