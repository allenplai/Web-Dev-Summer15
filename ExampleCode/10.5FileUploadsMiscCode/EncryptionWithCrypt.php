<?php
    $valueToEncrypt = "Terps";
    $totalEncryptions = 10;
    
    // Encrypting the value.  Notice that we have different
    // values for each crypt call.  If you provide a salt
    // (crypt($valueToEncrypt, "house")
    // the encrypted values will be the same.  
    $allEncryptions = array($totalEncryptions);
    for ($i = 0; $i <$totalEncryptions; $i++) {
        $allEncryptions[$i] = crypt($valueToEncrypt);
        echo "Encrypted value is: ".$allEncryptions[$i]."<br />";
    }
    
    // Decrypting the value.
    for ($i = 0; $i <$totalEncryptions; $i++) {
        if (crypt($valueToEncrypt, $allEncryptions[$i]) === $allEncryptions[$i])
            echo "Decrypting value succeeded<br />";
        else
            echo "Decrypting value failed<br />";
            
    }
?>