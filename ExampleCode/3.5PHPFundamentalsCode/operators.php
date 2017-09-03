<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			echo "<p>";
			$mary = "Mary";
			$land = "land";
			$terps = $mary.$land;
			echo $terps;
			echo "<hr />";

			$v1 = 100;
			$v2 = 3;
			print("Sum: ".($v1 + $v2));
			echo "<hr />";

			print("Product: ".($v1 * $v2));
			echo "<hr />";

			print("Division: ".($v1 / $v2));
			echo "<hr />";

			$remainder = $v1 % $v2;
			echo "Reminder: ".$remainder;
			echo "<hr />";

			echo "Salary: ";
			echo $salary = 10000;  // assignment represents an expression
			echo "<hr />";

			echo "After Increase: ";
			$salary += 2000;
			echo $salary;
			echo "<hr />";

			$age = 20;
			$age++;
			echo "Age after increment: $age";
			echo "</p>";
		?>
   </body>
</html>