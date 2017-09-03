<?php
$names = array("Mary", "Jose", "Peter");
if (in_array("Jose", $names))
	echo "Jose is in the array <br />";


if (!in_array("Laura", $names)) 
	echo "Laura is not in the array <br />";


$salaries = array(1000, 2000, 500);
if (in_array(2000, $salaries))
	echo "2000 is one of the expected salaries.<br />";
	
shuffle($names);
print_r($names);
print("<br />Imploding previous array: ".implode($names, " and ")."<br />");

$data = "10|20|30|40|50|60";
print_r(explode("|", $data));

?>