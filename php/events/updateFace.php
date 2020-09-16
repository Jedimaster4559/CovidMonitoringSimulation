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

?>