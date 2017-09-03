<?php

    class Student {
		public $name;
        public $grade;
	}

    function readFileData($fileName) {
        $students = array();
        if (!file_exists($fileName)) {
			// will not run because we will assume file will exist
            header('Location: http://localhost/gradesSubmission/main.php/');
        } else {
            
            $fp = fopen($fileName, "r") or die("Could not open $fileName");
            while (!feof($fp)) {
                $line = fgets($fp);
                if (!$line == "") {
					$line = trim($line);
					array_push($students, $line);
                }
            }
            fclose($fp);
        }
        return $students;
    }
    
    
    function displayFormGrades($array) {
        $result = "<form action=\"gradeConfirmation.php\" method=\"post\">  <table border=\"1\">";
    
    
        foreach ($array as $entry) {
            $result .= "<tr> <td>$entry</td>";
            $result .= "<td><input type=\"radio\" name=\"$entry\" value=\"A\" />A</td>
                        <td><input type=\"radio\" name=\"$entry\" value=\"B\" />B</td>
                        <td><input type=\"radio\" name=\"$entry\" value=\"C\" />C</td>
                        <td><input type=\"radio\" name=\"$entry\" value=\"D\" />D</td>
                        <td><input type=\"radio\" name=\"$entry\" value=\"F\" />F</td> </tr>";  
        }
        
        $result .= "</table> <br> <input type=\"submit\" value=\"Continue\" /> </form>";
        return $result;
    }
    
    
    function displayTableGrades($array) {
        $result = "<h1>Grades to Submit</h1>
                     <form action=\".php\" method=\"post\">
                  <table border=\"1\">
                    <tr>
                       <th>Name</th><th>Grade</th>
                    </tr>";
                  
        foreach ($array as $entry) {
                $result .= "<tr>
                    <td>$entry</td><td>$_POST[$entry]</td>
                </tr>";
        }
        $result .= "</table>
            <br>
            <input type=\"submit\" value=\"Submit Grades\" />
        </form>";
        return $result;
    }
    
    
    
    
?>