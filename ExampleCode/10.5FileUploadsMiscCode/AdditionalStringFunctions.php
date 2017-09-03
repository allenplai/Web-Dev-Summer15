<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			$name = "Fear the turtle";
			for ($i = 0; $i < strlen($name); $i++)
				print($name[$i]."<br />");

			// Returns portion of string or false
			$p1 = strstr($name, "the");
			if ($p1 != false)
				print("Substring: ".$p1."<br />");
			else
				print("Substring cannot be found<br />");

			$p1 = strstr($name, "house");
			if ($p1 != false)
				print("Substring: ".$p1."<br />");
			else
				print("Substring cannot be found<br />");

			$p1 = strpos($name, "the");
			if ($p1 != false)
				print("Index position is: ".$p1."<br />");
			else
				print("Substring cannot be found<br />");

			$p1 = strpos($name, "house");
			if ($p1 != false)
				print("Index position is: ".$p1."<br />");
			else
				print("Substring cannot be found<br />");

			print("Extracting substring<br />");
			print(substr($name, 5)."<br />");
			print(substr($name, 0, 4)."<br />");  // 4 is the number of characters
		?>
	</body>
</html>