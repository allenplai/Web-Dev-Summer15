<?php
    $softwares = array("AntiVirus" => 20.0,
                        "Firewall" => 15.0,
                        "Registry Cleaner" => 30.0,
                        "AntiSpyware" => 25.0,
                        "WindowsJr7" => 95.0,
                        "MacKitty" => 77.0);
             
    $software_names = array_keys($softwares);
    $software_prices = array_values($softwares);

    function displaySoftwaresSelect($array) {
        $result = "<select name=\"softwaresToBuy[]\" multiple=\"multiple\" required>\n";
        foreach ($array as $entry => $value) { 
            $result .= "<option value=\"";
            $result .= $entry."\">";
            $result .= $entry." ($";
            $result .= (integer)$value;
            $result .= ")</option>\n";
        }
        $result .= "</select>\n";
		return $result;
	}
?>