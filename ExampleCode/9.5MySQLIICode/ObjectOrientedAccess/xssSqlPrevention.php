<?php
	require_once "dbLogin.php";

	main();
	
	function main() {
		global $host, $user, $password, $database;
		
		/* Connecting to the database */		
		$db_connection = new mysqli($host, $user, $password, $database);
		if ($db_connection->connect_error) {
			die($db_connection->connect_error);
		} else {
			echo "Connection to database established<br><br>";
		}
	
		test($db_connection, "Hello 'Everyone'");
		test($db_connection, "<h1>Main Header</h1>");
		test($db_connection, "<script src='http://d.notreal/danger.js'></script><script>destroy()</script>");
		
		/* Closing connection */
		$db_connection->close();
	}
	
	function test($db_connection, $string) {
		echo "Before: $string <br>";
		$string = sanitize_string($db_connection, $string);
		echo "After: $string <br><hr>";
	}
	
	function sanitize_string($db_connection, $string) {
		if (get_magic_quotes_gpc()) {
			$string = stripslashes($string);
		}
		return htmlentities($db_connection->real_escape_string($string));
	}
?>