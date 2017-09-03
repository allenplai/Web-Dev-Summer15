<?php
$name = "Mary";
$candidate = &$name;
$director = &$name;
echo "Name: ",$name, "<br />";
echo "Candidate: ",$candidate, "<br />";
echo "Director: ",$director, "<br />";
$candidate = "Jose";
echo "After modifying candidate Name is ",$name, "<br />";
?>