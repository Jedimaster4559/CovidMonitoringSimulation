<?php

class Person {
    // Member variables
    //public $mask;
    public $rectangle;
    public $personId;
    public $maskError = false;

    // Member functions
    // Constructor
    function __construct(int $mypersonId, $myRectangle) {
        $this->personId = $mypersonId;
        $this->rectangle = $myRectangle;
    }

    // Alarm event
    private function alarm() {
        $maskError = true;
    }

    // Person wears their mask incorrectly; calls the alarm event
    public function wearMaskIncorrectly() {
        $this->alarm();
    }

    public function move($rectangle) {
        $this->rectangle = $rectangle;
    }
}

class Instructor extends Person {
    // Member variables 
    public $shield;
    public $shieldError = false;

    // Member functions 
    // Call alarm event
    public function alarm() {
        $shieldError = true;
    }

    // Person wears their shield incorrectly; calls the alarm event
    public function wearShieldIncorrectly() {
        $this->alarm();
    }
}

?>