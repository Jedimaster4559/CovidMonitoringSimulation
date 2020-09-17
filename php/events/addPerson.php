<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

$class = $_REQUEST["classroomId"];
$person = $_REQUEST["personId"];
$isTeacher = $_REQUEST["isTeacher"];

// Fixes a PHP serialization issue
// https://tommcfarlin.com/cast-a-php-standard-class-to-a-specific-type/
function cast($instance, $className) {
    return unserialize(sprintf('O:%d:"%s"%s', \strlen($className), $className, strstr(strstr(serialize($instance), '"'), ':')));    
}

if ($class == '1') {
    $c1Text = file_get_contents('../text/class1.txt');
    $class1 = cast(json_decode($c1Text), "Classroom");
    $rec1 = cast($class1->rectangles[0], "Rectangle");

    if ($isTeacher == "true") {
        $newPerson = new Instructor($person, $rec1);
        $class1->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class1);
        $c1File = fopen('../text/class1.txt', 'w');
        fwrite($c1File, $jsonClass);
        fclose($c1File);
    }
    else {
        $newPerson = new Person($person, $rec1);
        $class1->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class1);
        $c1File = fopen('../text/class1.txt', 'w');
        fwrite($c1File, $jsonClass);
        fclose($c1File);
    }
}
elseif ($class == '2') {
    $c2Text = file_get_contents('../text/class2.txt');
    $class2 = json_decode($c2Text);
    $rec1 = $class2->rectangles[0];

    if ($isTeacher == "true") {
        $newPerson = new Instructor($person, $rec1);
        $class2->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class2);
        $c2File = fopen('../text/class2.txt', 'w');
        fwrite($c2File, $jsonClass);
        fclose($c2File);
    }
    else {
        $newPerson = new Person($person, $rec1);
        $class2->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class2);
        $c2File = fopen('../text/class2.txt', 'w');
        fwrite($c2File, $jsonClass);
        fclose($c2File);
    }    
}
else {
    $c3Text = file_get_contents('../text/class3.txt');
    $class3 = json_decode($c3Text);
    $rec1 = $class3->rectangles[0];

    if ($isTeacher == "true") {
        $newPerson = new Instructor($person, $rec1);
        $class3->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class3);
        $c3File = fopen('../text/class1.txt', 'w');
        fwrite($c3File, $jsonClass);
        fclose($c3File);
    }
    else {
        $newPerson = new Person($person, $rec1);
        $class3->addPerson($newPerson);
        $rec1->addPerson();
        $class1->rectangles[0] = $rec1;
        $jsonClass = json_encode($class3);
        $c3File = fopen('../text/class3.txt', 'w');
        fwrite($c3File, $jsonClass);
        fclose($c3File);
    }
}

echo $jsonClass;

?>