<?php
	require_once("support.php");
    require_once("classAndFunctions.php");
    
	session_start();
	$body = "";

    $courseName = trim($_POST["courseName"]);
    $section = trim($_POST["section"]);
    $fileName = $courseName.$section.".txt";
    $students = readFileData($fileName);
	$_SESSION["students"] = $students;
	
    
    $body .= <<<EOFDATA
        <h1>Grades Submission Form</h1>
        <h1>Course: $courseName, Section: $section</h1>
        <br>
EOFDATA;

   
	$body .= displayFormGrades($students);
	
	/* Storing session information */
	$keys = array_keys($_POST);
	foreach ($keys as $key)
		$_SESSION[$key] = $_POST[$key];


echo generatePage($body);
?>