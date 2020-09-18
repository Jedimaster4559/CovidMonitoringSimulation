<?php

// The Rectangle object represents the different "squares" or "tiles" that
// students and the instructor can go. A regular Rectangle has a 
// "tooManyPeopleAlarm" that goes off if there are too many people.
class Rectangle {
    // Member variables
    public $people = 0;
    public $type;
    public $destinationId;
    public $tooManyPeopleAlarm = false;

    // Member functions
    // Constructor
    function __construct(int $mydestinationId, $mytype) {
        $this->destinationId = $mydestinationId;
        $this->type = $mytype;
        $this->people = 0;
    }

    // Adds people to a rectangle
    // If there are more than 1 person in a square
    // set the alarm bool to true
    public function addPerson() {
        $this->people += 1;
        if ($this->people > 1) {
            $this->tooManyPeopleAlarm = true;
        }
        else {
            $this->tooManyPeopleAlarm = false;
        }
    }

    // Checks how many people are in the Rectangle. 
    // If there are too many, tooManyPeopleAlarm 
    // is set to true.
    public function checkPeople() {
        if ($this->people > 1) {
            $this->tooManyPeopleAlarm = true;
        }
        else {
            $this->tooManyPeopleAlarm = false;
        }
    }

    public function leave() {
        $this->people -= 1;
        $this->checkPeople();
    }
}

// A Cleaner object is a Rectangle that also needs to be cleaned.
// There are two types, a "desk" and the "entrance." Desks must
// be wiped twice before a Person can leave. The entrance only
// needs the Person to use the sanitizer once.
class Cleaner extends Rectangle {
    // Member variables 
    public $cleanCount;
    public $noSanitizerUsedAlarm = false;
    public $noLysolUsedAlarm = false;
    
    // Member functions
    function __construct(int $mydestinationId, $mytype) {
        $this->destinationId = $mydestinationId;
        $this->type = $mytype;
        $this->cleanCount = 0;
    }

    // Triggers an alarm event
    public function alarm() {
        if ($this->type == "desk") {
            $this->noLysolUsedAlarm = true;
        }
        elseif ($this->type == "entrance") {
            $this->noSanitizerUsedAlarm = true;
        }
    }

    // The person uses the cleaner
    public function clean() {
        $this->cleanCount += 1;
        $this->noLysolUsedAlarm = false;
        $this->noSanitizerUsedAlarm = false;
    }

    // The person leaves
    // Function checks if the user uses lysol before they go
    public function leave() {
        if ($this->type == "desk") {
            if ($this->cleanCount < 2) {
                $this->alarm();
                $this->people -= 1;
            }
            else {
                $this->noLysolUsedAlarm = false;
                $this->noSanitizerUsedAlarm = false;
                $this->cleanCount = 0;
                $this->people -= 1;
            }
        }

        else {
            if ($this->cleanCount < 1) {
                $this->alarm();
                $this->people -= 1;
            }
            else {
                $this->noLysolUsedAlarm = false;
                $this->noSanitizerUsedAlarm = false;
                $this->cleanCount = 0;
                $this->people -= 1;
            }
        }
        $this->checkPeople();
    }
}

?>