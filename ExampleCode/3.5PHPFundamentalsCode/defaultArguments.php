<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			$header = createHeader("Fear the Turtle");
			echo $header;
			echo createHeader();
		?>		
   </body>
</html>

<?php
	function createHeader($header = "Welcome to College Park"){
		return "<h1>".$header."</h1>";
	}
?>