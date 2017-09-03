<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			echo "<p>";
			$name;
			print("Value:".$name."End");
			print("<br />");
			echo "Result:".gettype($name)."End";
			echo "<hr />";  // some html to make the output look better

			$age = 10;
			print($age);
			print("<br />");
			print(gettype($age));
			echo "<hr />";

			$location = "Maryland";
			print($location);
			print("<br />");
			echo gettype($location);
			echo "<hr />";

			$salary = 6.75;
			print($salary);
			print("<br />");
			echo gettype($salary);
			echo "<hr />";

			$worksWeekends = true;
			print($worksWeekends);
			print("<br />");
			echo gettype($worksWeekends);
			echo "<hr />";

			// Notice we are using worksWeekends again but now with an integer
			$worksWeekends = 100;
			print($worksWeekends);
			print("<br />");
			echo gettype($worksWeekends);
			print("<hr />");

			echo "is salary double type?";
			echo is_double($salary);  // output will be 1 (true)
			print("<hr />");

			echo "is location integer type?";
			echo is_int($location);   // no value is displayed in this case (empty string)

			echo "</p>";
		?>
   </body>
</html>