<?php
include_once('../classroom.php');
include_once('../person.php');
include_once('../rectangle.php');
include_once('start.php');

// remove all session variables
session_unset();

// destroy the session
session_destroy();

?>