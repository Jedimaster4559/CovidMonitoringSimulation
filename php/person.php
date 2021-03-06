<?php

// A Person object is by default a "student," since 
// the instructor also needs to have a "faceshield"
class Person {
    // Member variables
    //public $mask;
    public $rectangle;
    public $personId;
    public $maskErrorAlarm = false;
    public $status = "student";

    // Member functions
    // Constructor
    function __construct(int $mypersonId, $myRectangle) {
        $this->personId = $mypersonId;
        $this->rectangle = $myRectangle;
    }

    // Person wears their mask incorrectly; set the alarm bool true
    public function wearMaskIncorrectly() {
        $this->maskErrorAlarm = true;
    }

    // Person corrects their mask; set the alarm bool to false
    public function wearMaskCorrectly() {
        $this->maskErrorAlarm = false;
    }
}

// The Instructor object has a bool "shieldErrorAlarm"
// that will be set to true when the Instructor 
// is not correctly using their face shield. 
class Instructor extends Person {
    // Member variables 
    public $shieldErrorAlarm = false;
    public $status = "teacher";

    // Member functions 
    // Person wears their shield incorrectly; sets alarm to true
    public function wearShieldIncorrectly() {
        $this->shieldErrorAlarm = true;
    }

    // Person corrects their shield; sets alarm to false
    public function wearShieldCorrectly() {
        $this->shieldErrorAlarm = false;
    }
}

?>