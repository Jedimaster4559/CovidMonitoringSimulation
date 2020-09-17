<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

$person = $_REQUEST["personId"];
$class = $_REQUEST["classroomId"];

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
        $personFromFile = cast($class1->occupants[$c1Count], "Person");
        if ($person == $personFromFile->personId) {
            $recLoc = $personFromFile->rectangle->destinationId;
            $rec = cast($class1->rectangles[$recLoc-1], "Cleaner");
            $rec->clean();
            $class1->rectangles[$recLoc-1] = $rec;
            $personFromFile->rectangle = $rec;
            $class1->occupants[$c1Count] = $personFromFile;
            $jsonClass = json_encode($class1);
            $c1File = fopen('../text/class1.txt', 'w');
            fwrite($c1File, $jsonClass);
            fclose($c1File);
            echo $jsonClass;
        }
        $c1Count++;
    }
}
elseif ($class == '2') {
    $c2Text = file_get_contents('../text/class2.txt');
    $class2 = cast(json_decode($c2Text), "Classroom");
    $numPeople = count($class2->occupants);
    $c2Count = 0;

    while ($c2Count < $numPeople) {
        $personFromFile = cast($class2->occupants[$c2Count], "Person");
        if ($person == $personFromFile->personId) {
            $recLoc = $personFromFile->rectangle->destinationId;
            $rec = cast($class2->rectangles[$recLoc-1], "Cleaner");
            $rec->clean();
            $class2->rectangles[$recLoc-1] = $rec;
            $personFromFile->rectangle = $rec;
            $class2->occupants[$c2Count] = $personFromFile;
            $jsonClass = json_encode($class2);
            $c2File = fopen('../text/class2.txt', 'w');
            fwrite($c2File, $jsonClass);
            fclose($c2File);
            echo $jsonClass;
        }
        $c2Count++;
    }
}
else {
    $c3Text = file_get_contents('../text/class3.txt');
    $class3 = cast(json_decode($c3Text), "Classroom");
    $numPeople = count($class3->occupants);
    $c3Count = 0;

    while ($c3Count < $numPeople) {
        $personFromFile = cast($class3->occupants[$c3Count], "Person");
        if ($person == $personFromFile->personId) {
            $recLoc = $personFromFile->rectangle->destinationId;
            $rec = cast($class3->rectangles[$recLoc-1], "Cleaner");
            $rec->clean();
            $class3->rectangles[$recLoc-1] = $rec;
            $personFromFile->rectangle = $rec;
            $class3->occupants[$c3Count] = $personFromFile;
            $jsonClass = json_encode($class3);
            $c3File = fopen('../text/class3.txt', 'w');
            fwrite($c3File, $jsonClass);
            fclose($c3File);
            echo $jsonClass;
        }
        $c3Count++;
    }
}

?>