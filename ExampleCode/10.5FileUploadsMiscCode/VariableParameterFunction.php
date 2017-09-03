<?php
function printValues() {
	$argsCount = func_num_args();
	echo "Number of arguments: $argsCount <br />";
	for ($i = 0; $i < $argsCount; $i++) {
		$argValue = func_get_arg($i);
		echo "Value parameter $i is {$argValue} <br />";
	}
}

printValues(10, 20, 30);
printValues(5, 6, 7, 8, 9);
printValues();
?>