<?php
	require_once("support.php");
    
    session_start();
    $topPart ="";
    $body = "";
    $loggedIn = FALSE;
    
    
    if (isset($_POST["submitInfoButton"])) {
		$loginIdValue = trim($_POST["loginId"]);
		$passwordValue = trim($_POST["password"]);
		
		if ($loginIdValue === "" || $loginIdValue !== "cmsc298s" || $passwordValue === "" || ($passwordValue !== "terps")) { 
			$body .= "<h1>Invalid login information provided.</h1><br />";
            $passwordValue = "";
        }
		if ($body == "") {
            $loggedIn = TRUE;
            setcookie("session", "enter section");
		}
	} else {
		$nameValue = "";
		$passwordValue = "";
	}
    
    if (isset($_COOKIE['session']) || $loggedIn) {
        $body = <<<EOBODY
            <h1>Section Information</h1>
            <form action="form.php" method="post">
                <strong>Course Name(e.g., cmsc128): </strong>
                <input type="text" name="courseName" required/>
                <br> <br>
        
                <strong>Section(e.g., 0101): </strong>
                <input type="text" name="section" required/>
                <br> <br>
                <input type="submit" name="submitInfoButton" />
            </form>
EOBODY;
	} else {
		$scriptName = $_SERVER["PHP_SELF"];
        $topPart = <<<EOBODY
        <h1>Grades Submission System</h1>
        <form action="$scriptName" method="post">
            <strong>LoginId: </strong>
            <input type="text" name="loginId" required/>
            <br> <br>
            <strong>Password: </strong>
            <input type="password" name="password" required/>
            <br> <br>        	
            <input type="submit" value="Submit" name="submitInfoButton" />
        </form> 	
EOBODY;
	}
	
	

	$body = $topPart.$body;
	
	$page = generatePage($body);
	echo $page;
?>