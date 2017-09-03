<?php
	require_once("support.php");
	
	session_start();
	$body = "Thank you for the feedback you provided for ".$_SESSION['course']."<br />";
	$body .= "The following information has been added to our database:<br />";
	$body .= "<b>Professor:</b> ".$_SESSION['name']."<br />";
	$body .= "<b>Difficulty:</b> ".$_SESSION['difficulty']."<br />";
	$body .= "<b>Opinion:</b><br />".nl2br($_SESSION['opinion'])."<br /><br />";

	/* ending the session */
	session_destroy();
	unset($_SESSION['name']);
	unset($_SESSION['course']);
	unset($_SESSION['difficulty']);
	unset($_SESSION['opinion']);
	
	echo generatePage($body);
?>