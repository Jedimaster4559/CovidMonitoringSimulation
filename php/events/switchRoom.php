<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');
include_once('start.php');

$class = $_REQUEST["classroomId"];

if ($class == 1) {
    $jsonClass = json_encode($class1);
    echo $jsonClass;
}
elseif ($class == 2) {
    $jsonClass = json_encode($class2);
    echo $jsonClass;
}
else {
    $jsonClass = json_encode($class3);
    echo $jsonClass;
}

?>