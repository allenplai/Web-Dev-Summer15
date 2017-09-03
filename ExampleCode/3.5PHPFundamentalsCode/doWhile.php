<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			echo "<p>";
			$val = 5;
			$fac = 1;
			$i = $val;
			do {
  				$fac = $fac * $i;
  				$i--; 
			} while ($i > 0);
			echo "Factorial of $val is: $fac";
			echo "</p>";
		?>
   </body>
</html>