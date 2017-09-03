<?php
    if (!isset($age))
        echo "Test1: \$age not set<br />";
    $age=10;
    
    if (isset($age))
        echo "Test2: \$age has been set<br />";

    $age=null;
    if (!isset($age))
        echo "Test3: \$age not set<br />";
       
    $salary=null;
    if (empty($salary))
        echo "Test 4: salary is empty<br />";
    else
        echo "Test 4: salary is not empty<br />";

    if (isset($salary))
        echo "Test 5: salary is set<br />";
    else
        echo "Test 5: salary is not set<br />";

    echo "Height Value", $height, "REST<br />";
         
    if (empty($height))
        echo "Test 6: height is empty<br />";
    else
        echo "Test 6: height is not empty<br />";
    
    $emptyString = "";
    if (empty($emptyString))
        echo "Test 7: empty string is empty<br />";
    else
        echo "Test 7: empty string is not empty<br />";
    
    $spaceString = "  ";
    if (empty($spaceString))
        echo "Test 8: space string is empty<br />";
    else
        echo "Test 8: space string is not empty<br />";
        
    /* query string of URL with no value
       Try: variables.php?queryStringVar=house */
    if (isset($_GET['queryStringVar']))
        echo "Test 9: query string is set<br />";
    else
        echo "Test 9: query string is not set<br />";

    if (empty($_GET['queryStringVar']))
        echo "Test 10: query string is empty<br />";
    else
        echo "Test 10: query string is not empty<br />";
        
    $distance = 0.0;
    if (empty($distance))
        echo "Test 11: distance is empty<br />";
    else
        echo "Test 11: distance is not empty<br />";
?>