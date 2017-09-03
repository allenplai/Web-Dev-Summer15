<?php
	// serverUploadDirectory represents the directory where uploaded files will be placed
	// Replace with your own path.  $serverUploadDirectory specified below corresponds to
	// windows environment. For Mac environment use $serverUploadDirectory = "/tmp"
	
	$serverUploadDirectory = "C:\\tempExample";
	print("<h3>Information about uploaded files</h3>");
	$fileInfoArray = array_values($_FILES);
	foreach ($fileInfoArray as $fileInfo) {
		$tmpFileName = $fileInfo['tmp_name'];
		$serverFileName = $serverUploadDirectory."/".$fileInfo['name'];	
		if (!move_uploaded_file($tmpFileName, $serverFileName))
			print("<b>File upload for ".$fileInfo['name']." cannot be completed</b><br />");
		else {
			print('<b>File upload for "'.$fileInfo['name'].'" completed</b><br />');
		}
	}
?>