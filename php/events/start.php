<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

$class1 = new Classroom(1);

$rec1 = new Cleaner(1, "entrance");
$rec2 = new Rectangle(2, "aisle");
$rec3 = new Cleaner(3, "desk");
$rec4 = new Rectangle(4, "aisle");
$rec5 = new Cleaner(5, "desk");
$rec6 = new Cleaner(6, "desk");
$rec7 = new Rectangle(7, "aisle");
$rec8 = new Cleaner(8, "desk");
$rec9 = new Rectangle(9, "aisle");
$rec10 = new Cleaner(10, "desk");
$rec11 = new Cleaner(11, "desk");
$rec12 = new Rectangle(12, "aisle");

$class1->addRectangle($rec1);
$class1->addRectangle($rec2);
$class1->addRectangle($rec3);
$class1->addRectangle($rec4);
$class1->addRectangle($rec5);
$class1->addRectangle($rec6);
$class1->addRectangle($rec7);
$class1->addRectangle($rec8);
$class1->addRectangle($rec9);
$class1->addRectangle($rec10);
$class1->addRectangle($rec11);
$class1->addRectangle($rec12);

$c1File = fopen("../text/class1.txt", "w");
$c1Text = json_encode($class1);
fwrite($c1File, $c1Text);

$class2 = new Classroom(2);

$class2->addRectangle($rec1);
$class2->addRectangle($rec2);
$class2->addRectangle($rec3);
$class2->addRectangle($rec4);
$class2->addRectangle($rec5);
$class2->addRectangle($rec6);
$class2->addRectangle($rec7);
$class2->addRectangle($rec8);
$class2->addRectangle($rec9);
$class2->addRectangle($rec10);
$class2->addRectangle($rec11);
$class2->addRectangle($rec12);

$c2File = fopen("../text/class2.txt", "w");
$c2Text = json_encode($class2);
fwrite($c2File, $c2Text);

$class3 = new Classroom(3);

$class3->addRectangle($rec1);
$class3->addRectangle($rec2);
$class3->addRectangle($rec3);
$class3->addRectangle($rec4);
$class3->addRectangle($rec5);
$class3->addRectangle($rec6);
$class3->addRectangle($rec7);
$class3->addRectangle($rec8);
$class3->addRectangle($rec9);
$class3->addRectangle($rec10);
$class3->addRectangle($rec11);
$class3->addRectangle($rec12);

$c3File = fopen("../text/class3.txt", "w");
$c3Text = json_encode($class3);
fwrite($c3File, $c3Text);

fclose($c1File);
fclose($c2File);
fclose($c3File);

$jsonClass = json_encode($class1);
echo $jsonClass;

?>