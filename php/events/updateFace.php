<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

// The updateFace event class takes in the classroomId of the
// Classroom the Person is in, the PersonId, a bool of whether 
// the Person is wearing a mask, and a bool of whether or not
// the Person is wearing a faceshield
$class = $_REQUEST["classroomId"];
$person = $_REQUEST["personId"];
$mask = $_REQUEST["mask"];
$faceshield = $_REQUEST["faceshield"];

// Fixes a PHP serialization issue
// https://tommcfarlin.com/cast-a-php-standard-class-to-a-specific-type/
function cast($instance, $className) {
    return unserialize(sprintf('O:%d:"%s"%s', \strlen($className), $className, strstr(strstr(serialize($instance), '"'), ':')));    
}

// Checks which Classroom needs to be searched
if ($class == '1') {
    // Gets the Classroom object from the text file 
    $c1Text = file_get_contents('../text/class1.txt');
    $class1 = cast(json_decode($c1Text), "Classroom");
    $numPeople = count($class1->occupants);
    $c1Count = 0;

    // Searches for the Person
    while ($c1Count < $numPeople) {
        $personFromFile = cast($class1->occupants[$c1Count], "Person");
        // When the person is found, call the function that 
        // changes the boolean value of the mask or 
        // face shield and store the updated class in 
        // the Classroom's text file.
        if ($person == $personFromFile->personId) {
            if ($mask == "false") {
                $personFromFile->wearMaskIncorrectly();
                $class1->occupants[$c1Count] = $personFromFile;
                $jsonClass = json_encode($class1);
                $c1File = fopen('../text/class1.txt', 'w');
                fwrite($c1File, $jsonClass);
                fclose($c1File);
            }
            elseif ($mask == "true") {
                $personFromFile->wearMaskCorrectly();
                $class1->occupants[$c1Count] = $personFromFile;
                $jsonClass = json_encode($class1);
                $c1File = fopen('../text/class1.txt', 'w');
                fwrite($c1File, $jsonClass);
                fclose($c1File);
            }
            if ($personFromFile->status == "teacher") {
                $personFromFile = cast($class1->occupants[$c1Count], "Instructor");
                if ($faceshield == "false") {
                    $personFromFile->wearShieldIncorrectly();
                    $class1->occupants[$c1Count] = $personFromFile;
                    $jsonClass = json_encode($class1);
                    $c1File = fopen('../text/class1.txt', 'w');
                    fwrite($c1File, $jsonClass);
                    fclose($c1File);
                }
                elseif ($faceshield == "true") {
                    $personFromFile->wearShieldCorrectly();
                    $class1->occupants[$c1Count] = $personFromFile;
                    $jsonClass = json_encode($class1);
                    $c1File = fopen('../text/class1.txt', 'w');
                    fwrite($c1File, $jsonClass);
                    fclose($c1File);
                }
            }
        }
        $c1Count++;
    }
    echo $jsonClass;
}
// Do the same if the Classroom is 2.
elseif ($class == '2') {
    $c2Text = file_get_contents('../text/class2.txt');
    $class2 = cast(json_decode($c2Text), "Classroom");
    $numPeople = count($class2->occupants);
    $c2Count = 0;

    while ($c2Count < $numPeople) {
        $personFromFile = cast($class2->occupants[$c2Count], "Person");
        if ($person == $personFromFile->personId) {
            if ($mask == "false") {
                $personFromFile->wearMaskIncorrectly();
                $class2->occupants[$c2Count] = $personFromFile;
                $jsonClass = json_encode($class2);
                $c2File = fopen('../text/class2.txt', 'w');
                fwrite($c2File, $jsonClass);
                fclose($c2File);
            }
            elseif ($mask == "true") {
                $personFromFile->wearMaskCorrectly();
                $class2->occupants[$c2Count] = $personFromFile;
                $jsonClass = json_encode($class2);
                $c2File = fopen('../text/class2.txt', 'w');
                fwrite($c2File, $jsonClass);
                fclose($c2File);
            }
            if ($personFromFile->status == "teacher") {
                $personFromFile = cast($class2->occupants[$c2Count], "Instructor");
                if ($faceshield == "false") {
                    $personFromFile->wearShieldIncorrectly();
                    $class2->occupants[$c2Count] = $personFromFile;
                    $jsonClass = json_encode($class2);
                    $c2File = fopen('../text/class2.txt', 'w');
                    fwrite($c2File, $jsonClass);
                    fclose($c2File);
                }
                elseif ($faceshield == "true") {
                    $personFromFile->wearShieldCorrectly();
                    $class2->occupants[$c2Count] = $personFromFile;
                    $jsonClass = json_encode($class2);
                    $c2File = fopen('../text/class2.txt', 'w');
                    fwrite($c2File, $jsonClass);
                    fclose($c2File);
                }
            }
        }
        $c2Count++;
    }
    echo $jsonClass;
}
// Do the same if the Classroom is 3.
else {
    $c3Text = file_get_contents('../text/class3.txt');
    $class3 = cast(json_decode($c3Text), "Classroom");
    $numPeople = count($class3->occupants);
    $c3Count = 0;

    while ($c3Count < $numPeople) {
        $personFromFile = cast($class3->occupants[$c3Count], "Person");
        if ($person == $personFromFile->personId) {
            if ($mask == "false") {
                $personFromFile->wearMaskIncorrectly();
                $class3->occupants[$c3Count] = $personFromFile;
                $jsonClass = json_encode($class3);
                $c3File = fopen('../text/class3.txt', 'w');
                fwrite($c3File, $jsonClass);
                fclose($c3File);
            }
            elseif ($mask == "true") {
                $personFromFile->wearMaskCorrectly();
                $class3->occupants[$c3Count] = $personFromFile;
                $jsonClass = json_encode($class3);
                $c3File = fopen('../text/class3.txt', 'w');
                fwrite($c3File, $jsonClass);
                fclose($c3File);
            }
            if ($personFromFile->status == "teacher") {
                $personFromFile = cast($class3->occupants[$c3Count], "Instructor");
                if ($faceshield == "false") {
                    $personFromFile->wearShieldIncorrectly();
                    $class3->occupants[$c3Count] = $personFromFile;
                    $jsonClass = json_encode($class3);
                    $c3File = fopen('../text/class3.txt', 'w');
                    fwrite($c3File, $jsonClass);
                    fclose($c3File);
                }
                elseif ($faceshield == "true") {
                    $personFromFile->wearShieldCorrectly();
                    $class3->occupants[$c3Count] = $personFromFile;
                    $jsonClass = json_encode($class3);
                    $c3File = fopen('../text/class3.txt', 'w');
                    fwrite($c3File, $jsonClass);
                    fclose($c3File);
                }
            }
        }
        $c3Count++;
    }
    echo $jsonClass;
}

?>