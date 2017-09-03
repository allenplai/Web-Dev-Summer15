<?php
	require_once("support.php");	
	$body = "<h1>Image Retrieved</h1>";
	$body .= "<p><img src=\"retrievingDocument.php?fileToRetrieve=$_GET[fileToRetrieve]\" alt=\"Image To Display\"/></p>";	
	$body .= "<h1>End of Retrieval</h1>";
    echo generatePage($body);
?>