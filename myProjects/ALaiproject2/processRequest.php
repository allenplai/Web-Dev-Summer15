<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" href="mainstylesheet.css" title="MainStyle" />
        <title>cmsc389n Project2</title>	
    </head>
            
    <body>
		<div id="processRequest">
        <h1>
            Order Confirmation
        </h1>
			<?php
            	require_once("softwares.php");
                
                $lastName = trim($_POST['lastName']);
                $firstName = trim($_POST['firstName']);
                $email = trim($_POST['email']);
				
                $shippingMethod = $_POST['shippingMethod'];
                
                
                echo "<strong>Lastname:</strong> $lastName,&nbsp&nbsp&nbsp";
                echo "<strong>Firstname:</strong> $firstName,&nbsp&nbsp&nbsp";
                echo "<strong>Email:</strong> $email <br> <br>";
                echo "<strong>Shipping Method: </strong> $shippingMethod <br> <br>";
                echo "<strong>Software Order: </strong>  <br> <br>";
				
				$softwaresToBuy = $_POST['softwaresToBuy'];
                $sum = 0;
                
				echo "<table border=\"1\">\n<tr><th>Software</th><th>Cost</th></tr>";
				if (!isset($_POST["softwaresToBuy"])) {
					echo "No softwares selected<br>";
				}
				else {
					foreach ($softwaresToBuy as $entry) {
						$sum += $softwares[$entry];
					}
					foreach ($softwaresToBuy as $entry) { 
						echo "<tr>\n<td>".$entry."</td>\n";
						echo "<td>\n$".(integer)$softwares[$entry]."</td>\n</tr>";
					}	
				}
                echo "<tr>\n<td>"."Total"."</td>\n";
                echo "<td>\n$".(integer)$sum."</td>\n</tr></table> <br>";
				
				$orderSpecification = $_POST['orderSpecification'];
				echo "<strong>Order Specification: </strong>";
				echo "<div id=\"orderSpec\">";
				echo nl2br($_POST['orderSpecification']);
				echo "</div>";
			?>
		</div>        
    
    </body>
</html>