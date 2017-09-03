<?php
function validateCleanData($db, $values, &$body) {
	if (!isset($values['name']) || !isset($values['email']) || !isset($values['gpa']) ||
	 	!isset($values['year']) || !isset($values['gender']) || !isset($values['password']) ||
		!isset($values['passwordVerification'])) { 
		$body = "<h1>You need to complete all the fields of the form</h1>";	
		return false;	
	} else {
	 	$keys = array_keys($values);
	 	
	 	foreach ($keys as $key) {
			$values[$key] = trim($values[$key]);
			if (strcmp($values[$key], "") == 0) {
				$body = "<h2>Invalid ".$key." value provided</h2>";
				return false;
			}
		}
	 }
	
	 if (strcmp($values['password'], $values['passwordVerification']) != 0) {
		$body = "<h2>Password and password verification value do not match.</h2>";
		return false;
	 } else {
		$values['name'] = mysqli_real_escape_string($db, $values['name']);
		$values['email'] = mysqli_real_escape_string($db, strtolower($values['email'])); // turning e-mail into lowercase
		$values['gpa'] = floatval($values['gpa']);
		$values['year'] = intval($values['year']);
		$values['gender'] = $values['gender'];
		$values['password'] = mysqli_real_escape_string($db, $values['password']);
		return true;
	} 
}

function generateInputForm($fieldValues, $submitButtonName, $formAction) {
 	if ($fieldValues == null) {
 	 	$fieldValues = array();
		$fieldValues['name'] = "";
		$fieldValues['email'] = "";
		$fieldValues['gpa'] = "";
		$fieldValues['year'] = "";
		$fieldValues['gender'] = "";
		$fieldValues['password'] = "";
		$fieldValues['passwordVerification'] = "";
	} 
	
	$body = <<<EOBODY
	<body>
	<form action="$formAction" method="post">
	<p>
		<b>Name:</b><input type="text" name="name" value="{$fieldValues['name']}" />
	</p>
   
	<p>
		<b>Email:</b><input type="text" name="email" value="{$fieldValues['email']}" />
	</p>
   
	<p>
		<b>GPA:</b><input type="text" name="gpa" value="{$fieldValues['gpa']}" />
	</p>
	
	
EOBODY;
	$body .= "<p><b>Year:</b>";
	for ($i=10; $i<=12; $i++) {
		if ((strcmp($fieldValues['year'],"")!=0) && ($i == intval($fieldValues['year']))) 
			$body .= sprintf("<input type=\"radio\" name=\"year\" value=\"%d\" checked=\"checked\">%d&nbsp;", $i,$i);
		else 
			$body .= sprintf("<input type=\"radio\" name=\"year\" value=\"%d\">%d&nbsp;", $i,$i);
	}


	$body .= "<p><b>Gender:</b>";
	if (strcmp($fieldValues['gender'], "") == 0) { 
			$body .= "<input type=\"radio\" name=\"gender\" value=\"M\" />M&nbsp;";
			$body .= "<input type=\"radio\" name=\"gender\" value=\"F\" />F&nbsp;";
	} else if (strcmp($fieldValues['gender'], "M") == 0) {
			$body .= "<input type=\"radio\" name=\"gender\" value=\"M\" checked=\"checked\" />M&nbsp;";
			$body .= "<input type=\"radio\" name=\"gender\" value=\"F\" />F&nbsp;";
	} else {
			$body .= "<input type=\"radio\" name=\"gender\" value=\"M\" />M&nbsp;";
			$body .= "<input type=\"radio\" name=\"gender\" value=\"F\" checked=\"checked\" />F&nbsp;";
	}		
	$body .= "</p>";


	$body .= <<<EOBODY2
   	<p>
		<b>Password:</b><input type="password" name="password" value="{$fieldValues['password']}" />
	</p>

   	<p>
		<b>Verify Password:</b><input type="password" name="passwordVerification" value="{$fieldValues['passwordVerification']}" />
	</p>
	
	<p>
		<input type="submit" name="$submitButtonName" value="Submit Data"/>
	</p>
	</form>  
	</body>
EOBODY2;

	return $body;
}

function htmlForValues($values) {
	$body = "<b>Name: </b>".$values['name']."<br />";
	$body .= "<b>Email: </b>".$values['email']."<br />";
	$body .= "<b>Gpa: </b>".$values['gpa']."<br />";
	$body .= "<b>Year: </b>".$values['year']."<br />";
	$body .= "<b>Gender: </b>".$values['gender']."<br />";
	
	return $body;
}

function connectToDB() {
 	global $host, $user, $passwd, $database;
	$db = mysqli_connect($host, $user, $passwd, $database);
	if (mysqli_connect_errno()) {
		echo "Connect failed.\n".mysqli_connect_error();
		exit();
	}
	return $db;
}

function generatePage($body, $title) {
$page = <<<EOPAGE
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
		<title>$title</title>	
	</head>

	$body
</html>
EOPAGE;

return $page;
}
?>