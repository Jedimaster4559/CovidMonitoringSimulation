<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

$class = $_REQUEST["classroomId"];
$person = $_REQUEST["personId"];
$isTeacher = $_REQUEST["isTeacher"];

// function decode($class) {
//     $rec1 = $class->rectangles[0];
//     $rec2 = $class->rectangles[1];
//     $rec3 = $class->rectangles[2];
//     $rec4 = $class->rectangles[3];
//     $rec5 = $class->rectangles[4];
//     $rec6 = $class->rectangles[5];
//     $rec7 = $class->rectangles[6];
//     $rec8 = $class->rectangles[7];
//     $rec9 = $class->rectangles[8];
//     $rec10 = $class->rectangles[9];
//     $rec11 = $class->rectangles[10];
//     $rec12 = $class->rectangles[11];
//     if (count($class->occupants) == 1) {
//         $per1 = $class->occupants[0];
//     }
//     elseif (count($class->occupants) == 2) {
//         $per1 = $class->occupants[0];
//         $per2 = $class->occupants[1];
//     }
//     elseif (count($class->occupants) == 3) {
//         $per1 = $class->occupants[0];
//         $per2 = $class->occupants[1];
//         $per3 = $class->occupants[2];
//     }
//     elseif (count($class->occupants) == 4) {
//         $per1 = $class->occupants[0];
//         $per2 = $class->occupants[1];
//         $per3 = $class->occupants[2];
//         $per4 = $class->occupants[3];
//     }
//     elseif (count($class->occupants) == 5) {
//         $per1 = $class->occupants[0];
//         $per2 = $class->occupants[1];
//         $per3 = $class->occupants[2];
//         $per4 = $class->occupants[3];
//         $per5 = $class->occupants[4];
//     }
//     elseif (count($class->occupants) == 6) {
//         $per1 = $class->occupants[0];
//         $per2 = $class->occupants[1];
//         $per3 = $class->occupants[2];
//         $per4 = $class->occupants[3];
//         $per5 = $class->occupants[4];
//         $per6 = $class->occupants[5];
//     }
// }

// Fixes a PHP serialization issue
// https://tommcfarlin.com/cast-a-php-standard-class-to-a-specific-type/
function cast($instance, $className) {
    return unserialize(sprintf('O:%d:"%s"%s', \strlen($className), $className, strstr(strstr(serialize($instance), '"'), ':')));    
}

if ($class == '1') {
    $c1Text = file_get_contents('../text/class1.txt');
    $class1 = cast(json_decode($c1Text), "Classroom");
    $rec1 = cast($class1->rectangles[0], "Rectangle");

    if ($isTeacher == "true") {
        $newPerson = new Instructor($person, $rec1);
        $class1->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class1);
        $c1File = fopen('../text/class1.txt', 'w');
        fwrite($c1File, $jsonClass);
    }
    else {
        $newPerson = new Person($person, $rec1);
        $class1->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class1);
        $c1File = fopen('../text/class1.txt', 'w');
        fwrite($c1File, $jsonClass);
    }
}
elseif ($class == '2') {
    $c2Text = file_get_contents('../text/class2.txt');
    $class2 = json_decode($c2Text);
    $rec1 = $class2->rectangles[0];

    if ($isTeacher == "true") {
        $newPerson = new Instructor($person, $rec1);
        $class2->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class2);
        $c2File = fopen('../text/class2.txt', 'w');
        fwrite($c2File, $jsonClass);
    }
    else {
        $newPerson = new Person($person, $rec1);
        $class2->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class2);
        $c2File = fopen('../text/class2.txt', 'w');
        fwrite($c2File, $jsonClass);
    }    
}
else {
    $c3Text = file_get_contents('../text/class3.txt');
    $class3 = json_decode($c3Text);
    $rec1 = $class3->rectangles[0];

    if ($isTeacher == "true") {
        $newPerson = new Instructor($person, $rec1);
        $class3->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class3);
        $c3File = fopen('../text/class1.txt', 'w');
        fwrite($c3File, $jsonClass);
    }
    else {
        $newPerson = new Person($person, $rec1);
        $class3->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class3);
        $c3File = fopen('../text/class3.txt', 'w');
        fwrite($c3File, $jsonClass);
    }
}

echo $jsonClass;

?>