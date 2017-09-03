<?php
    // Try each of the following
     $name=" ";    
    //$name = "0";
    //$name = "A";
    
    $name = trim($name); // trimming
    
    if (!isset($name) || !strlen($name)) {
        echo "You need to provide a name<br />";
    }
    
    if (!isset($name) || empty($name)) {
        echo "You need to provide a name II<br />";
    }
    
    echo "Done";
?>