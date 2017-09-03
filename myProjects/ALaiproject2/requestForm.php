<?php
	require_once("support.php");
	require_once("softwares.php");
	
	$body = "<div id=\"requestForm\"><h1 id=\"title\">Order Request Form</h1>
			<form action=\"processRequest.php\" method=\"post\">
			
				<strong>LastName: </strong>
				<input class=\"contact\" type=\"text\" name=\"lastName\" required/>
				<strong>FirstName: </strong>
				<input class=\"contact\"type=\"text\" name=\"firstName\" required/>
				<br>
				<strong>Email: </strong>
				<input class=\"contact\" id=\"emailAddress\" type=\"email\" name=\"email\" placeholder=\"example@notreal.notreal\" required/> 
				<br>
			
				<strong>Shipping Method: </strong>
				<input type=\"radio\" name=\"shippingMethod\" value=\"UPSS\" required/>UPSS
				<input type=\"radio\" name=\"shippingMethod\" value=\"FedEXC\" required/>FedEXC
				<input type=\"radio\" name=\"shippingMethod\" value=\"USMAIL\" required/>USMAIL
				<input type=\"radio\" name=\"shippingMethod\" value=\"Other\" required/>Other
				<br>
				
				<strong>Softwares: </strong> <br>";
				
	$body .= displaySoftwaresSelect($softwares);

	$body .= "<br>
			<strong>Order Specifications</strong>  <br>
			<textarea rows=\"7\" cols=\"70\" name=\"orderSpecification\"></textarea>	
			<br>
			<input class=\"button\" type=\"reset\" value=\"Reset Fields\" />
			<input class=\"button\" type=\"submit\" value=\"Submit Request\" />
			</form></div>";
	
	
	$page = generatePage($body, "cmsc389n Project2");
	echo $page;
?>
