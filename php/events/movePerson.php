<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

$class = $_REQUEST["classroomId"];
$person = $_REQUEST["personId"];
$destination = $_REQUEST["destinationId"];
$wipe = $_REQUEST["wipe"];

if ($class == 1) {
    $people = $class1->occupants;
    $rectangles = $class1->rectangles;
    $count = 0;
    while ($count < count($class1->rectangles)) {
        $moveHere = $rectangles[$count];
        if ($moveHere->destinationId === $destination) {
            $rectangleMove = $moveHere;
        }
        $count++;
    }
    $count = 0;
    while ($count < count($class1->occupants)) {
        $moving = $people[$count];
        if ($moving->personId === $person) {
            $leavning = $moving->rectangle;
            $moving->move($leaving, $rectangleMove);
            if (($moveHere->type === "desk") && ($wipe == true)) {
                $moveHere->enterUse();
            }
            elseif (($moveHere->type === "desk") && ($wipe == false)) {
                $moveHere->enterNoUse();
            }
            $jsonClass = json_encode($class1);
            echo $jsonClass;
        }
        $count++;
    }
}

elseif ($class == 2) {
    $people = $class2->occupants;
    $rectangles = $class2->rectangles;
    $count = 0;
    while ($count < count($class2->rectangles)) {
        $moveHere = $rectangles[$count];
        if ($moveHere->destinationId === $destination) {
            $rectangleMove = $moveHere;
        }
        $count++;
    }
    $count = 0;
    while ($count < count($class2->occupants)) {
        $moving = $people[$count];
        if ($moving->personId === $person) {
            $leavning = $moving->rectangle;
            $moving->move($leaving, $rectangleMove);
            if (($moveHere->type === "desk") && ($wipe == true)) {
                $moveHere->enterUse();
            }
            elseif (($moveHere->type === "desk") && ($wipe == false)) {
                $moveHere->enterNoUse();
            }
            $jsonClass = json_encode($class2);
            echo $jsonClass;
        }
        $count++;
    }
}
else {
    $people = $class3->occupants;
    $rectangles = $class3->rectangles;
    $count = 0;
    while ($count < count($class3->rectangles)) {
        $moveHere = $rectangles[$count];
        if ($moveHere->destinationId === $destination) {
            $rectangleMove = $moveHere;
        }
        $count++;
    }
    $count = 0;
    while ($count < count($class3->occupants)) {
        $moving = $people[$count];
        if ($moving->personId === $person) {
            $leavning = $moving->rectangle;
            $moving->move($leave, $rectangleMove);
            if (($moveHere->type === "desk") && ($wipe == true)) {
                $moveHere->enterUse();
            }
            elseif (($moveHere->type === "desk") && ($wipe == false)) {
                $moveHere->enterNoUse();
            }
            $jsonClass = json_encode($class3);
            echo $jsonClass;
        }
        $count++;
    }
}

fclose($c1File);
fclose($c2File);
fclose($c3File);

?>