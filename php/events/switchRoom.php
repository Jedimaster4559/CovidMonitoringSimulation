<?php
include '../classroom.php';
include '../person.php';
include '../rectangle.php';
include 'start.php';

$class = $__GET;

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