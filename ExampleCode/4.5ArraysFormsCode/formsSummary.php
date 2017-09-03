<?php
	print "<p>";
	print "<strong>Contents of \$_POST</strong><br />";
	print_r($_POST);
	print "<br /><strong>End of Contents of \$_POST</strong><br /><br />";
	
	print "<strong>Welcome</strong> ".$_POST["firstName"]." ".$_POST["lastName"]."<br />";
	print "<strong>Password Provided was: </strong>".$_POST["password"]."<br />";

	if (isset($_POST['ownsLaptop'])) {
		print "<strong>Owns a laptop</strong><br />";
	}

	if (isset($_POST['ownsDesktop'])) {
		print "<strong>Owns a desktop</strong><br />";
	}

	if (isset($_POST['atSchool'])) {
		print "<strong>One available at school</strong><br />";
	}

	if (isset($_POST['gender'])) {
		print "<strong>Gender is: {$_POST["gender"]}</strong><br />";
	}
	
	if (isset($_POST['course'])) {
		print "<strong>Course selected is: {$_POST['course']}</strong><br />";
	}
	
	if (isset($_POST['transcript'])) {
		print "<strong>Transcript: </strong>{$_POST["transcript"]}<br />";
	}

	if (isset($_POST['description'])) {
		echo "<strong>Description(Using nl2br)</strong><br />";
		echo nl2br($_POST['description']);  // notice use of nl2br
		echo "<br />";
	}

	if (isset($_POST['description'])) {
		echo "<strong>Description(not using nl2br)</strong><br />";
		echo $_POST['description'];
		echo "<br />"; 
	}

	if (isset($_POST['expertise'])) {
		echo "<strong>Expertise: {$_POST['expertise']}<strong><br />";	
	}
	
	print "<strong>Environments: </strong><br />";
	if (!isset($_POST["environments"]))
		print "No environments selected<br />";
	else {
		foreach ($_POST["environments"] as $entry) {
			print($entry."<br />");	
		}
	}	
	
	print "</p>";
?>