<?php

class Rectangle {
    // Member variables
    public $people;
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
}

class Cleaner extends Rectangle {
    // Member variables 
    public $cleanCount = 0;
    public $noSanitizerUsedAlarm = false;
    public $noLysolUsedAlarm = false;
    
    // Member functions
    function __construct(int $mydestinationId, $mytype) {
        $this->destinationId = $mydestinationId;
        $this->type = $mytype;
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

    // The person enters the rectangle and does not use the cleaner
    public function enterNoUse() {
        $this->alarm();
    }

    // The person uses the cleaner
    public function enterUse() {
        $this->noLysolUsedAlarm = false;
        $this->noSanitizerUsedAlarm = false;
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
        if ($this->type == "entrance") {
            if ($this->cleanCount < 2) {
                $this->alarm();
            }
            else {
                $this->noLysolUsedAlarm = false;
                $this->noSanitizerUsedAlarm = false;
            }
        }

        else {
            if ($this->cleanCount < 1) {
                $this->alarm();
            }
            else {
                $this->noLysolUsedAlarm = false;
                $this->noSanitizerUsedAlarm = false;
            }
        }
    }
}

?>