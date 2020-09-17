<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

$person = $_REQUEST["personId"];
$class = $_REQUEST["classroomId"];

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
    $numPeople = count($class1->occupants);
    $c1Count = 0;

    while ($c1Count < $numPeople) {
        if ($person == (string)$class1->occupants[$c1Count]) {
            $person = cast($class1->occupants[$c1Count], "Person");
            $rec = cast($person->rectangle, "Rectangle");
            $rec->clean();
            $person->rectangle = $rec;
            $recLoc = $rec->destinationId;
            $classRec = $class1->rectangle[$recLoc];
            $classRec = $rec;
            $jsonClass = json_encode($class1);
            $c1File = fopen('../text/class1.txt', 'w');
            fwrite($c1File, $jsonClass);
            fclose($c1File);
        }
    }
}
elseif ($class == '2') {
    $c2Text = file_get_contents('../text/class2.txt');
    $class2 = cast(json_decode($c2Text), "Classroom");
    $numPeople = count($class2->occupants);
    $c2Count = 0;

    while ($c2Count < $numPeople) {
        if ($person == (string)$class2->occupants[$c2Count]) {
            $person = cast($class2->occupants[$c2Count], "Person");
            $rec = cast($person->rectangle, "Rectangle");
            $rec->clean();
            $person->rectangle = $rec;
            $recLoc = $rec->destinationId;
            $classRec = $class2->rectangle[$recLoc];
            $classRec = $rec;
            $jsonClass = json_encode($class2);
            $c2File = fopen('../text/class2.txt', 'w');
            fwrite($c2File, $jsonClass);
            fclose($c2File);
        }
    }
}
else {
    $c3Text = file_get_contents('../text/class3.txt');
    $class3 = cast(json_decode($c3Text), "Classroom");
    $numPeople = count($class3->occupants);
    $c3Count = 0;

    while ($c3Count < $numPeople) {
        if ($person == (string)$class3->occupants[$c3Count]) {
            $person = cast($class3->occupants[$c3Count], "Person");
            $rec = cast($person->rectangle, "Rectangle");
            $rec->clean();
            $person->rectangle = $rec;
            $recLoc = $rec->destinationId;
            $classRec = $class3->rectangle[$recLoc];
            $classRec = $rec;
            $jsonClass = json_encode($class3);
            $c3File = fopen('../text/class3.txt', 'w');
            fwrite($c3File, $jsonClass);
            fclose($c3File);
        }
    }
}

echo $jsonClass;

?>