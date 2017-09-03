<?php
$value = 123456.789;
echo number_format($value);   // rounds to nearest whole number and add commas
echo "<br />";
echo number_format($value, 2); // rounds to 2 decimal places adding commas
echo "<br />";
echo number_format($value, 2, ";", "*");  // ; thousand separator, * decimal separator
?>