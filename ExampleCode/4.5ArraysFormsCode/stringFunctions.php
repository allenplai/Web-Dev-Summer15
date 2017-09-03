<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			$name = "         fear The turtle    ";
			echo "<pre>"; // so we can see the spacing effect
			echo "Original: ".$name."<br />";
			echo "Trim: ".trim($name)."<br />";
			print "Left Trim: ".ltrim($name)."Rest<br />";
			print "Right Trim: ".rtrim($name)."<br />";
			print "Uppercase: ".strtoupper($name)."<br />";
			print "Lowercase: ".strtolower($name)."<br />";
			print "ucwords: ".ucwords($name)."<br />";
			print "ucfirst: ".ucfirst(trim($name))."<br />";
			$words = explode(" ", trim($name)); // space as delimeter
			foreach ($words as $entry)
				print($entry."<br />");
			echo "</pre>";
		?>		
   </body>
</html>