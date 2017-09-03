<?php
	// serverUploadDirectory represents the directory where uploaded files will be placed
	// Replace with your own path.  $serverUploadDirectory specified below corresponds to
	// windows environment. For Mac environment use $serverUploadDirectory = "/tmp"
	$serverUploadDirectory = "C:\\tempExample"; 

	$tmpFileName = $_FILES['filename']['tmp_name'];
	$serverFileName = $serverUploadDirectory."/".$_FILES['filename']['name'];

	// checking the file was uploaded via HTTP POST (to avoid tricking the
	// script into working on files it should not be working on (e.g., passwd)
	if (!is_uploaded_file($tmpFileName))
		print("<b>File upload cannot be completed</b>");
	else {
		print("<h3>Information about uploaded file</h3>");
		print("<p>");
		print("name: ".$_FILES['filename']['name']."<br />");
		print("tmp_name: ".$_FILES['filename']['tmp_name']."<br />");
		print("size: ".$_FILES['filename']['size']."<br />");
		print("type: ".$_FILES['filename']['type']."<br />");
		print("</p>");
		
		// At this point you can check the validity of the file type, size, etc.
		// copying file from temporary location
		if (!move_uploaded_file($tmpFileName, $serverFileName))
			print("<b>File upload cannot be completed</b>");
		else {
			print("<b>File upload complete</b>");
		}
	}
?>