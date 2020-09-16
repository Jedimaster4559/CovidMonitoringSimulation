<?php
include '../classroom.php';
include '../person.php';
include '../rectangle.php';
include 'start.php';

// Format: GET
// ```
// Fields
// ```
// personId: int
// mask: boolean
// faceshield: boolean
// ```
// Example Request
// ```
// events.php?personId=2&mask=true&faceshield=false

$person = $__GET;
$mask = $__GET;
$faceshield = $__GET;
$personClass;
$continue = true;

$c1People = $class1->occupants;
$c1Count = 0;
while ($c1Count < count($class1->occupants)) {
    $myPerson = $class1->occupants[$c1Count];
    if ($myPerson->personId == $person) {
        if ($myPerson->status == "student") {
            if ($mask == false) {
                $myPerson->wearMaskIncorrectly();
            }
            elseif ($mask == true) {
                $myPerson->wearMaskCorrectly();
            }
        }
        else {
            if ($mask == false) {
                $myPerson->wearMaskIncorrectly();
            }
            elseif ($mask == true) {
                $myPerson->wearMaskCorrectly();
            }
            if ($faceshield == false) {
                $myPerson->wearFaceShieldIncorrectly();
            }
            elseif ($faceshield == true) {
                $myPerson->wearCorrectly();
            }
        }
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
    while ($c2Count < count($class2->occupants)) {
        $myPerson = $class2->occupants[$c1Count];
        if ($myPerson->personId == $person) {
            if ($myPerson->status == "student") {
                if ($mask == false) {
                    $myPerson->wearMaskIncorrectly();
                }
                elseif ($mask == true) {
                    $myPerson->wearMaskCorrectly();
                }
            }
            else {
                if ($mask == false) {
                    $myPerson->wearMaskIncorrectly();
                }
                elseif ($mask == true) {
                    $myPerson->wearMaskCorrectly();
                }
                if ($faceshield == false) {
                    $myPerson->wearFaceShieldIncorrectly();
                }
                elseif ($faceshield == true) {
                    $myPerson->wearFaceShieldCorrectly();
                }
            }
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
        while ($c3Count < count($class3->occupants)) {
            $myPerson = $class3->occupants[$c1Count];
            if ($myPerson->personId == $person) {
                if ($myPerson->status == "student") {
                    if ($mask == false) {
                        $myPerson->wearMaskIncorrectly();
                    }
                    elseif ($mask == true) {
                        $myPerson->wearMaskCorrectly();
                    }
                }
                else {
                    if ($mask == false) {
                        $myPerson->wearMaskIncorrectly();
                    }
                    elseif ($mask == true) {
                        $myPerson->wearMaskCorrectly();
                    }
                    if ($faceshield == false) {
                        $myPerson->wearFaceShieldIncorrectly();
                    }
                    elseif ($faceshield == true) {
                        $myPerson->wearFaceShieldCorrectly();
                    }
                }
                $personClass = $class1;
                $continue = false;
            }
        }
        $jsonClass = json_encode($personClass);
        echo $jsonClass;
    }
}

?>