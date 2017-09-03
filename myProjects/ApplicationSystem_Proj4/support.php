<?php

function generatePage($body, $title="Example") {
    $page = <<<EOPAGE
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>$title</title>
    </head>

    <body>
            $body
    </body>
</html>
EOPAGE;

    return $page;
}

class Applicant {
    private $name;
    private $email;
    private $gpa;
    private $year;
    private $gender;
    private $password;

    public function __construct($name, $email, $gpa, $year, $gender, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->gpa = $gpa;
        $this->year = $year;
        $this->gender = $gender;
        $this->password = $password;
    }
    public function getName() {
            return $this->name;
    }

    public function getEmail() {
            return $this->email;
    }

    public function getGpa() {
            return $this->gpa;
    }

    public function getYear() {
            return $this->year;
    }

    public function getGender() {
            return $this->gender;
    }

    public function getPassword() {
      return $this->password;
    }
}



function passwordDontMatch() {
  $scriptName = "application.php";

  $result = "<h1>Password and password verification values do not match.<h1><br>";
  $result .= "<form action=\"$scriptName\" method=\"post\">";
  $result .= "<input type=\"submit\" value=\"Return to main menu\" name=\"return\" /></form>";
  return $result;
}

function invalidEmailPassword() {
  $scriptName = "application.php";


  $result = "<h1>No entry exists in the database for the specified email and password<h1><br>";
  $result .= "<form action=\"$scriptName\" method=\"post\">";
  $result .= "<input type=\"submit\" value=\"Return to main menu\" name=\"return\" /></form>";
  return $result;
}

function formPreFilled($array) {
  $scriptName = "application.php";

  $result = "<form action=\"$scriptName\" method=\"post\">";
  $result .= "<strong>Name: </strong> <input type=\"text\" name=\"name\" value=\"{$array["name"]}\" /><br /><br />";
  $result .= "<strong>Email: </strong> <input type=\"email\" name=\"email\" value=\"{$array["email"]}\" /><br /><br />";
  $result .= "<strong>GPA: </strong> <input type=\"text\" name=\"GPA\" value=\"{$array["gpa"]}\"/><br /><br />";
  $result .= "<strong>Year: </strong> <input type=\"radio\" name=\"year\" value=\"10\" ";
  if ($array["year"] == 10) {
    $result .= "checked=\"checked\" ";
  }
  $result .= "/>10";
  $result .= "<input type=\"radio\" name=\"year\" value=\"11\" ";
  if ($array["year"] == 11) {
    $result .= "checked=\"checked\" ";
  }
  $result .= "/>11";
  $result .= "<input type=\"radio\" name=\"year\" value=\"12\" ";
  if ($array["year"] == 12) {
    $result .= "checked=\"checked\" ";
  }
  $result .= "/>12 <br /> <br />";

  $result .= "<strong>Gender: </strong> <input type=\"radio\" name=\"gender\" value=\"M\" ";
  if ($array["gender"] == "M") {
    $result .= "checked=\"checked\" ";
  }
  $result .= "/>M";
  $result .= "<input type=\"radio\" name=\"gender\" value=\"F\" ";
  if ($array["gender"] == "F") {
    $result .= "checked=\"checked\" ";
  }
  $result .= "/>F <br /> <br />";

  $result .= "<strong>Password: </strong> <input type=\"password\" name=\"password\" value=\"{$array["password"]}\"/><br /> <br />";
  $result .= "<strong>Verify Password: </strong> <input type=\"password\" name=\"verifyPassword\" value=\"{$array["password"]}\"/><br /> <br />";

  $result .= "<input type=\"submit\" value=\"Submit Data\" name=\"updateAppAction\"/> <br /> <br />";
  $result .= "<input type=\"submit\" value=\"Return to main menu\" name=\"return\" />  </form>";
  return $result;
}

?>
