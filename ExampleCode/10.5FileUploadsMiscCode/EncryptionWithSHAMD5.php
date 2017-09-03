<?php
    $valueToEncrypt = "Terps";
        
    $sha1Encryption = sha1($valueToEncrypt);
    echo "Encryption with sha1: ".$sha1Encryption."<br />";
    
    $md5Encryption = md5($valueToEncrypt);
    echo "Encryption with md5: ".$md5Encryption."<br />";
    
    // We will use the encrypted value in password checking as follows:
    $providedPassword = "Terps";
    if ($sha1Encryption === sha1($providedPassword))
	echo "Correct password provided";
?>