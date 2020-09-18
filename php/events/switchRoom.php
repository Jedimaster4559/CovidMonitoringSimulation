<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

// The switchRoom event class gets the classroomId of the
// Classroom the user wants to view.
$class = $_REQUEST["classroomId"];

// Checks which class the user wants and echos 
// the contents of the corresponding Classroom's
// text file, which contains the Classroom as a 
// JSON object.
if ($class == 1) {
    $jsonClass = file_get_contents('../text/class1.txt');
    echo $jsonClass;
}
elseif ($class == 2) {
    $jsonClass = file_get_contents('../text/class2.txt');
    echo $jsonClass;
}
else {
    $jsonClass = file_get_contents('../text/class3.txt');
    echo $jsonClass;
}

?>