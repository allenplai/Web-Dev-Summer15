<?php
	require_once("support.php");

	session_start();
	$body = "<h1>Information provided:</h1>";
	$body .= "<b>Professor:</b>{$_POST['name']}<br />";
	$body .= "<b>Course:</b>{$_POST['course']}<br />";
	$body .= "<b>Difficulty:</b>{$_POST['difficulty']}<br />";
	$body .= "<b>Opinion:</b><br />".nl2br($_POST['opinion'])."<br /><br />";

	/* Storing session information */
	$keys = array_keys($_POST);
	foreach ($keys as $key)
		$_SESSION[$key] = $_POST[$key];

	$sid = session_id();
	
    // To allow the script to run with cookies disabled we pass
    // the value via a hidden field
	$body .= <<<EOFDATA
		<form action="confirmationPost.php" method="post">
			<input type="hidden" name="our_given_session_name" value="$sid" />
			<input type="submit" value="Submit" />
		</form>
EOFDATA;

echo generatePage($body);
?>