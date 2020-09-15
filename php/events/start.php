<?php
include '../classroom.php';
include '../person.php';
include '../rectangle.php';

$class1 = new Classroom(100);

$rec101 = new Rectangle(101);
$rec102 = new Rectangle(102);
$rec103 = new Rectangle(103);
$rec104 = new Rectangle(104);
$rec105 = new Rectangle(105);
$rec106 = new Rectangle(106);
$rec107 = new Rectangle(107);
$rec108 = new Rectangle(108);
$rec109 = new Rectangle(109);
$rec110 = new Rectangle(110);
$rec111 = new Rectangle(111);
$rec112 = new Rectangle(112);

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

$class2 = new Classroom(200);

$rec201 = new Rectangle(201);
$rec202 = new Rectangle(202);
$rec203 = new Rectangle(203);
$rec204 = new Rectangle(204);
$rec205 = new Rectangle(205);
$rec206 = new Rectangle(206);
$rec207 = new Rectangle(207);
$rec208 = new Rectangle(208);
$rec209 = new Rectangle(209);
$rec210 = new Rectangle(210);
$rec211 = new Rectangle(211);
$rec212 = new Rectangle(212);

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

$class3 = new Classroom(300);

$rec301 = new Rectangle(301);
$rec302 = new Rectangle(302);
$rec303 = new Rectangle(303);
$rec304 = new Rectangle(304);
$rec305 = new Rectangle(305);
$rec306 = new Rectangle(306);
$rec307 = new Rectangle(307);
$rec308 = new Rectangle(308);
$rec309 = new Rectangle(309);
$rec310 = new Rectangle(310);
$rec311 = new Rectangle(311);
$rec312 = new Rectangle(312);

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

$jsonClass = json_encode($class1);
echo $jsonClass;

?>