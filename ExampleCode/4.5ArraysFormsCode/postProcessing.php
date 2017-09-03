<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php 
			$nameSubmitted = $_POST['name'];
			if ($nameSubmitted === "Mary")
				echo "<strong>Welcome Mary, my friend!!</strong>";
			else 
				echo "<strong>Welcome $nameSubmitted</strong>";
		?>		
   </body>
</html>