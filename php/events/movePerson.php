<?php
include '../classroom.php';
include '../person.php';
include '../rectangle.php';
include 'start.php';

// Format: GET
// ```
// Fields
// ```
// classroomId: int
// personId: int
// destinationId: int
// wipe: boolean
// ```
// Example Request
// ```
// events.php?classroomId=3&personId=4&destinationId=7&wipe=false

$class = $__GET;
$person = $__GET;
$destination = $__GET;
$wipe = $__GET;

if ($class == 1) {
    $people = $class1->occupants;
    $rectangles = $class1->rectangles;
    $count = 0;
    while ($count < count($class1->rectangles)) {
        $moveHere = $rectangles[$count];
        if ($moveHere->destinationId == $destination) {
            $rectangleMove = $moveHere;
        }
        $count++;
    }
    $count = 0;
    while ($count < count($class1->occupants)) {
        $moving = $people[$count];
        if ($moving->personID == $person) {
            $moving->move($moveHere);
            if ($wipe == true) {
                $moving->enterUse();
            }
            else {
                $moving->enterNoUse();
            }
            $jsonClass = $class1;
            echo $jsonClass;
        }
        $count++;
    }
}

if ($class == 2) {
    $people = $class2->occupants;
    $rectangles = $class2->rectangles;
    $count = 0;
    while ($count < count($class2->rectangles)) {
        $moveHere = $rectangles[$count];
        if ($moveHere->destinationId == $destination) {
            $rectangleMove = $moveHere;
        }
        $count++;
    }
    $count = 0;
    while ($count < count($class2->occupants)) {
        $moving = $people[$count];
        if ($moving->personID == $person) {
            $moving->move($moveHere);
            if ($wipe == true) {
                $moving->enterUse();
            }
            else {
                $moving->enterNoUse();
            }
            $jsonClass = $class2;
            echo $jsonClass;
        }
        $count++;
    }
}

if ($class == 3) {
    $people = $class3->occupants;
    $rectangles = $class3->rectangles;
    $count = 0;
    while ($count < count($class3->rectangles)) {
        $moveHere = $rectangles[$count];
        if ($moveHere->destinationId == $destination) {
            $rectangleMove = $moveHere;
        }
        $count++;
    }
    $count = 0;
    while ($count < count($class3->occupants)) {
        $moving = $people[$count];
        if ($moving->personID == $person) {
            $moving->move($moveHere);
            if ($wipe == true) {
                $moving->enterUse();
            }
            else {
                $moving->enterNoUse();
            }
            $jsonClass = $class3;
            echo $jsonClass;
        }
        $count++;
    }
}

?>