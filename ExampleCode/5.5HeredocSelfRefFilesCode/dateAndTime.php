<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>PHP Example</title>	
	</head>

	<body>
		<?php
			print("<h1>Printing time stamp</h1>");
			print(time());
			print("<br /><br />");
		
			print("<h1>Using getdate()</h1>");
			$dateArrayInfo = getdate();

			// index 0 in the array represents the time stamp
			foreach ($dateArrayInfo as $key => $val)
				print("\"$key\" value is $val<br />");
			print("<br />");
			
			print("<strong>Using date(\"F D m d y g i s a e\") to format date</strong><br />");
			print("<strong>Month, Day of week, month#,day, year, hour, minutes, seconds, am/pm, timezone</strong><br />");
			$todaysDate = date("F D m d y g i s a e"); // Month, Day of week, month#, 
		 											   // day, year, hour, minutes, seconds, am/pm, timezone
			print($todaysDate."<br /><br />");
			
			
			print("<strong>Using date(\"F D M d Y G i s a e\") to format date</strong><br />");
			$todaysDate = date("F D M d Y G i s a e");
			print($todaysDate."<br /><br />");

			
			print("<strong>Creating our own date using mktime</strong><br />");
			$hour = 23;
			$minute = 59;
			$second = 12;
			$month = 2;
			$dayOfMonth = 14;
			$year = 2015;
			$newDate = mktime($hour, $minute, $second, $month, $dayOfMonth, $year);
			print(date("F D M d Y g i s a e", $newDate));
		?>
	</body>
</html>