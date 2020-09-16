<?php

class Rectangle {
    // Member variables
    public $people;
    public $destinationId;
    public $tooManyPeopleAlarm = false;

    // Member functions
    // Constructor
    function __construct(int $mydestinationId) {
        $this->destinationId = $mydestinationId;
        $this->people = 0;
    }

    // Adds people to a rectangle
    // If there are more than 1 person in a square
    // set the alarm bool to true
    public function addPerson() {
        $this->people += 1;
        if ($this->people > 1) {
            $tooManyPeopleAlarm = true;
        }
        else {
            $tooManyPeopleAlarm = false;
        }
    }
}

class Cleaner extends Rectangle {
    // Member variables 
    public $type;
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
            $noLysolUsedAlarm = true;
        }
        elseif ($this->type == "entrance") {
            $noSanitizerUsedAlarm = true;
        }
    }

    // The person enters the rectangle and does not use the cleaner
    public function enterNoUse() {
        $this->alarm();
    }

    // The person uses the cleaner
    public function enterUse() {
        $noLysolUsedAlarm = false;
        $noSanitizerUsedAlarm = false;
    }

    // The person leaves
    // Function checks if the user uses lysol before they go
    public function leaveNoUse() {
        $this->alarm();
    }

    // The person leaves and uses the cleaner 
    public function leaveUse() {
        $noLysolUsedAlarm = false;
        $noSanitizerUsedAlarm = false;
    }
}

?>