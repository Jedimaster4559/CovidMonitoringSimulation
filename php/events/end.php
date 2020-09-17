<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');

// Clears the text files
$c1File = fopen("../text/class1.txt", "w");
fwrite($c1File, "");
fclose($c1File);

$c2File = fopen("../text/class2.txt", "w");
fwrite($c2File, "");
fclose($c2File);

$c3File = fopen("../text/class3.txt", "w");
fwrite($c3File, "");
fclose($c3File);
?>