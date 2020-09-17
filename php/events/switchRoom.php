<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

$class = $_REQUEST["classroomId"];



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