<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			$wrongOne = true;
			if ($wrongOne) {
				include("fileWithPHPWrong.php");
			} else {
				include("fileWithPHPCorrect.php");
			}
		?>
	</body>
</html>