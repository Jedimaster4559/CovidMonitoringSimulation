<?php

class Person {
    // Member variables
    //public $mask;
    public $rectangle;
    public $personId;

    // Member functions
    // Constructor
    function __construct(int $mypersonId, $myRectangle) {
        $this->personId = $mypersonId;
        $this->rectangle = $myRectangle;
    }

    // Alarm event
    private function alarm() {
        echo "Alarm Event! Person is not following mask guidelines.";
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

    // Member functions 
    // Call alarm event
    public function alarm() {
        echo "Alarm Event! Person is not following shield guidelines.";
    }

    // Person wears their shield incorrectly; calls the alarm event
    public function wearShieldIncorrectly() {
        $this->alarm();
    }
}

?>