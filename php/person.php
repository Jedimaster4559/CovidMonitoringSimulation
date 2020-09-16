<?php

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

    // Resets the Person's Rectangle
    public function move($rectangle) {
        $this->rectangle = $rectangle;
    }
}

class Instructor extends Person {
    // Member variables 
    public $shield;
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