<?php
	require_once("support.php");
	require_once("dbLogin.php");
	$body = "";
	$scriptName = $_SERVER["PHP_SELF"];

  /***************************
  =============================
  code from here is for after the user hit submit data (second page)
  =============================
  *****************************/
	if (isset($_POST["submitApp"])) {
		$name = trim($_POST["name"]);
		$email = trim($_POST["email"]);
		$gpa = trim($_POST["GPA"]);
		$year = trim($_POST["year"]);
		$gender = trim($_POST["gender"]);
		$password = crypt($_POST["password"], "allen");
		$verifyPassword = crypt($_POST["verifyPassword"], "allen");

		if ($password != $verifyPassword) {
			$body = passwordDontMatch();
		} else {

			$db_connection = new mysqli($host, $DBuser, $DBpassword, $database);
			if ($db_connection->connect_error) {
				die($db_connection->connect_error);
			}

			/* Query */
			$query = "insert into applicants values('$name', '$email',
			 							$gpa, $year, '$gender', '$password')";
			/* Executing query */
			$result = $db_connection->query($query);
			if (!$result) {
				die("Insertion failed: " . $db_connection->error);
			}

			$db_connection->close();
			$p1 = new Applicant($name, $email, $gpa, $year, $gender, $password);

			$body = "<h1>The following entry has been added to the database</h1><br>";

			$body .= "<strong>Name</strong>: ".$p1->getName()."<br>";
			$body .= "<strong>Email</strong>: ".$p1->getEmail()."<br>";
			$body .= "<strong>GPA</strong>: ".$p1->getGpa()."<br>";
			$body .= "<strong>Year</strong>: ".$p1->getYear()."<br>";
			$body .= "<strong>Gender</strong>: ".$p1->getGender()."<br><br>";

			$body .= "<form action=\"$scriptName\" method=\"post\">";
			$body .= "<input type=\"submit\" value=\"Return to main menu\" name=\"return\" /></form>";
		}
	} elseif (isset($_POST["reviewApp"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		$db_connection = new mysqli($host, $DBuser, $DBpassword, $database);
		if ($db_connection->connect_error) {
			die($db_connection->connect_error);
		}

		/* Query */
		$email = mysqli_real_escape_string($db_connection, $email);
		$password = crypt(mysqli_real_escape_string($db_connection, $password), "allen");
		$query = "select * from applicants where email=\"$email\" AND password=\"$password\"";

		/* Executing query */
		$result = $db_connection->query($query);
		if (!$result) {
			die("Retrieval failed: ". $db_connection->error);
		} else {
			/* Number of rows found */
			$num_rows = $result->num_rows;
			if ($num_rows === 0) {
				// check this*********************************
				$body = invalidEmailPassword();
			} else {
				$result->data_seek(0);
				$row = $result->fetch_array(MYSQLI_ASSOC);

				$body = "<h1>Application found in the database with the following values:</h1><br>";
				$body .= "<strong>Name</strong>: {$row["name"]}<br>";
				$body .= "<strong>Email</strong>: {$row["email"]}<br>";
				$body .= "<strong>GPA</strong>: {$row["gpa"]}<br>";
				$body .= "<strong>Year</strong>: {$row["year"]}<br>";
				$body .= "<strong>Gender</strong>: {$row["gender"]}<br><br>";

				$body .= "<form action=\"$scriptName\" method=\"post\">";
				$body .= "<input type=\"submit\" value=\"Return to main menu\" name=\"return\" /></form>";
			}
    }

		/* Freeing memory */
		$result->close();

		/* Closing connection */
		$db_connection->close();


	} elseif (isset($_POST["updateApp"])) {
    $email = trim($_POST["email"]);
		$password = $_POST["password"];

		$db_connection = new mysqli($host, $DBuser, $DBpassword, $database);
		if ($db_connection->connect_error) {
			die($db_connection->connect_error);
		}

		/* Query */
		$email = mysqli_real_escape_string($db_connection, $email);
		$password = crypt(mysqli_real_escape_string($db_connection, $password), "allen");
		$query = "select * from applicants where email=\"$email\" AND password=\"$password\"";

		/* Executing query */
		$result = $db_connection->query($query);
		if (!$result) {
			die("Retrieval failed: ". $db_connection->error);
		} else {
			/* Number of rows found */
			$num_rows = $result->num_rows;
			if ($num_rows === 0) {
				$body = invalidEmailPassword();
			} else {
				$result->data_seek(0);
				$row = $result->fetch_array(MYSQLI_ASSOC);

				$body = formPreFilled($row);

			}
		}

		$result->close();
		$db_connection->close();

	} elseif (isset($_POST["adminDisplayApplications"])) {
		$fieldsToShow = $_POST["fieldsToShow"];
		$filterCondition = $_POST["filterCondition"];
		$sortedByField = $_POST["fieldToBeSort"];

		$db_connection = new mysqli($host, $DBuser, $DBpassword, $database);
		if ($db_connection->connect_error) {
			die($db_connection->connect_error);
		}

		$filterCondition = mysqli_real_escape_string($db_connection, $filterCondition);
		$sortedByField = mysqli_real_escape_string($db_connection, $sortedByField);
		$query = sprintf("select * from applicants where %s order by %s", $filterCondition, $sortedByField);

		$result = $db_connection->query($query);
		if (!$result) {
			die("Retrieval failed: ". $db_connection->error);
		} else {
			/* Number of rows found */
			$num_rows = $result->num_rows;
			if ($num_rows === 0) {
				echo "Empty Table<br>";
			} else {
				$body = "<h1>Applications</h1><br>";
				$body .= "<table border=\"1\">";
				$body .= "<tr>";
				if (in_array("name", $fieldsToShow)) {
					$body .= "<th>Name</th>";
				}
				if (in_array("email", $fieldsToShow)) {
					$body .= "<th>Email</th>";
				}
				if (in_array("gpa", $fieldsToShow)) {
					$body .= "<th>Gpa</th>";
				}
				if (in_array("year", $fieldsToShow)) {
					$body .= "<th>Year</th>";
				}
				if (in_array("gender", $fieldsToShow)) {
					$body .= "<th>Gender</th>";
				}
				$body .= "</tr>";
				for ($row_index = 0; $row_index < $num_rows; $row_index++) {
					$result->data_seek($row_index);
					$row = $result->fetch_array(MYSQLI_ASSOC);

					$body .= "<tr>";
					if (in_array("name", $fieldsToShow)) {
						$body .= "<td>{$row['name']}</td>";
					}
					if (in_array("email", $fieldsToShow)) {
						$body .= "<td>{$row['email']}</td>";
					}
					if (in_array("gpa", $fieldsToShow)) {
						$body .= "<td>{$row['gpa']}</td>";
					}
					if (in_array("year", $fieldsToShow)) {
						$body .= "<td>{$row['year']}</td>";
					}
					if (in_array("gender", $fieldsToShow)) {
						$body .= "<td>{$row['gender']}</td>";
					}
					$body .= "</tr>";
				}
				$body .= "</table><br>";
			}
		}

		$result->close();
		$db_connection->close();

		$body .= "<form action=\"$scriptName\" method=\"post\">";
		$body .= "<input type=\"submit\" value=\"Return to main menu\" name=\"return\" /></form>";

	} elseif (isset($_POST["return"])) {
		header("Location: http://localhost/ApplicationSystem/main.html");
	} elseif (isset($_POST["updateAppAction"])) {
    /***************************
    =============================
    code from here is for after the user hits Submit Data in Update Application
    =============================
    *****************************/
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $gpa = trim($_POST["GPA"]);
    $year = trim($_POST["year"]);
    $gender = trim($_POST["gender"]);
    $password = $_POST["password"];
    $verifyPassword = $_POST["verifyPassword"];

    if ($password != $verifyPassword) {
    	$body = "<h1>Password and password verification values do not match.<h1><br>";
    	$body .= "<form action=\"$scriptName\" method=\"post\">";
    	$body .= "<input type=\"submit\" value=\"Return to main menu\" name=\"return\" /></form>";
    } else {

    	$db_connection = new mysqli($host, $DBuser, $DBpassword, $database);
    	if ($db_connection->connect_error) {
    		die($db_connection->connect_error);
    	}
			// figure out if user changed the password field or not by retrieving password from database
			$email = mysqli_real_escape_string($db_connection, $email);
			$query = "select * from applicants where email=\"$email\"";
			$result = $db_connection->query($query);
			if (!$result) {
				die("Retrieval failed: ". $db_connection->error);
			} else {
				$result->data_seek(0);
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$retrievedPassword = $row["password"];
			}


    	/* Query */
      $name = mysqli_real_escape_string($db_connection, $name);
      $email = mysqli_real_escape_string($db_connection, $email);
      $gpa = mysqli_real_escape_string($db_connection, $gpa);
			$year = mysqli_real_escape_string($db_connection, $year);
      $gender = mysqli_real_escape_string($db_connection, $gender);
			if ($retrievedPassword != $password) {
				$password = crypt(mysqli_real_escape_string($db_connection, $password), "allen");
				$query = "update applicants set name=\"$name\",email=\"$email\",
	                      gpa=$gpa,year=$year,gender=\"$gender\",password=\"$password\" where
	                      email=\"$email\" ";
			} else {
				$query = "update applicants set name=\"$name\",email=\"$email\",
												gpa=$gpa,year=$year,gender=\"$gender\" where
												email=\"$email\" ";
			}

    	/* Executing query */
    	$result = $db_connection->query($query);
    	if (!$result) {
    		die("Update failed: " . $db_connection->error);
    	}

      $db_connection->close();

			$p1 = new Applicant($name, $email, $gpa, $year, $gender, $password);
    	$body = "<h1>The following entry has been updated to the database and the new values are:</h1><br>";
			$body .= "<strong>Name</strong>: ".$p1->getName()."<br>";
			$body .= "<strong>Email</strong>: ".$p1->getEmail()."<br>";
			$body .= "<strong>GPA</strong>: ".$p1->getGpa()."<br>";
			$body .= "<strong>Year</strong>: ".$p1->getYear()."<br>";
			$body .= "<strong>Gender</strong>: ".$p1->getGender()."<br><br>";

    	$body .= "<form action=\"$scriptName\" method=\"post\">";
    	$body .= "<input type=\"submit\" value=\"Return to main menu\" name=\"return\" /></form>";
    }
	}else {
		$nameValue = "";
		$passwordValue = "";
	}

/***************************
=============================
code from here is the page after main.html
=============================
*****************************/

// checks which button the user entered to display correct content
if (isset($_POST["submitFromMain"])) {
	$option = $_POST['submitFromMain'];

	if ($option == "Submit Application") {
		$body = <<<LABEL
		<form action="$scriptName" method="post">
				<strong>Name: </strong>
				<input type="text" name="name" /><br /><br />
				<strong>Email: </strong>
				<input type="email" name="email" /><br /><br />
				<strong>GPA: </strong>
				<input type="text" name="GPA" /><br /><br />
				<strong>Year: </strong>
				<input type="radio" name="year" value="10" />10
				<input type="radio" name="year" value="11" />11
				<input type="radio" name="year" value="12" />12
				<br /> <br />
				<strong>Gender: </strong>
				<input type="radio" name="gender" value="M" />M
				<input type="radio" name="gender" value="F" />F
				<br /> <br />
				<strong>Password: </strong>
				<input type="password" name="password" /><br /> <br />
				<strong>Verify Password: </strong>
				<input type="password" name="verifyPassword" /><br /> <br />
				<input type="submit" value="Submit Data" name="submitApp"/> <br /> <br />
				<input type="submit" value="Return to main menu" name="return"/>
		</form>
LABEL;

	} elseif ($option == "Review Application") {
		$body = <<<LABEL
		<form action="$scriptName" method="post">
				<strong>Email associated with application: </strong>
				<input type="email" name="email" /> <br /><br />
				<strong>Password associated with application: </strong>
				<input type="password" name="password" /> <br /><br />
				<input type="submit" value="Submit" name="reviewApp" /> <br /> <br />
				<input type="submit" value="Return to main menu" name="return"/>
		</form>
LABEL;

	} elseif ($option == "Update Application") {
		$body = <<<LABEL
		<form action="$scriptName" method="post">
				<strong>Email associated with application: </strong>
				<input type="email" name="email" /> <br /><br />
				<strong>Password associated with application: </strong>
				<input type="password" name="password" /> <br /><br />
				<input type="submit" value="Submit" name="updateApp"/> <br /> <br />
				<input type="submit" value="Return to main menu" name="return"/>
		</form>
LABEL;

	} elseif ($option == "Administrative") {
		$user = crypt("main", "allen");
		$password = crypt("terps", "allen");

		if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) &&
		    crypt($_SERVER['PHP_AUTH_USER'], "allen") == $user && crypt($_SERVER['PHP_AUTH_PW'],"allen") == $password){
				$body = <<<LABEL
				<h1>Applications</h1>
				<br>
				<form action="$scriptName" method="post">
					<strong>Select fields to display</strong><br>
					<select name="fieldsToShow[]" multiple="multiple" required>
						<option value="name">name</option>
						<option value="email">email</option>
						<option value="gpa">gpa</option>
						<option value="year">year</option>
						<option value="gender">gender</option>
					</select><br /> <br />
					<strong>Select field to sort applications</strong>
					<select name="fieldToBeSort">
						<option value="name">name</option>
						<option value="email">email</option>
						<option value="gpa">gpa</option>
						<option value="year">year</option>
						<option value="gender">gender</option>
					</select> <br /> <br />
					<strong>Filter Condition</strong>
					<input type="text" name="filterCondition" /> <br /><br />
					<input type="submit" value="Display Application" name="adminDisplayApplications" /> <br /> <br />
					<input type="submit" value="Return to main menu" name="return" />
				</form>
LABEL;
			} else {
				header("WWW-Authenticate: Basic realm=\"Example System\"");
				header("HTTP/1.0 401 Unauthorized");
				exit;
			}
	}

}

  $page = generatePage($body, "cmsc389n Project4s");
	echo $page;

?>
