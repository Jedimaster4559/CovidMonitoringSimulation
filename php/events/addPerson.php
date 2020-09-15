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
        $newPerson = new Instructor($person);
        $class1->addPerson($newPerson);
    }
    $newPerson = new Person($person);
    $class1->addPerson($newPerson);
}
elseif ($class == '2') {
    if ($isTeacher == true) {
        $newPerson = new Instructor($person);
        $class2->addPerson($newPerson);
    }
    $newPerson = new Person($person);
    $class2->addPerson($newPerson);
}
else {
    if ($isTeacher == true) {
        $newPerson = new Instructor($person);
        $class3->addPerson($newPerson);
    }
    $newPerson = new Person($person);
    $class3->addPerson($newPerson);
}

?>