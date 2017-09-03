<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			echo "<p>";
			echo "<h1>Power Table</h1>";
			$i = 1;
			$limit = 100;
			while ($i <= $limit) {
				print($i."  ".($i * $i)."\n");
				echo "<br />";
				$i++;
			}
			echo "</p>";
		?>
   </body>
</html>