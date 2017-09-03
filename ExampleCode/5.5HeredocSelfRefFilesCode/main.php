<?php
	require_once("support.php");

	$body = "<h2>Multiplication table</h2>";
	$body .= displayMultTable(6);
	$body .= "<hr />";
	
	$page = generatePage($body, "Multiplication Table");
	echo $page;
?>

<?php
	function displayMultTable($limit) {
		// Why are we using \n??
		$result = "<table border=\"1\">\n";
		for ($outer = 1; $outer <= $limit; $outer++) {
			$result .= "<tr>";
			for ($inner = 1; $inner <= $limit; $inner++) {
				$result .= "<td>".($outer * $inner)."</td>";
			}
			$result .= "</tr>\n";
		}	
		$result .= "</table>";
		
		return $result;
	}
?>