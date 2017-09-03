<?php
	require_once("support.php");
	
	if (!isset($_COOKIE['nickname'])) {
		$name = "nickname";
		$value = "kid";
		$expiration = time() + 3600; /* one hour from now */
		$path = "/"; /* a cookie should be sent for any page within the server environment */
		$domain = "";  /* adjust with appropriate domain name */
		$sentOnlyOverSecureConnection = 0; /* 1 for secure connection */
		
		// First cookie
		setcookie($name, $value, $expiration, $path, $domain, $sentOnlyOverSecureConnection);
		
		// Second cookie (will last until end of the session) Close browser and look for it
		setcookie("AsecondCookie", "GoodyBye World");
		$body = "<h1>First time in our system</h1>";	
	} else {
		$body = "<h1>Welcome back dear CS student, nice to see you again</h1>";
		$body .= "Your nickname is {$_COOKIE['nickname']}";
	}
	
	echo generatePage($body); 
?>