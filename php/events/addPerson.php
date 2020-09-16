<?php
include '../classroom.php';
include '../person.php';
include '../rectangle.php';
include 'start.php';

$class = $__GET;
$person = $__GET;
$isTeacher = $__GET;

if ($class == '1') {
    if ($isTeacher == true) {
        $newPerson = new Instructor($person, $rec101);
        $class1->addPerson($newPerson);
        $rec101->addPerson();
        $jsonClass = json_encode($class1);
        echo $jsonClass;
    }
    $newPerson = new Person($person, $rec101);
    $class1->addPerson($newPerson);
    $rec101->addPerson();
    $jsonClass = json_encode($class1);
    echo $jsonClass;
}
elseif ($class == '2') {
    if ($isTeacher == true) {
        $newPerson = new Instructor($person, $rec201);
        $class2->addPerson($newPerson);
        $rec201->addPerson();
        $jsonClass = json_encode($class2);
        echo $jsonClass;
    }
    $newPerson = new Person($person, $rec201);
    $class2->addPerson($newPerson);
    $rec201->addPerson();
    $jsonClass = json_encode($class2);
    echo $jsonClass;
}
else {
    if ($isTeacher == true) {
        $newPerson = new Instructor($person, $rec301);
        $class3->addPerson($newPerson);
        $rec301->addPerson();
        $jsonClass = json_encode($class3);
        echo $jsonClass;
    }
    $newPerson = new Person($person, $rec301);
    $class3->addPerson($newPerson);
    $rec301->addPerson();
    $jsonClass = json_encode($class3);
    echo $jsonClass;
}

?>