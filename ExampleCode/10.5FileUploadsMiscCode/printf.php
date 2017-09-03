<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			intFormatting(1024);
			floatFormatting(3.565416);
			generalFormatting();	
		?>
	</body>
</html>


<?php
function intFormatting($intVal) {
	print("<h2>Integer Formatting</h2>");
 	print("<pre>");  // otherwise spaces and newlines will be ignored in html
	printf("%d\n", $intVal);
	printf("%8d\n", $intVal);	// field width of 8, right-justified
	printf("%-8dRest\n", $intVal);	// field width of 8, left-justified
	printf("%08d\n", $intVal);	// field width of 8, right-justified, with padding 0's
	print("</pre>");
}

function floatFormatting($floatVal) {
	print("<h2>Floating-point Formatting</h2>");
 	print("<pre>");  // otherwise spaces and newlines will be ignored in html
	printf("%f\n", $floatVal);
	printf("%.1f\n", $floatVal);
	printf("%.2f\n", $floatVal);
	printf("%.3f\n", $floatVal);
	printf("%10.3f\n", $floatVal); // field width of 10, right-justified
	printf("%-10.3fRest\n", $floatVal); // field width of 10, left-justified
	print("</pre>");
}

function generalFormatting() {
	$strVal = "Terps";
	$intVal = 10;
	$floatVal = 45.75;
 	print("<h2>General Formatting</h2>");
 	print("<pre>");  // otherwise spaces and newlines will be ignored in html
	printf("%s\n", $strVal);
	printf("%10s\n", $strVal);  // field width of 10	
	
	printf("First value is %d and the second value is %.2f", $intVal, $floatVal);
	
	// sprintf allow us to capture the string in a variable
	$strResult = sprintf("%d %.3f", $intVal, $floatVal);
	print("<br />sprintf result: ".$strResult);
	
	print("</pre>");
}
?>