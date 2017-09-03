<?php
	require_once("support.php");
    require_once("classAndFunctions.php");
    session_start();

    $students = $_SESSION['students'];
	
	$student_array = array();
	for ($i = 0; $i < count($students); $i++) {
		$student_array[$i] = new Student();
		$student_array[$i]->name = $students[$i];
		$student_array[$i]->grade = $_POST[$students[$i]];
	}
	$_SESSION["student_array"] = $student_array;
    
    $body = "<h1>Grades to Submit</h1>
                     <form action=\"submitted.php\" method=\"post\">
                  <table border=\"1\">
                    <tr>
                       <th>Name</th><th>Grade</th>
                    </tr>";
					
	foreach ($student_array as $entry) {
		$body .= "<tr>
        <td>$entry->name</td><td>$entry->grade</td>
        </tr>";
	}

	
    $body .= "</table>
            <br>
            <input type=\"submit\" name=\"buttons\" value=\"Submit Grades\" />
			<br> <br>
			<input type=\"submit\" name =\"buttons\" value=\"Back\" />
        </form>";
		

    echo generatePage($body);
?>