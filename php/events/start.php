<?php
session_start();
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

$_SESSION["class1"] = new Classroom(1);

$_SESSION["rec101"] = new Cleaner(101, "entrance");
$_SESSION["rec102"] = new Rectangle(102, "aisle");
$_SESSION["rec103"] = new Cleaner(103, "desk");
$_SESSION["rec104"] = new Rectangle(104, "aisle");
$_SESSION["rec105"] = new Cleaner(105, "desk");
$_SESSION["rec106"] = new Cleaner(106, "desk");
$_SESSION["rec107"] = new Rectangle(107, "aisle");
$_SESSION["rec108"] = new Cleaner(108, "desk");
$_SESSION["rec109"] = new Rectangle(109, "aisle");
$_SESSION["rec110"] = new Cleaner(110, "desk");
$_SESSION["rec111"] = new Cleaner(111, "desk");
$_SESSION["rec112"] = new Rectangle(112, "aisle");

$class1->addRectangle($rec101);
$class1->addRectangle($rec102);
$class1->addRectangle($rec103);
$class1->addRectangle($rec104);
$class1->addRectangle($rec105);
$class1->addRectangle($rec106);
$class1->addRectangle($rec107);
$class1->addRectangle($rec108);
$class1->addRectangle($rec109);
$class1->addRectangle($rec110);
$class1->addRectangle($rec111);
$class1->addRectangle($rec112);

$_SESSION["class2"] = new Classroom(2);

$_SESSION["rec201"] = new Cleaner(201, "entrance");
$_SESSION["rec202"] = new Rectangle(202, "aisle");
$_SESSION["rec203"] = new Cleaner(203, "desk");
$_SESSION["rec204"] = new Rectangle(204, "aisle");
$_SESSION["rec205"] = new Cleaner(205, "desk");
$_SESSION["rec206"] = new Cleaner(206, "desk");
$_SESSION["rec207"] = new Rectangle(207, "aisle");
$_SESSION["rec208"] = new Cleaner(208, "desk");
$_SESSION["rec209"] = new Rectangle(209, "aisle");
$_SESSION["rec210"] = new Cleaner(210, "desk");
$_SESSION["rec211"] = new Cleaner(211, "desk");
$_SESSION["rec212"] = new Rectangle(212, "aisle");

$class2->addRectangle($rec201);
$class2->addRectangle($rec202);
$class2->addRectangle($rec203);
$class2->addRectangle($rec204);
$class2->addRectangle($rec205);
$class2->addRectangle($rec206);
$class2->addRectangle($rec207);
$class2->addRectangle($rec208);
$class2->addRectangle($rec209);
$class2->addRectangle($rec210);
$class2->addRectangle($rec211);
$class2->addRectangle($rec212);

$_SESSION["class3"] = new Classroom(3);

$_SESSION["rec301"] = new Cleaner(301, "entrance");
$_SESSION["rec302"] = new Rectangle(302, "aisle");
$_SESSION["rec303"] = new Cleaner(303, "desk");
$_SESSION["rec304"] = new Rectangle(304, "aisle");
$_SESSION["rec305"] = new Cleaner(305, "desk");
$_SESSION["rec306"] = new Cleaner(306, "desk");
$_SESSION["rec307"] = new Rectangle(307, "aisle");
$_SESSION["rec308"] = new Cleaner(308, "desk");
$_SESSION["rec309"] = new Rectangle(309, "aisle");
$_SESSION["rec310"] = new Cleaner(310, "desk");
$_SESSION["rec311"] = new Cleaner(311, "desk");
$_SESSION["rec312"] = new Rectangle(312, "aisle");

$class3->addRectangle($rec301);
$class3->addRectangle($rec302);
$class3->addRectangle($rec303);
$class3->addRectangle($rec304);
$class3->addRectangle($rec305);
$class3->addRectangle($rec306);
$class3->addRectangle($rec307);
$class3->addRectangle($rec308);
$class3->addRectangle($rec309);
$class3->addRectangle($rec310);
$class3->addRectangle($rec311);
$class3->addRectangle($rec312);

// $jsonClass = json_encode($class1);
// echo $jsonClass;

?>