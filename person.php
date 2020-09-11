<?php

class Person {
    // Member variables
    private $mask;
    private $rectangle;

    // Member functions
    private function alarm() {
        echo "Alarm Event! Person is not following mask guidelines.";
    }

    public function wearMaskIncorrectly() {
        $this->alarm();
    }

    public function move($rectangle) {
        $this->rectangle = $rectangle;
    }
}

class Instructor extends Person {
    // Member variables 
    private $shield;

    // Member functions 
    public function alarm() {
        echo "Alarm Event! Person is not following shield guidelines.";
    }

    public function wearShieldIncorrectly() {
        $this->alarm();
    }
}
?>