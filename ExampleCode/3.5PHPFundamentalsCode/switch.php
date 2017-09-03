<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			echo "<p>";
			$year = "junior";

			switch ($year) {
				case "freshman":
					$permit = "Blue";
					break;
				case "junior":
					$permit = "Red";
					break;
				case "sophomore":
					$permit = "Yellow";
					break;
				default:
					$permit = "Purple";
					break;
			}
			print("Permit granted: ".$permit);
			echo "</p>";
		?>
   </body>
</html>