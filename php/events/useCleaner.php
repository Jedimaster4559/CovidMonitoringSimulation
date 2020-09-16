<?php
include '../classroom.php';
include '../person.php';
include '../rectangle.php';
include 'start.php';

$person = $__GET;
$personClass;
$continue = true;

$c1People = $class1->occupants;
$c1Count = 0;
while ($c1Count < count($class1->occupants)) {
    $myPerson = $class1->occupants[$c1Count];
    if ($myPerson->personId == $person) {
        $rec = $myPerson->rectangle;
        $rec->clean();
        $personClass = $class1;
        $continue = false;
    }
}

if ($continue == false) {
    $jsonClass = json_encode($personClass);
    echo $jsonClass;
}

else {
    $c2People = $class2->occupants;
    $c2Count = 0;
    while ($c1Count < count($class2->occupants)) {
        $myPerson = $class2->occupants[$c2Count];
        if ($myPerson->personId == $person) {
            $rec = $myPerson->rectangle;
            $rec->clean();
            $personClass = $class2;
            $continue = false;
        }
    }

    if ($continue == false) {
        $jsonClass = json_encode($personClass);
        echo $jsonClass;
    }

    else {
        $c3People = $class3->occupants;
        $c3Count = 0;
        while ($c1Count < count($class1->occupants)) {
            $myPerson = $class1->occupants[$c1Count];
            if ($myPerson->personId == $person) {
                $rec = $myPerson->rectangle;
                $rec->clean();
                $personClass = $class1;
                $continue = false;
            }
        }
        $jsonClass = json_encode($personClass);
        echo $jsonClass;
    }
}

?>