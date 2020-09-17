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

if ($class == '1') {
    $c1File = file_get_contents('../text/class1.txt');
    $class1 = json_decode($c1File);
    $rec1 = $class1->rectangles[0];

    if ($isTeacher == true) {
        $newPerson = new Instructor($person, $rec1);
        $class1->addPerson($newPerson);
        $rec1->addPerson();
        $jsonClass = json_encode($class1);

    }
    else {
        $newPerson = new Person($person, $rec1);
        $class1->addPerson($newPerson);
        $rec1->addPerson();
        $jsonClass = json_encode($class1);
    }
}
elseif ($class == '2') {
    $c2File = file_get_contents('../text/class2.txt');
    $class2 = json_decode($c2File);
    $rec1 = $class2->rectangles[0];

    if ($isTeacher == true) {
        $newPerson = new Instructor($person, $rec1);
        $class2->addPerson($newPerson);
        $rec1->addPerson();
        $jsonClass = json_encode($class2);
    }
    else {
        $newPerson = new Person($person, $rec1);
        $class2->addPerson($newPerson);
        $rec1->addPerson();
        $jsonClass = json_encode($class2);
    }    
}
else {
    $c3File = file_get_contents('../text/class3.txt');
    $class3 = json_decode($c3File);
    $rec1 = $class3->rectangles[0];

    if ($isTeacher == true) {
        $newPerson = new Instructor($person, $rec1);
        $class3->addPerson($newPerson);
        $rec1->addPerson();
        $jsonClass = json_encode($class3);
    }
    else {
        $newPerson = new Person($person, $rec1);
        $class3->addPerson($newPerson);
        $rec1->addPerson();
        $jsonClass = json_encode($class3);
    }
}

echo $jsonClass;


?>