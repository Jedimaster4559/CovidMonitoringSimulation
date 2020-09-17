<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

$person = $_REQUEST["personId"];
$personClass;
$continue = true;

$c1People = $class1->occupants;
$c1Count = 0;
echo $person;
echo count($class1->occupants);
echo count($class1->rectangles);
while ($c1Count < count($class1->occupants)) {
    $myPerson = $class1->occupants[$c1Count];
    if ($myPerson->personId == $person) {
        $rec = $myPerson->rectangle;
        $rec->clean();
        $personClass = $class1;
        $continue = false;
    }
    $c1Count++;
}

if ($continue == false) {
    $jsonClass = json_encode($personClass);
    echo $jsonClass;
}

else {
    $c2People = $class2->occupants;
    $c2Count = 0;
    while ($c2Count < count($class2->occupants)) {
        $myPerson = $class2->occupants[$c2Count];
        if ($myPerson->personId == $person) {
            $rec = $myPerson->rectangle;
            $rec->clean();
            $personClass = $class2;
            $continue = false;
        }
        $c2Count++;
    }

    if ($continue == false) {
        $jsonClass = json_encode($personClass);
        echo $jsonClass;
    }

    else {
        $c3People = $class3->occupants;
        $c3Count = 0;
        while ($c3Count < count($class3->occupants)) {
            $myPerson = $class3->occupants[$c3Count];
            if ($myPerson->personId == $person) {
                $rec = $myPerson->rectangle;
                $rec->clean();
                $personClass = $class3;
                $continue = false;
            }
            $c3Count++;
        }
        // $jsonClass = json_encode($personClass);
        // echo $jsonClass;
    }
}

?>