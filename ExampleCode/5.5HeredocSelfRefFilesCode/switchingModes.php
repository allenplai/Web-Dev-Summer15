<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<p>
			We are generating this in HTML mode
		</p>
		
		<?php
			echo "<p>Generated in PHP mode</p>";
			$x = 2;
		?>
		
		<p>
			Back to HTML mode
		</p>
		
		<?php
			if ($x == 2) {?>
				<h2>Table generated in HTML mode</h2>
				<table border="1">
					<tr><th>Name</th><th>Age</th></tr>
					<tr><td>Peter</td><td>30</td></tr>
				</table>
			<?php	
			}
			?>
	</body>
</html>