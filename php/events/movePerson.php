<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

// The movePerson event class takes in the classroomId of the Person
// to be moved, the Person's personId, and the ID of the Rectangle 
// the Person wants to move to.
$class = $_REQUEST["classroomId"];
$person = $_REQUEST["personId"];
$destination = $_REQUEST["destinationId"];

// Fixes a PHP serialization issue
// https://tommcfarlin.com/cast-a-php-standard-class-to-a-specific-type/
function cast($instance, $className) {
    return unserialize(sprintf('O:%d:"%s"%s', \strlen($className), $className, strstr(strstr(serialize($instance), '"'), ':')));    
}

if ($class == 1) {
    // Setup data to use
    $c1Text = file_get_contents('../text/class1.txt');
    $class1 = cast(json_decode($c1Text), "Classroom");

    // Setup counters
    $numPeople = count($class1->occupants);
    $c1Count = 0;

    // For loop searches for the right person based off id
    while ($c1Count < $numPeople) {
        $personFromFile = cast($class1->occupants[$c1Count], "Person");
        if ($person == $personFromFile->personId) {
            $rec = cast($personFromFile->rectangle, "Cleaner");

            // if working out of an aisle, we want to use regular
            // rectangle and not cleaner
            if($rec->type == "aisle"){
                $rec = cast($personFromFile->rectangle, "Rectangle");
            }

            // Move to new Tile
            $rec->leave();
            $oldrecLoc = ($rec->destinationId)-1;
            $class1->rectangles[$oldrecLoc] = $rec;

            // Cast the new rectangle as either a Cleaner or Rectangle
            if ($class1->rectangles[$destination-1]->type == "Cleaner") {
                $newRec = cast($class1->rectangles[$destination-1], "Cleaner");
            }
            else {
                $newRec = cast($class1->rectangles[$destination-1], "Rectangle");
            }
            $newRec->addPerson();
            $class1->rectangles[$destination-1] = $newRec;
            $personFromFile->rectangle = $newRec;
            $class1->occupants[$c1Count] = $personFromFile;
        
            // Write Data
            $jsonClass = json_encode($class1);
            $c1File = fopen('../text/class1.txt', 'w');
            fwrite($c1File, $jsonClass);
            fclose($c1File);
            echo $jsonClass;
        }
        $c1Count++;
    }

}
elseif ($class == 2) {
    // Setup data to use
    $c2Text = file_get_contents('../text/class2.txt');
    $class2 = cast(json_decode($c2Text), "Classroom");

    // Setup counters
    $numPeople = count($class2->occupants);
    $c2Count = 0;

    // For loop searches for the right person based off id
    while ($c2Count < $numPeople) {
        $personFromFile = cast($class2->occupants[$c2Count], "Person");
        if ($person == $personFromFile->personId) {
            $rec = cast($personFromFile->rectangle, "Cleaner");

            // if working out of an aisle, we want to use regular
            // rectangle and not cleaner
            if($rec->type == "aisle"){
                $rec = cast($personFromFile->rectangle, "Rectangle");
            }

            // Move to new Tile
            $rec->leave();
            $newRec = $class2->rectangles[$destination-1];
            $newRec->addPerson();
        
            // Write Data
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
    // Setup data to use
    $c3Text = file_get_contents('../text/class3.txt');
    $class3 = cast(json_decode($c1Text), "Classroom");

    // Setup counters
    $numPeople = count($class3->occupants);
    $c3Count = 0;

    // For loop searches for the right person based off id
    while ($c3Count < $numPeople) {
        $personFromFile = cast($class3->occupants[$c1Count], "Person");
        if ($person == $personFromFile->personId) {
            $rec = cast($personFromFile->rectangle, "Cleaner");

            // if working out of an aisle, we want to use regular
            // rectangle and not cleaner
            if($rec->type == "aisle"){
                $rec = cast($personFromFile->rectangle, "Rectangle");
            }

            // Move to new Tile
            $rec->leave();
            $newRec = $class3->rectangles[$destination-1];
            $newRec->addPerson();
        
            // Write Data
            $jsonClass = json_encode($class3);
            $c1File = fopen('../text/class3.txt', 'w');
            fwrite($c3File, $jsonClass);
            fclose($c3File);
            echo $jsonClass;
        }
    $c3Count++;
    }
}
?>