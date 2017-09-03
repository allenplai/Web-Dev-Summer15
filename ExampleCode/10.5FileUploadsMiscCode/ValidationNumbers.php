<?php

echo "**** Validating for positive integers ****<br />";
validatePositive("3");
validatePositive("-3");
validatePositive("0");
validatePositive("3.4");
validatePositive("-3.4");
validatePositive("house");
validatePositive(10);  // we need to provide string
echo "<br />";

echo "**** Validating for positive or negative integers ****<br />";
validatePosNegInteger("20");
validatePosNegInteger("-20");
validatePosNegInteger("20.54");
validatePosNegInteger("-20.54");
validatePosNegInteger("0");
validatePosNegInteger("   50");  // why it fails?
validatePosNegInteger("");
validatePosNegInteger("house");
validatePosNegInteger(10);
echo "<br />";

echo "**** Validating for positive or negative decimal ****<br />";
validatePosNegDecimal("20");
validatePosNegDecimal("-20");
validatePosNegDecimal("20.54");
validatePosNegDecimal("-20.54");
validatePosNegDecimal("0");
validatePosNegDecimal("   50");  // why it fails?
validatePosNegDecimal("");
validatePosNegDecimal("house");
validatePosNegDecimal(10);
echo "<br />";

function validatePositive($x) {
   if (ctype_digit($x))
      echo "$x is positive integer value.";
   else
      echo "$x is NOT positive integer value.";
   echo "<br />";
}

function validatePosNegInteger($x) {
   if ($x === strval(intval($x)))
      echo "$x is pos or neg integer value.";
   else
      echo "$x is NOT pos or neg integer value.";
   echo "<br />";
}

function validatePosNegDecimal($x) {
   if ($x === strval(floatval($x)))
      echo "$x is pos or neg decimal value.";
   else
      echo "$x is NOT pos or neg decimal value.";
   echo "<br />";
}

?>