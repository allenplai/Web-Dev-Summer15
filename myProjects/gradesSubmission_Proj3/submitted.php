<?php
	require_once("support.php");

	if ($_POST['buttons'] == "Back") {
		require_once("support.php");
		require_once("classAndFunctions.php");
		
		session_start();
		$body = "";
		$_SESSION['back'] = TRUE;
	    $students = $_SESSION['students'];

		$courseName = $_SESSION["courseName"];
		$section = $_SESSION["section"];	
			
		$body .= <<<EOFDATA
			<h1>Grades Submission Form</h1>
			<h1>Course: $courseName, Section: $section</h1>
			<br>
EOFDATA;

		$student_array = $_SESSION["student_array"];
		$body .= "<form action=\"gradeConfirmation.php\" method=\"post\">  <table border=\"1\">";
		
		foreach ($student_array as $entry) {
			$body .= "<tr> <td>$entry->name</td>";
				
			$letterGrade = array("A", "B", "C", "D", "F");
			foreach($letterGrade as $letterEntry) {
				$body .= "<td><input type=\"radio\" name=\"$entry->name\" ";
				if ($entry->grade == $letterEntry) {
					$body .= "checked=\"checked\" ";
				}
				$body .= " value=\"$letterEntry\" />$letterEntry</td> ";
			}
			$body .= "</tr>";
		}		
		$body .= "</table> <br> <input type=\"submit\" value=\"Continue\" /> </form>";

	
	
	
		/* Storing session information */
		$keys = array_keys($_POST);
		foreach ($keys as $key)
			$_SESSION[$key] = $_POST[$key];
	
			
	} else {
		$body = <<<EOBODY
		 <h1>Grades submitted and e-mail confirmation sent.</h1>
		 <br>
		 <h1>This is submission #</h1>
EOBODY;
	}
    
    
	
	$page = generatePage($body);
	echo $page;
?>